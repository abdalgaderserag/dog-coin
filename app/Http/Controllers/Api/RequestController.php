<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\MoneyRequest;
use App\RequestMoney;
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
        $reqs = RequestMoney::where('user_id', Auth::id())->with('recipient')->get();
        $page = 1;
        $last = false;
        if (!empty($_GET['page']))
            $page = $_GET['page'];
        if ($reqs->count() <= $page * 5)
            $last = true;

        $data = [$reqs->forPage($page, 5), $last];
        $data[2] = $data[0]->count();

        return response()->json($data, 200);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recipient()
    {
        $reqs = RequestMoney::where('recipient_id', Auth::id())->with('user')->get();
        $page = 1;
        $last = false;
        if (!empty($_GET['page']))
            $page = $_GET['page'];
        if ($reqs->count() <= $page * 5)
            $last = true;

        $data = [$reqs->forPage($page, 5), $last];
        $data[2] = $data[0]->count();

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MoneyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoneyRequest $request)
    {
        $reqMoney = new RequestMoney($request->all());
        $reqMoney->user_id = Auth::id();
        $reqMoney->save();
        $reqMoney->recipient;
        return response()->json($reqMoney, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MoneyRequest $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MoneyRequest $request, $id)
    {
        $requestMoney = RequestMoney::find($id);
        $requestMoney->money = $request->money;
        $requestMoney->details = $request->details;
        $requestMoney->save();
        return response()->json($requestMoney, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestMoney = RequestMoney::find($id);
        $requestMoney->delete();
        return response()->json('Ok', 200);
    }
}
