<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlanManagement;
use Illuminate\Http\Request;

class PlanManagementController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('admin.plan-management.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_name' => 'required',
            'amount' => 'required',
            'duration_value' => 'required',
            'duration_unit' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'plan_features' => 'nullable|array',
            'plan_features.*' => 'required|string|max:255',
        ]);

        $features = $request->plan_features ? implode(',', array_filter($request->plan_features)) : null;

        $ImagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_store = time() . "_image_plan." . $image->getClientOriginalExtension();
            $destinationPath = public_path('PlanImage/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $image_store);

            $ImagePath = "PlanImage/$image_store";
        }

        PlanManagement::create([
            'plan_name' => $request->plan_name ?? null,
            'amount' => $request->amount ?? null,
            'duration_value' => $request->duration_value ?? null,
            'duration_unit' => $request->duration_unit ?? null,
            'image' => $ImagePath ?? null,
            'plan_features' => $features ?? null,
        ]);

        return redirect()->route('admin.plan-manage.list')->with('success', 'Plan created successfully.');
    }

    public function display(Request $request)
    {
        $planManagement = PlanManagement::paginate(10);
        $request->session()->put('blogs', $planManagement);
        return view('admin.plan-management.list', compact('planManagement'));
    }

    public function destroy(Request $request, $id)
    {
        $planManagement = PlanManagement::findOrFail($id);
        if ($planManagement->image && file_exists(public_path($planManagement->image))) {
            unlink(public_path($planManagement->image));
        }
        if (!empty($planManagement)){
            $planManagement->delete();
        }
        $request->session()->forget('planManagement');

        return redirect()->route('admin.plan-manage.list')->with('success', 'Plan deleted successfully.');
    }

    public function edit($id)
    {
        $planManagement = PlanManagement::findOrFail($id);
        return view('admin.plan-management.edit', compact('planManagement'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plan_name' => 'required',
            'amount' => 'required',
            'duration_value' => 'required',
            'duration_unit' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'plan_features' => 'nullable|array',
            'plan_features.*' => 'nullable|string|max:255',
        ]);

        $plan = PlanManagement::findOrFail($id);

        $features = $request->plan_features ? implode(',', array_filter($request->plan_features)) : null;
        $ImagePath = $plan->image; 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_store = time() . "_image_plan." . $image->getClientOriginalExtension();
            $destinationPath = public_path('PlanImage/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $image_store);
            $ImagePath = "PlanImage/$image_store";

            if ($plan->image && file_exists(public_path($plan->image))) {
                unlink(public_path($plan->image));
            }
        }

        $plan->update([
            'plan_name' => $request->plan_name,
            'amount' => $request->amount,
            'duration_value' => $request->duration_value,
            'duration_unit' => $request->duration_unit,
            'image' => $ImagePath,
            'plan_features' => $features,
        ]);

        return redirect()->route('admin.plan-manage.list')->with('success', 'Plan updated successfully.');
    }

}
