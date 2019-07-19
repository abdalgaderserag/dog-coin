<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserTransferResource;
use App\Transfer;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(1);
//        TODO : remove the user and add Auth user.
        $page = 1;
        $last = false;
        if (!empty($_GET['page']))
            $page = $_GET['page'];
        $sender = $user->getTransfers();
        if ($sender->count() <= $page * 5)
            $last = true;
        $data = [$sender->forPage($page, 5), $last];
        $data[2] = $data[0]->count();
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
        $transfer = new Transfer($request->all());
        $transfer->sender_id = Auth::id();
        $transfer->save();
        return response()->json($transfer, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $transfer = Transfer::with('sender', 'recipient')->find($id);
        $data = $transfer;
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Transfer $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        $transfer->mount = $request->mount;
        $transfer->save();
        return response()->json($transfer, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws
     * @param  Transfer $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        $transfer->delete();
        return response()->json($transfer, 200);
    }
}
