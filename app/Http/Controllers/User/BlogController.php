<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(Request $request)
    {
        $blogs = Blog::paginate(6);
        $request->session()->put('blogs', $blogs);
        return view('user.blog.list', compact('blogs'));
    }

    public function SingleBlog(Request $request,$id){

        $single_blogs =Blog::findOrFail($id);
        $recent_blog =Blog::latest()->take(3)->get();

        return view('user.blog.single-blog-info',compact('single_blogs','recent_blog'));
    }

}
