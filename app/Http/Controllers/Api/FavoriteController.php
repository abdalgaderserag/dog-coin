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
     *
     * @throws 403
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('favorite.view');
        if (!isset($_GET['id']))
            $data = Favorite::where('user_id', Auth::id())->get('listed_id');
        else
            $data = Favorite::where('user_id', Auth::id())->with('recipient')->get();
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @throws 403
     * @param  FavoriteRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FavoriteRequest $request)
    {
        if (Auth::id() == $request->listed_id)
            return response("You can't add your self!", 405);
        $this->authorize('favorite.create');
        $fav = new Favorite($request->all());
        $fav->user_id = Auth::id();
        $fav->save();
        return response($fav->id, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     *
     * @throws 403
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorite = Favorite::find($id);
        $this->authorize('favorite.delete', $favorite);
        $favorite->delete();
        return response()->json('', 200);
    }
}
