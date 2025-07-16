<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryManagement;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|array',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $ImagePath = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $image_store = time() . '_' . uniqid() . "_image_gallery." . $file->getClientOriginalExtension();
                $destinationPath = public_path('galleryImages/');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $image_store);
                $ImagePath[] = 'galleryImages/' . $image_store;
            }
        }

        $encodedPaths = json_encode($ImagePath);

        $galleryManagement = new GalleryManagement();
        $galleryManagement->title = $request->title;
        $galleryManagement->image = $encodedPaths;
        $galleryManagement->save();

        return redirect()->route('admin.gallery.list')->with('success', 'Gallery images created successfully.');
    }

    public function display(Request $request)
    {
        $galleryManagement = GalleryManagement::paginate(10);
        $request->session()->put('gallery_management', $galleryManagement);
        return view('admin.gallery.list', compact('galleryManagement'));
    }

    public function edit($id)
    {
        $galleryManagement = GalleryManagement::findOrFail($id);
        return view('admin.gallery.edit', compact('galleryManagement'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $galleryManagement = GalleryManagement::findOrFail($id);

        if ($request->hasFile('image')) {

            $oldImages = json_decode($galleryManagement->image, true);
            if (is_array($oldImages)) {
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path($oldImage);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            $ImagePath = [];
            foreach ($request->file('image') as $file) {
                $image_store = time() . '_' . uniqid() . "_image_gallery." . $file->getClientOriginalExtension();
                $destinationPath = public_path('galleryImages/');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $image_store);
                $ImagePath[] = 'galleryImages/' . $image_store;
            }

            $galleryManagement->image = json_encode($ImagePath);
        }

        $galleryManagement->title = $request->title;
        $galleryManagement->save();

        return redirect()->route('admin.gallery.list')->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $galleryManagement = GalleryManagement::findOrFail($id);
        if ($galleryManagement->image && file_exists(public_path($galleryManagement->image))) {
            unlink(public_path($galleryManagement->image));
        }
        if (!empty($galleryManagement)){
            $galleryManagement->delete();
        }
        $request->session()->forget('gallery_management');

        return redirect()->route('admin.gallery.list')->with('success', 'Gallery deleted successfully.');
    }
}
