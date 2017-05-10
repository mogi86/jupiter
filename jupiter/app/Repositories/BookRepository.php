<?php

namespace App\Repositories;

use App\Models\Book;
use \Illuminate\Support\Collection;

class BookRepository
{
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * 書籍情報取得
     *
     * @param Collection パラメータリスト
     * @return Collection 書籍情報リスト
     */
    public function getBookInfo(Collection $getParamList)
    {
        if (empty($getParamList)) {
            return collect();
        }

        $select = [
            'isbn_code',
            'title',
            'author',
            'publisher',
            'genre',
            'leading_status',
            'borrower_user_id',
        ];

        $book = Book::select($select);
        //パラメータで指定されたカラムに対して部分検索
        foreach ($getParamList as $colName => $value) {
            $book->orWhere($colName, 'LIKE', "%$value%");
        }
        return $book->get();
    }

    public function resisterBook(Collection $bookList)
    {
        foreach ($bookList as $key => $value) {
            $this->book->$key = $value;
        }
        $this->book->save();
    }

}
