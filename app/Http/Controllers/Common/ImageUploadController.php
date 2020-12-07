<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
  /**
  * 画像ファイルアップロー時に呼び出されるメソッド
  */
  public function upload(Request $request)
  {
    // 会員ID取得
    $member_id = $request->input('member_id');
    // 記事ID取得
    $article_id = $request->input('article_id');
    // 保存先PATH
    $save_path = 'public/image/'.$member_id.'/'.$article_id;

    foreach ($request->file('files') as $file) {
      // validate

      // 元画像のファイル名を取得
      $original_file_name = $file->getClientOriginalName();
      // 拡張子を取得
      $file_extension = \File::extension($original_file_name);
      // 画像名を決定
      $image_name = "test";
      // 画像名と拡張子を結合
      $file_name = $image_name.".".$file_extension;
      // 画像を保存
      $path = $file->storeAs($save_path, $file_name);
    }
  }

  /**
  * 画像ファイルを取得するメソッド
  */
  public function getImages(Request $request)
  {
    // 会員ID取得
    $member_id = $request->input('member_id');
    // 記事ID取得
    $article_id = $request->input('article_id');
    // 保存先PATH
    $save_path = 'public/image/'.$member_id.'/'.$article_id;
    
  }
}
