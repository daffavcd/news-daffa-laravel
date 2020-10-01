<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FindController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $temp = DB::table('articles')
            ->where('title', 'like', '%' . $request->cari . '%')
            ->get();
        $kategori = DB::table('articles')
            ->groupBy('category')
            ->get();
        $data = array(
            'data' => $temp,
            'kategori' => $kategori,
            'cari' => $request->get('cari')
        );
        return view('find', $data);
    }
}