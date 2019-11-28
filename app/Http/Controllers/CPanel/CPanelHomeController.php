<?php

namespace App\Http\Controllers\CPanel;


use App\Http\Models\Comments;
use App\Http\Models\Post;
use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CPanelHomeController extends CPanelBaseController
{
    public function  __construct()
    {
        parent::__construct();
    }


    public function index(Request $request)
    {
        $posts = Post::listsTranslations('title')->orderBy('id', 'desc')->take(5)->get();
        $users = User::select('username')->orderBy('id', 'desc')->take(5)->get();
        $comments = Comments::select('comment')->orderBy('id', 'desc')->take(5)->get();
        return view('cpanel.home', compact('posts','users', 'comments'));
    }



}
