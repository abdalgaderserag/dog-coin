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
        Auth::logout();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with(['access' => Auth::user()->createToken('profile')->accessToken]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('dashboard')->with('access', Auth::user()->createToken('dashboard')->accessToken);
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
        return view('profile.profile')->with(['access' => Auth::user()->createToken('profile')->accessToken, 'user' => $user]);
    }


    /**
     * Show the User Profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function authProfile()
    {
        return view('profile.profile_edit')->with(['access' => Auth::user()->createToken('profile')->accessToken]);
    }


    /**
     * ask user to transfer.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sendRequest()
    {
        return view('send_request')->with(['access' => Auth::user()->createToken('request')->accessToken]);
    }


    /**
     * Show the User request to accept or deny.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function recipientRequest()
    {
        return view('recipient_request')->with(['access' => Auth::user()->createToken('request')->accessToken]);
    }


    /**
     * Show the User static.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function statical()
    {
        return view('statical')->with(['access' => Auth::user()->createToken('statical')->accessToken]);
    }


    /**
     * Show the list of favorite users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function favorite()
    {
        return view('favorite')->with(['access' => Auth::user()->createToken('favorite')->accessToken]);
    }
}
