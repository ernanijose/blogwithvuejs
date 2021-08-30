<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        //dd($blogs);
        return view('blog', ['blogs' => $blogs ]);
    }

    public function blogDetail(Blog $post_slug)
    {
        return view('blog-details', ['blog' => $post_slug ]);
    }

    public function fetchLike(Request $request)
    {
        $blog = Blog::find($request->blog);
        return response()->json([
            'blog' => $blog,
        ]);
    }

    public function handleLike(Request $request)
    {
        $blog = Blog::find($request->blog);
        $value = $blog->like;
        $blog->like = $value+1;
        $blog->save();
        return response()->json([
            'message' => 'Liked',
        ]);
    }

    public function fetchDislike(Request $request)
    {
        $blog = Blog::find($request->blog);
        return response()->json([
            'blog' => $blog,
        ]);
    }

    public function handleDislike(Request $request)
    {
        $blog = Blog::find($request->blog);
        $value = $blog->dislike;
        $blog->dislike = $value+1;
        $blog->save();
        return response()->json([
            'message' => 'Disliked',
        ]);
    }
}
