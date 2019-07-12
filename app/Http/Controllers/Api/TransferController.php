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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        TODO : remover the user and add Auth user.
        $user = User::find(1);
        $sender = $user->getTransfers();
        return response()->json($sender, 200);
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
        $transfer = Transfer::with('sender','recipient')->find($id);
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
