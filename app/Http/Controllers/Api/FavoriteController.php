<?php

namespace App\Http\Controllers\Api;

use App\Favorite;
use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteRequest;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!isset($_GET['id']))
            $data = Favorite::where('user_id', Auth::id())->get('listed_id');
        else
            $data = Favorite::where('user_id', Auth::id())->with('recipient')->get();
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FavoriteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FavoriteRequest $request)
    {
        $fav = new Favorite($request->all());
        $fav->user_id = Auth::id();
        $fav->save();
        return response('', 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorite = Favorite::find($id);
        $favorite->delete();
        return response()->json('', 200);
    }
}
