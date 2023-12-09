<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;

class PostController extends Controller
{
    public function index()
    {
        //jangan lupa import model Post dengan cara klik kanan untuk import
        $post = Post::all();
        //berfungsi untuk mengatur jenis data yang akan ditampilkan
        return response()->json(['data' => $post]);
    }

    public function getResource()
    {
        $post = Post::all();
        //jangan lupa import PostResources
        return PostResource::collection($post);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return new PostDetailResource($post);
    }


}
