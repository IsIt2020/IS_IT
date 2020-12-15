<script>
$(function () {
  'use strict';
  var ajax_url = '/postArticle/image/';
  var url = '/knowledge/postArticle/upload';
  var uploadModal = $('#imageUploadModal');
  var is_inserted = $("#is-inserted");

  function initBeforeOpenModal(){
    is_inserted.val("false");
  }

  // csrf-token周りはajaxのクラスを作成して、いちいち設定しなくて住む様にしたい。
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // fileuploadの設定
  $('#upload-image-erea').fileupload({
    url: url,
    dropZone: $('.modal-body-container'),
    fileInput: $('#upload-image-file'),
    beforeSend: function(xhr, data) {
      var file = data.files[0];
      xhr.setRequestHeader(
        'X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content')
      );
    },
    formData: {
      member_id: $("#member_id").val(),
      article_id: $("#article_id").val()
    },
    add:addFile,
    done:doneUpload,
  });

  // 画像を選択した際の処理
  function addFile(e, data){
    data.submit();
  }

  //アップロード完了後の処理
  function doneUpload(e, data){
    // モーダル上の画像を再描画
    getImages();
  }

  // getで画像PATHを取得する処理
  function getImages(){
    // ブログ記事内の画像のみを取得か、全ての画像を取得か判定用
    var checkedValue = $('.disp-images-radio:checked').val();
    var is_all = false;
    if( checkedValue == {{config('const.imageUplodModal.DISP_ALL_IMAGE')}}){
      is_all = true;
    }
    // 会員ID取得
    var member_id = $("#member_id").val();
    //記事ID取得
    var article_id = $("#article_id").val();
    var json_param = {
      "member_id": member_id,
      "article_id": article_id,
      "is_all": is_all
    };
    $.ajax({
      url: $('#upload-image-erea').fileupload('option', 'url'),
      type:"get",
      data:json_param,
      dataType: 'json'
    })
    .always(function () {
    })
    .done(function (result) {
      // resultから画像の配列を取得
      var result_images = result["images"];
      // 取得した画像ファイルまでのpathを生成。
      var base_pass = "{{ asset('/storage/image') }}" + "/";
      $('.upload-image-container').remove();
      for(var i = 0; i < result_images.length; i++){
        var image_path = base_pass + result_images[i];
        var image_container_html = '';
        image_container_html += '<div class="col-lg-3 upload-image-container">';
        image_container_html += '<img class="upload-image" src="'+image_path+'">';
        image_container_html += '<div class="upload-image-wrap">';
        image_container_html += '<input type="hidden" class="image-name" value="' + result_images[i] + '">';
        image_container_html += '<button type="button" class="btn btn-light insert-image" value="'+image_path+'">';
        image_container_html += '<i class="glyphicon glyphicon-upload"></i>';
        image_container_html += '<span>Insert</span>';
        image_container_html += '</button>';
        // 全ての画像を表示している際に、DeleteBtnは表示しない。
        if(!is_all){
          image_container_html += '<button type="button" class="btn btn-danger delete-image" value="'+result_images[i]+'">';
          image_container_html += '<i class="glyphicon glyphicon-trash"></i>';
          image_container_html += '<span>Delete</span>';
          image_container_html += '</button>';
        }
        image_container_html += '</div>';
        image_container_html += '</div>';

        $('#upload-image-erea').before(image_container_html);
      }
    });
  }

  // deleteで対象画像を削除する処理
  function deleteImageOnServer(imagePath){
    var member_id = $("#member_id").val();
    var article_id = $("#article_id").val();
    var json_param = {
      "member_id" : member_id,
      "article_id" : article_id,
      "delete_file" : imagePath
    };
    $.ajax({
      url: ajax_url+"delete",
      type:"post",
      data:json_param,
      dataType: 'json'
    })
    .always(function () {
    })
    .done(function (result) {
      console.log(result);
      // モーダル上の画像を再描画
      getImages();
    });
  }



  // 画像のinsertボタン押下時に呼ばれる。
  $(document).on("click", ".insert-image", function () {
    var file_name = $(this).val();
    var cursor_position = $('#cursor-positon').val();
    /**editorオブジェクト*/
    let editor = $('#editor');
    // カーソルの位置を基準に前後を分割して、その間に文字列を挿入
    editor.val(editor.val().substr(0, cursor_position) + file_name + editor.val().substr(cursor_position));
    // プレビュー更新
    editor.focus();
    // insertFlgをたてる
    is_inserted.val(true);
    // モダールを閉じる。
    uploadModal.modal('hide');
  });

  // 画像のdeleteボタン押下時に呼ばれる。
  $(document).on("click", ".delete-image", function () {
    deleteImageOnServer( $(this).val() );
  });

  // チェックボタンが押された際の動作
  $('.disp-images-radio').change(function(){
    getImages();
  });

  // modalがopenされる直前のイベント
  uploadModal.on('show.bs.modal', function (e) {
    // hidden要素のvalueを初期化
    initBeforeOpenModal();
    // モーダル上の画像を描画
    getImages();
  })
  // modalがcloseされる直前のイベント
  uploadModal.on('hide.bs.modal', function (e) {
    // insertされているかどうか
    if( is_inserted.val() != "true"){
      // insertされていない場合、タグを消す。
      // editorオブジェクト
      let editor = $('#editor');
      // カーソルポジション
      var cursor_position = Number($('#cursor-positon').val());
      // タグの長さ取得
      var tag0_len = Number($('#modal-tag0-len').val());
      var tag1_len = Number($('#modal-tag1-len').val());
    // カーソルの位置を基準に前後を分割して、その間に文字列を挿入
    editor.val(editor.val().substr(0, cursor_position-tag0_len) + editor.val().substr(cursor_position+tag1_len));
    }
  })

});
</script>
