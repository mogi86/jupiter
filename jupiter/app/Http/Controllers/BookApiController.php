<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

/**
 * 書籍APIコントローラ
 */
class BookApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {}

    /**
     * 書籍情報取得
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $data = [1, 2, 3];
        return Response::json($data);
    }

    /**
     * 書籍情報登録
     */
    public function register()
    {}

    /**
     * 書籍情報更新
     */
    public function update()
    {}

    /**
     * 書籍情報削除
     */
    public function destroy()
    {}
}