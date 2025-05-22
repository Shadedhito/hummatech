<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function autocomplete(Request $request)
{
    $query = $request->get('query');
    $data = Siswa::where('nama', 'like', "%$query%")->select('id', 'nama')->get();
    return response()->json($data);
}
}
