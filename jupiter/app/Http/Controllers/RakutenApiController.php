<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RakutenApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {}

    /**
     * 楽天API取得
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $data = [1, 2, 3];
        return Response::json($data);
    }
}