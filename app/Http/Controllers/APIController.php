<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sepatu;
class APIController extends Controller
{
    public function searchsepatu(Request $request)
    {
        $cari = $request->input('q');

        $sepatu = Sepatu::where('merek','LIKE', "%$cari%")->get();
        if ($sepatu->isEmpty())
        {
            return response()->json([
                'success' => false,
                'data' => 'DATA TIDAK DITEMUKAN'
            ], 404)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:8000');
        }
        else
        {
            return response()->json([
                'success' => true,
                'data' => $sepatu
            ], 200)->header('Access-Control-Allow-Origin', 'http://127.0.0.1:8000');
        }
    }
}