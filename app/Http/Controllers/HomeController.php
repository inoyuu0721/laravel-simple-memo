<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $posts = $request->all();
        //dump dieの略 → メソッドに入った値を展開して止める → データ確認
        // dd(\Auth::id());

        // \Auth::id()でログインしたユーザーのIDを取れる
        Memo::insert(['content' => $posts['content'], 'user_id' => \Auth::id()]);

        return redirect( route('home'));
    }
}
