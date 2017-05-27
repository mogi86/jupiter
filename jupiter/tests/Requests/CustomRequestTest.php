<?php

namespace Tests\Requests;

use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CustomRequest;

class CustomRequestTest extends TestCase
{
    /**
     * カスタムリクエストのバリデーションテスト
     *
     * @param string 項目名
     * @param string 値
     * @param boolean 期待値(true:バリデーションOK、false:バリデーションNG)
     * @dataProvider dataproviderExample
     */
    public function testExample($item, $data, $expect)
    {
        $dataList = [$item => $data];

        $request = new CustomRequest();
        $rules = $request->rules();
        $validator = Validator::make($dataList, $rules);
        $result = $validator->passes();
        $this->assertEquals($expect, $result);
    }

    public function dataproviderExample()
    {
        return [
            '正常' => ['title', 'タイトル', true],
            '必須エラー' => ['title', '', false],
            '最大文字数エラー' => ['body', str_repeat('a', 256), false],
        ];
    }

}
