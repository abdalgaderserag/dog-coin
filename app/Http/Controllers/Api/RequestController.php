<?php

namespace App\Http\Controllers\Api;

use App\RequestMoney;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = RequestMoney::where('user_id', Auth::id())->with('user', 'recipient');
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reqMoney = new RequestMoney($request->all());
        $reqMoney->user_id = Auth::id();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequestMoney $requestMoney
     * @return \Illuminate\Http\Response
     */
    public function show(RequestMoney $requestMoney)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RequestMoney $requestMoney
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestMoney $requestMoney)
    {
        $requestMoney->money = $request->money;
        $requestMoney->details = $request->details;
        $requestMoney->save();
        return response()->json($requestMoney, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestMoney $requestMoney
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestMoney $requestMoney)
    {
        $requestMoney->delete();
        return response()->json('Ok', 200);
    }
}
