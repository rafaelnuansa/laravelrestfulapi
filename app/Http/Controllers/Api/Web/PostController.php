<?php

namespace App\Http\Controllers\Api\Web;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
// use App\Models\GenericModel;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::with('category', 'images')
        ->when(request()->q, function($posts) {
            $posts = $posts->where('title', 'like', '%'. request()->q . '%');
        })
        ->latest()->paginate(8);
        //return with Api Resource
        return new PostResource(true, 'List Data Posts', $posts);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with('category')->where('slug', $slug)->first();
        if($post) {
            //return success with Api Resource
            return new PostResource(true, 'Detail Data Posts : '.$post->title, $post);
        }

        //return failed with Api Resource
        return new PostResource(false, 'Data Post Tidak Ditemukan!', null);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_posts()
    {
        //get posts
        $posts = Post::with('category')->latest()->get();
        //return with Api Resource
        return new PostResource(true, 'List Semua Data Wisata', $posts);
    }

    public function latestwisata()
    {
        //get posts
        $posts = Post::with('category')->latest()->take(6)->get();
        //return with Api Resource
        return new PostResource(true, 'List Data Wisata Terbaru', $posts);
    }

   
}