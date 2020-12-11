<script>
$(function () {
  'use strict';
  var url = '/knowledge/postArticle/upload';

  // Initialize the jQuery File Upload widget:
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
    console.log(data);
    data.submit();
  }

  //アップロード完了後の処理
  function doneUpload(e, data){
    console.log("アップロード完了");
    console.log(data);
    // モーダル上の画像を再描画
    getImages();
  }

  // getで画像PATHを取得する。
  function getImages(){
    var member_id = $("#member_id").val();
    var article_id = $("#article_id").val();
    var json_param = {
      "member_id": member_id,
      "article_id": article_id
    };
    $.ajax({
      url: $('#upload-image-erea').fileupload('option', 'url'),
      type:"get",
      data:json_param,
      dataType: 'json',
      context: $('#upload-image-erea')[0]
    })
    .always(function () {
      console.log("always:画像取得")
    })
    .done(function (result) {
      console.log("done:画像取得")
      // resultから画像の配列を取得
      var result_images = result["images"];
      // 取得した画像ファイルまでのpathを生成。
      var base_pass = "{{ asset('/storage/image') }}" + "/" + member_id + "/" + article_id　+ "/";
      $('.upload-image-container').remove();
      for(var i = 0; i < result_images.length; i++){
        var image_path = base_pass + result_images[i];
        var image_container_html = '';
        image_container_html += '<div class="col-lg-3 upload-image-container">';
        image_container_html += '<img class="upload-image" src="'+image_path+'">';
        image_container_html += '<div class="upload-image-wrap">';
        image_container_html += '<button type="button" class="btn btn-light">';
        image_container_html += '<i class="glyphicon glyphicon-upload"></i>';
        image_container_html += '<span>Insert</span>';
        image_container_html += '</button>';
        image_container_html += '<button type="button" class="btn btn-danger">';
        image_container_html += '<i class="glyphicon glyphicon-trash"></i>';
        image_container_html += '<span>Delete</span>';
        image_container_html += '</button>';
        image_container_html += '</div>';
        image_container_html += '</div>';
        $('#upload-image-erea').before(image_container_html);
      }
    });
  }

  getImages();

});
</script>
