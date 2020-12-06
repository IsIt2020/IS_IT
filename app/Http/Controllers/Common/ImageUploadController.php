<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
  /**
  * ファイルアップロー時に呼び出されるメソッド
  */
  public function upload(Request $request)
  {
    $path = $request->file('file')->store('public/img');
    if ($request->file('file')->isValid([])) {

    } else {

    }
  }
}
