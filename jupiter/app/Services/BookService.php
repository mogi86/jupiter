<?php

namespace App\Services;

use App\Repositories\BookRepository;
use \Illuminate\Support\Collection;

class BookService
{
    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * 不要なパラメータを除去
     *
     * @param Collection $getParamList
     */
    public function removeUnnecessaryGetParam(Collection $getParamList)
    {
        if (empty($getParamList)) {
            return collect();
        }

        $formedGetParamList = collect();

        $necessaryGetParamList = [
            'isbn_code',
            'title',
            'author',
            'publisher',
            'genre',
            'leading_status',
            'borrower_user_name',
        ];

        //不要なパラメータは除去
        foreach ($necessaryGetParamList as $getKey) {
            if ($getParamList->has($getKey)) {
                $formedGetParamList->put($getKey, $getParamList->get($getKey));
            }
        }

        return $formedGetParamList;
    }

    /**
     * 書籍情報取得
     *
     * @param Collection 編集後GETパラメータリスト
     */
    public function getBookInfo(Collection $formedGetParamList)
    {
        if (empty($formedGetParamList)) {
            return collect();
        }

        return $this->bookRepository->getBookInfo($formedGetParamList);
    }
}
