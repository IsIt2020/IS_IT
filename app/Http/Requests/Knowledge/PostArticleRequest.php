<?php

namespace App\Http\Requests\Knowledge;

use Illuminate\Contracts\Validation\Validator;
use App\Rules\UserPassword;
use App\Http\Requests\_BaseRequest;

class PostArticleRequest extends _BaseRequest
{
    protected function postRules(){
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'status_id' => 'required',
        ];
    }

        /**
     * バリデーションエラーのカスタム属性の取得
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'content' => 'コンテント',
            'status_id' => '記事ステータス',
        ];
    }
}