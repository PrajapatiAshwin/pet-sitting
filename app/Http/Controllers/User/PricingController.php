<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\PlanExpiryReminderMail;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PetManage;
use App\Models\PlanManagement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PricingController extends Controller
{
    //
    public function index(Request $request)
    {
        $searchPlan = $request->input('searchPlan', 'month');

        $query = PlanManagement::query();

        if ($searchPlan) {
            $query->where('duration_unit', $searchPlan);
        }

        $planManagement = $query->paginate(10);

        $request->session()->put('blogs', $planManagement);

        // $planManagement = PlanManagement::paginate(10);
        // $request->session()->put('planManagement', $planManagement);
        // dd($request->all());
        return view('user.pricing.list', compact('planManagement'));
    }

    public function planDetails(Request $request)
    {
        // dd($request->all());
        $plan = PlanManagement::findOrFail($request->plan_id);

        $plan_information_purchase = ([
            'plan_id' => $request->plan_id,
            'plan_name' => $request->plan_name,
            'amount' => $request->amount,
            'duration_value' => $request->duration_value,
            'duration_unit' => $request->duration_unit,
            'plan_features' => $request->plan_features,
        ]);

        // Get all pets
        $pets = PetManage::all();

        return view('user.pricing.plan-details-page', compact('plan_information_purchase', 'pets'));
    }

    public function planDetailsStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:orders,email',
            // 'message' => 'required',
            'contact_number' => 'required|digits_between:10,12',
            'pet_name' => 'required',
            'pet_type' => 'required',
            // 'purchase_date' => 'required',
            // 'pet_description' => 'required',
            // 'pet_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ImagePath = null;

        if ($request->hasFile('pet_photo')) {
            $image = $request->file('pet_photo');
            $image_store = time() . "_pet_photo_." . $image->getClientOriginalExtension();
            $destinationPath = public_path('pet-purchase-plan/pet_images');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $image_store);
            $ImagePath = "pet-purchase-plan/pet_images/$image_store";
        }

        $purchaseDate = $request->purchase_date
            ? Carbon::parse($request->purchase_date)
            : now();

        if ($request->duration == '1 month') {
            $expireDate = $purchaseDate->clone()->addMonth()->subDay();
        } elseif ($request->duration == '1 year') {
            $expireDate = $purchaseDate->clone()->addYear()->subDay();
        } else {
            $expireDate = null;
        }

        $order_details = new Order();
        $order_details->name = $request->name ?? Null;
        $order_details->email = $request->email ?? Null;
        // $order_details->message = $request->message ?? Null;
        $order_details->contact_number = $request->contact_number ?? Null;
        $order_details->pet_name = $request->pet_name ?? Null;
        $order_details->pet_type = $request->pet_type ?? Null;
        $order_details->purchase_date = $purchaseDate ?? Null;
        $order_details->expire_date = $expireDate ?? Null;
        $order_details->pet_description = $request->pet_description ?? Null;
        $order_details->pet_photo = $ImagePath ?? Null;
        $order_details->plan_id = $request->plan_id ?? Null;
        $order_details->plan_name = $request->plan_name ?? Null;
        $order_details->amount = $request->amount ?? Null;
        $order_details->duration = $request->duration ?? Null;
        $order_details->features = $request->plan_features ?? Null;
        $order_details->payment_method = $request->payment_method ?? Null;
        $order_details->save();

        $payments = new Payment();
        $payments->order_id = $order_details->id ?? Null;
        $payments->payment_method = $order_details->payment_method ?? Null;
        $payments->save();

        return redirect()->route('home')->with('success', 'Order successfully.');
    }

    public function planInfo()
    {
        $today = Carbon::today();
        $endDate = Carbon::today()->addDays(5);
        $orderDetails = DB::table('orders')
            ->whereNotNull('expire_date')
            ->whereDate('expire_date', '>=', $today)
            ->whereDate('expire_date', '<=', $endDate)
            ->get();

        $adminEmail = 'prajapatiashwin360@gmail.com';
        foreach ($orderDetails as $order) {
            $email = trim($order->email);
            $userName = $order->name;
            $userPlanName = $order->plan_name;
            $expireDate = Carbon::parse($order->expire_date)->format('d-m-Y');
            $purchaseDate = Carbon::parse($order->purchase_date)->format('d-m-Y');
            $daysLeft = $today->parse($order->expire_date)->diffInDays();

            try {
                // Send to user
                Mail::send('user.mail.plan_expiry_reminder', ['name' => $userName, 'expireDate' => $expireDate, 'userPlanName' => $userPlanName,'daysLeft' => $daysLeft], function ($message) use ($email, $userName) {
                    $message->to($email, $userName)
                            ->subject('Reminder: Your plan is expiring soon');
                });

                // Send to admin
                Mail::send('admin.mail.plan_expiry_reminder', ['name' => $userName, 'expireDate' => $expireDate, 'purchaseDate' => $purchaseDate, 'userPlanName' => $userPlanName,'daysLeft' => $daysLeft], function ($message) use ($adminEmail, $userName) {
                    $message->to($adminEmail, 'Admin')
                            ->subject("Reminder: {$userName}'s plan is expiring soon");
                });

                \Log::info("Reminder sent to {$email} and admin.");
            } catch (\Exception $e) {
                \Log::error("Failed to send reminder to {$email}: " . $e->getMessage());
            }
        }
        // return response()->json(['status' => 'Reminder emails processed']);
        return redirect()->route('admin.order-details')->with('success', 'Reminders sent! All users have been notified via email.');
    }

}
