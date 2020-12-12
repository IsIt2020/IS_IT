<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    // 保存先ディレクトリに既に保存されている画像を全件取得
    $saved_files = Storage::files($save_path);
    // 保存されている画像のファイル名の中から最大のindexを取得。
    $max_index = 0;
    foreach ($saved_files as $file_name) {
      // ファイル名の中で"_"が最後に現れるindexを取得
      $under_bar_index = strrpos($file_name, '_');
      // ファイル名の中で"."が最後に現れるindexを取得
      $comma_index = strrpos($file_name, '.');
      //画像のファイル名のindexを取得し、$max_indexと比較
      $file_index = substr( $file_name, $under_bar_index+1, $comma_index - $under_bar_index);
      if( $max_index < $file_index){
        $max_index = $file_index;
      }
    }
    // 画像のファイル名のindexの初期値を設定
    $file_name_index = $max_index;

    foreach ($request->file('files') as $file) {
      // 画像のファイル名のindexを++1
      $file_name_index++;
      // validate

      // 元画像のファイル名を取得
      $original_file_name = $file->getClientOriginalName();
      // 拡張子を取得
      $file_extension = \File::extension($original_file_name);
      // 画像名を決定
      $image_name = "img_".$member_id."_".$file_name_index;
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
    $saved_path = 'public/image/'.$member_id.'/'.$article_id;
    // 保存先ディレクトリに保存されている画像を全件取得
    $saved_files = Storage::files($saved_path);
    //画像のファイル名を格納する配列
    $img_name_array = [];
    foreach ($saved_files as $file_path) {
      // ファイル名の中で"/"が最後に現れるindexを取得
      $slash_index = strrpos($file_path, '/');
      //画像のファイル名を取得
      $file_name = substr($file_path, $slash_index+1);
      $img_name_array[] = $file_name;
    }

    return response()->json([
      'member_id' => $member_id,
      'article_id' => $article_id,
      'images' => $img_name_array
    ]);
  }

  /**
  * 画像ファイルを削除する
  */
  public function delete(Request $request)
  {
    // 会員ID取得
    $member_id = $request->input('member_id');
    // 記事ID取得
    $article_id = $request->input('article_id');
    // 削除する画像のPATHを取得
    $delete_file = $request->input('delete_file');
    // 削除先PATH
    $delete_path = 'public/image/'.$member_id.'/'.$article_id.'/'.$delete_file;
    $delete_result = Storage::delete($delete_path);

    return response()->json([
      'result' => $delete_result
    ]);
  }

}
