<?php

namespace App\Http\Controllers\Api;

use App\Money;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data = Auth::user()->money;
        return response()->json($data,200);
    }
}
