<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\GalleryManagement;
use App\Models\PlanManagement;
use App\Models\Service;
use App\Models\Veterinarian;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        // $galleryManagement = GalleryManagement::paginate(10);
        $galleryManagement = GalleryManagement::latest()->take(1)->get();
        $request->session()->put('gallery_management', $galleryManagement);

        $blogs = Blog::latest()->take(3)->get();;
        $request->session()->put('blogs', $blogs);

        $dataServices = Service::latest()->take(3)->get();
        $request->session()->put('dataServices', $dataServices);

        $searchPlan = $request->input('searchPlan', 'month');
        $query = PlanManagement::query();
        if ($searchPlan) {
            $query->where('duration_unit', $searchPlan);
        }
        $planManagement = $query->paginate(10);

        return view('user.home', compact('galleryManagement', 'blogs', 'planManagement','dataServices'));
    }
    public function planDetails(Request $request)
    {
        // dd($request->all());
        $plan = PlanManagement::findOrFail($request->plan_id);
        $plan_information_purchase = ([
            'plan_id' => $request->plan_id,
            'plan_name' => $request->plan_name,
            'amount' => $request->amount,
            'duration' => $request->duration,
            'features' => $request->features,
        ]);

        return view('user.pricing.plan-details-page', compact('plan_information_purchase'));
    }
}
