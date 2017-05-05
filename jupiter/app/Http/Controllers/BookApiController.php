<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestFacades;
use Illuminate\Support\Facades\Response;
use App\Services\BookService;

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
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * 書籍情報取得
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $getParamList = RequestFacades::all();
        //不要なGETパラメータを除去
        $formedGetParamList = $this->bookService->removeUnnecessaryGetParam(collect($getParamList));
        //書籍情報取得
        $bookInfoList = $this->bookService->getBookInfo($formedGetParamList);
        return $bookInfoList->toJson(JSON_UNESCAPED_UNICODE);
    }

    /**
     * 書籍情報登録
     */
    public function store(Request $request)
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