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
    // autoUpload: false,
    // add:addFile,
    // done:uploadedFile,
  });

  // 画像を選択した際の処理
  function addFile(e, data){
    console.log(data);
  }

  //アップロード完了後の処理
  function uploadedFile(e, data){
  }

});
</script>
