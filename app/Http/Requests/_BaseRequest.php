<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Controllers\Api\baseApiController;

/**
 * Request用の基幹Requestクラス
 */
class _BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //trueにする必要がある
        return true;
    }

    /**
     * バリデーションルールを設定する
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return $this->getRules();
                break;
            case 'POST':
                return $this->postRules();
                break;
            case 'PUT':
                return $this->putRules();
                break;
            case "DELETE":
                return $this->deleteRules();
                break;
            default:
                return [];
                break;
        }
    }

    protected function getRules(){
        return [];
    }
    protected function postRules(){
        return [];
    }
    protected function putRules(){
        return [];
    }
    protected function deleteRules(){
        return [];
    }


    /**
     * バリデーションルールを設定する
     *
     * @return array
     */
    public function withValidator(Validator $validator)
    {
        switch ($this->method()) {
            case 'GET':
                return $this->getWithValidator($validator);
                break;
            case 'POST':
                return $this->postWithValidator($validator);
                break;
            case 'PUT':
                return $this->putWithValidator($validator);
                break;
            case "DELETE":
                return $this->deleteWithValidator($validator);
                break;
            default:
                return [];
                break;
        }
    }

    protected function getWithValidator(Validator $validator){
        return [];
    }
    protected function postWithValidator(Validator $validator){
        return [];
    }
    protected function putWithValidator(Validator $validator){
        return [];
    }
    protected function deleteWithValidator(Validator $validator){
        return [];
    }

        /**
     * バリデーションエラー時の動作をオーバライドして作成
     *
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        parent::failedValidation($validator);
    }
}