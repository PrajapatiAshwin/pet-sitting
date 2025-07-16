<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    //
    public function index(Request $request){
        return view('admin.services.create');
    }

    public function store(Request $request){

        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $ImagePath = null;

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $image_store = time() . "_Icon_services." . $image->getClientOriginalExtension();
            $destinationPath = public_path('Services/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $image_store);

            $ImagePath = "Services/$image_store";
        }

        $dataServices = new Service();
        $dataServices->subject = $request->subject;
        $dataServices->description = $request->description;
        $dataServices->icon = $ImagePath ?? null;
        $dataServices->save();

        return redirect()->route('admin.addsServices.list')->with('success', 'Services created successfully.');
    }

    public function display(Request $request){
        $dataServices = Service::latest()->paginate(10);
        $request->session()->put('dataServices', $dataServices);
        return view('admin.services.list',compact('dataServices'));
    }

    public function destroy(Request $request, $id)
    {
        $dataServices = Service::findOrFail($id);
        if ($dataServices->image && file_exists(public_path($dataServices->image))) {
            unlink(public_path($dataServices->image));
        }
        if (!empty($dataServices)){
            $dataServices->delete();
        }
        $request->session()->forget('dataServices');

        return redirect()->route('admin.addsServices.list')->with('success', 'Services deleted successfully.');
    }

    public function edit($id)
    {
        $dataServices = Service::findOrFail($id);
        return view('admin.services.edit', compact('dataServices'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $service = Service::findOrFail($id);

        $ImagePath = $service->icon; 

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $image_store = time() . "_Icon_services." . $image->getClientOriginalExtension();
            $destinationPath = public_path('Services/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $image_store);
            $ImagePath = "Services/$image_store";

            if ($service->icon && file_exists(public_path($service->icon))) {
                unlink(public_path($service->icon));
            }
        }
        
        $service->subject = $request->subject;
        $service->description = $request->description;
        $service->icon = $ImagePath;
        $service->save();

        return redirect()->route('admin.addsServices.list')->with('success', 'Service updated successfully.');
    }

}
