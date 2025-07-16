<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Veterinarian;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class VeterinariansController extends Controller
{
    //
    public function index()
    {
        return view('admin.veterinarians.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'speciality' => 'required|string',
            'twitter_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $ImagePath = null;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $image_store = time() . "_photo_doctor." . $image->getClientOriginalExtension();
            $destinationPath = public_path('Doctors/');

            // Ensure the folder exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Move the uploaded file to the destination folder
            $image->move($destinationPath, $image_store);

            // Set the image path relative to public folder
            $ImagePath = "Doctors/$image_store";
        }
        // Create record
        // \App\Models\Veterinarian::create($validated);
        $veterinarian = new Veterinarian();
        $veterinarian->name = $request->name ?? null;
        $veterinarian->speciality = $request->speciality ?? null;
        $veterinarian->twitter_link = $request->twitter_link ?? null;
        $veterinarian->facebook_link = $request->facebook_link ?? null;
        $veterinarian->instagram_link = $request->instagram_link ?? null;
        $veterinarian->photo = $ImagePath ?? null;
        $veterinarian->description = $request->description ?? null;
        $veterinarian->save();

        return redirect()->route('admin.veterinarians.list')->with('success', 'Veterinarian created successfully.');
    }

    public function display(Request $request){
        $veterinarians = Veterinarian::paginate(10);
        $request->session()->put('veterinarians', $veterinarians);
        return view('admin.veterinarians.list',compact('veterinarians'));
    }

    public function destroy(Request $request, $id)
    {
        $veterinarian = Veterinarian::findOrFail($id);
        if ($veterinarian->photo && file_exists(public_path($veterinarian->photo))) {
            unlink(public_path($veterinarian->photo));
        }
        if (!empty($veterinarian)){
            $veterinarian->delete();
        }
        $request->session()->forget('veterinarians');

        return redirect()->route('admin.veterinarians.list')->with('success', 'Veterinarian deleted successfully.');
    }

    public function edit($id)
    {
        $veterinarian = Veterinarian::findOrFail($id);
        return view('admin.veterinarians.edit', compact('veterinarian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'speciality' => 'required|string',
            'twitter_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $veterinarian = Veterinarian::findOrFail($id);
        $veterinarian->name = $request->name ?? null;
        $veterinarian->speciality = $request->speciality ?? null;
        $veterinarian->twitter_link = $request->twitter_link ?? null;
        $veterinarian->facebook_link = $request->facebook_link ?? null;
        $veterinarian->instagram_link = $request->instagram_link ?? null;

        if ($request->hasFile('photo')) {
            if ($veterinarian->photo && file_exists(public_path($veterinarian->photo))) {
                unlink(public_path($veterinarian->photo));
            }

            $image = $request->file('photo');
            $image_store = time() . "_photo_doctor." . $image->getClientOriginalExtension();
            $destinationPath = public_path('Doctors/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image->move($destinationPath, $image_store);
            $veterinarian->photo = "Doctors/$image_store";
        }
        else {
            $veterinarian->photo = $veterinarian->photo;
        }

        $veterinarian->description = $request->description ?? null;
        $veterinarian->save();

        return redirect()->route('admin.veterinarians.list')->with('success', 'Veterinarian updated successfully.');
    }

}
