<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
        $this->middleware('guest')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('dashboard');
    }

    /**
     * Show the User Profile.
     *
     * @param $slug = ''
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile($slug = '')
    {
        if ($slug == '') {
            $user = Auth::user();
        } else {
            $user = User::where('slug', $slug)->first();
        }
        return view('profile.profile')->with(['user' => $user]);
    }


    /**
     * Show the User Profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function authProfile()
    {
        return view('profile.profile_edit');
    }


    /**
     * ask user to transfer.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sendRequest()
    {
        return view('send_request');
    }


    /**
     * Show the User request to accept or deny.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function recipientRequest()
    {
        return view('recipient_request');
    }


    /**
     * Show the User static.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function statical()
    {
        return view('statical');
    }


    /**
     * Show the list of favorite users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function favorite()
    {
        return view('favorite');
    }
}
