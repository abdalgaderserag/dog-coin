<?php

namespace App\Http\Controllers;

use App\Money;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $cardID
     * @return \Illuminate\Http\Response
     */
    public function show($cardID)
    {
        $user = Money::where('creditCardNumber', $cardID)->first();
        $user = $user->user;
        $user->money;
        return response()->json($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->authorize('users.update', Auth::user());
        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        Auth::user()->save();
        $bio = Auth::user()->bio;
        $bio->details = $request->details;
        $bio->work = $request->work;
        $bio->company = $request->company;
        $bio->work_address = $request->work_address;
        $bio->site = $request->site;
        $bio->save();
        return Auth::user();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('users.delete', $user);
        $user->delete();
        return $user;
    }
}
