<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // dd($posts->get());
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view("blog", [
            "title" => "All Posts" . $title,
            "active" => "blog",
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
            // "posts" => Post::all()
        ]);
    }
    public function show(Post $post)
    {
        return view('post', [
            "active" => "blog",
            "title" => "Single Post",
            "post" => $post
        ]);
    }
}
