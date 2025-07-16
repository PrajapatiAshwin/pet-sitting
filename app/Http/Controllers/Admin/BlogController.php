<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'date' => 'required|date',
            'description' => 'required',
        ]);

        $ImagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_store = time() . "_image_blogs." . $image->getClientOriginalExtension();
            $destinationPath = public_path('Blogs/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $image_store);
            $ImagePath = "Blogs/$image_store";
        }

        $blogs = new Blog();
        $blogs->image = $ImagePath ?? Null;
        $blogs->name = $request->name ?? Null;
        $blogs->date = $request->date ?? Null;
        $blogs->description = $request->description ?? Null;
        $blogs->save();

        return redirect()->route('admin.blog.list')->with('success', 'Blog created successfully.');
    }

    public function display(Request $request)
    {
        $blogs = Blog::paginate(10);
        $request->session()->put('blogs', $blogs);
        return view('admin.blog.list', compact('blogs'));
    }

    public function edit($id)
    {
        $blogs = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blogs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'date' => 'required|date',
            'description' => 'required',
        ]);

        $ImagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_store = time() . "_image_blogs." . $image->getClientOriginalExtension();
            $destinationPath = public_path('Blogs/');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $image_store);
            $ImagePath = "Blogs/$image_store";
        }

        $blogs = Blog::findOrFail($id);
        $blogs->image = $ImagePath ?? Null;
        $blogs->name = $request->name ?? Null;
        $blogs->date = $request->date ?? Null;
        $blogs->description = $request->description ?? Null;
        $blogs->save();

        return redirect()->route('admin.blog.list')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $blogs = Blog::findOrFail($id);
        if ($blogs->image && file_exists(public_path($blogs->image))) {
            unlink(public_path($blogs->image));
        }
        if (!empty($blogs)){
            $blogs->delete();
        }
        $request->session()->forget('blogs');

        return redirect()->route('admin.blog.list')->with('success', 'Blog deleted successfully.');
    }
}
