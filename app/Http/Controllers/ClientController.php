<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class ClientController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'ASC')->paginate(8);
        return view('client.index')->with('posts', $posts);
    }
}