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
  }

  $.ajax({
    // Uncomment the following to send cross-domain cookies:
    //xhrFields: {withCredentials: true},
    url: $('#upload-image-erea').fileupload('option', 'url'),
    dataType: 'json',
    context: $('#upload-image-erea')[0]
  })
  .always(function () {
    console.log("")
  })
  .done(function (result) {
    $(this)
      .fileupload('option', 'done')
      // eslint-disable-next-line new-cap
      .call(this, $.Event('done'), { result: result });
  });

});
</script>
