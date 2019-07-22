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
     *
     * @throws 403
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('transfers.view');
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
     *
     * @throws 403
     * @return \Illuminate\Http\Response
     */
    public function recipient()
    {
        $this->authorize('transfers.view');
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
     *
     * @throws 403
     * @param  MoneyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoneyRequest $request)
    {
        if (Auth::id() == $request->recipient_id)
            return response("You can't add your self!", 405);
        $this->authorize('transfers.view');
        $reqMoney = new RequestMoney($request->all());
        $reqMoney->user_id = Auth::id();
        $reqMoney->save();
        $reqMoney->recipient;
        return response()->json($reqMoney, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     *
     * @throws 403
     * @param  MoneyRequest $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MoneyRequest $request, $id)
    {
        if (Auth::id() == $request->recipient_id)
            return response("You can't add your self!", 405);
        $requestMoney = RequestMoney::find($id);
        $this->authorize('transfers.update', $requestMoney);
        $requestMoney->money = $request->money;
        $requestMoney->details = $request->details;
        $requestMoney->save();
        return response()->json($requestMoney, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws 403
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requestMoney = RequestMoney::find($id);
        $this->authorize('transfers.delete', $requestMoney);
        $requestMoney->delete();
        return response()->json('Ok', 200);
    }
}
