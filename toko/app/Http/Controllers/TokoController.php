<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;

class TokoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function showAll()
    {
        return response()->json(Toko::all());
    }

    public function showOne($id)
    {
        return response()->json(Toko::find($id));
    }

    public function create(Request $request)
    {
        $Toko = Toko::create($request->all());

        return response()->json($Toko, 201);
    }

    public function update($id, Request $request)
    {
        $Toko = Toko::findOrFail($id);
        $Toko->update($request->all());

        return response()->json($Toko, 200);
    }

    public function delete($id)
    {
        Toko::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
