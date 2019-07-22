<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\TransferRequest;
use App\Transfer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
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
        $user = Auth::user();
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
     * @throws 403
     * @param  TransferRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransferRequest $request)
    {
        $this->authorize('transfers.create');
        $transfer = new Transfer($request->all());
        $transfer->sender_id = Auth::id();
        $transfer->save();
        return response()->json($transfer, 200);
    }

    /**
     * Display the specified resource.
     *
     * @throws 403
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $transfer = Transfer::with('sender', 'recipient')->find($id);
        $this->authorize('transfers.update', $transfer);
        $data = $transfer;
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws 403
     * @param  TransferRequest $request
     * @param  Transfer $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(TransferRequest $request, Transfer $transfer)
    {
        $this->authorize('transfers.update', $transfer);
        $transfer->mount = $request->mount;
        $transfer->save();
        return response()->json($transfer, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws 403
     * @param  Transfer $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        $this->authorize('transfers.delete', $transfer);
        $transfer->delete();
        return response()->json($transfer, 200);
    }
}
