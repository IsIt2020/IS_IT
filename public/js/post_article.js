// markdown用のレンダラー初期設定
function init_marked_render(){
    // marked.js + highlight.js
    var renderer = new marked.Renderer()
    // code syntax hilightの編集
    renderer.code = function (code, language) {
        return '<pre' + '><code class="hljs">' + hljs.highlightAuto(code).value + '</code></pre>';
    };
    marked.setOptions({
        renderer: renderer,
    });
}


$(function(){
  $('#l-btn').click(function(){
    if($('.post-preview-container').hasClass('hidden')){
      $('.post-edit-container').removeClass('col-lg-12');
      $('.post-edit-container').addClass('col-lg-6');
      $('.post-preview-container').removeClass('hidden');
      $('.v_line_fix').removeClass('hidden');
    }else{
      $('.post-edit-container').addClass('hidden');
      $('.v_line_fix').addClass('hidden');
    }
  });
  $('#r-btn').click(function(){
    if($('.post-edit-container').hasClass('hidden')){
      $('.post-edit-container').removeClass('hidden');
      $('.v_line_fix').removeClass('hidden');
    }else{
      $('.post-preview-container').addClass('hidden');
      $('.v_line_fix').addClass('hidden');
      $('.post-edit-container').removeClass('col-lg-6');
      $('.post-edit-container').addClass('col-lg-12');
    }
  });
  $('.showEditBtn').click(function(){
    $('.previewTab').removeClass('tab-active');
    $('.post-preview-container').addClass('container-hidden');
    $('.editTab').addClass('tab-active');
    $('.post-edit-container').removeClass('container-hidden');
  });
  $('.showPrevieBtn').click(function(){
    $('.editTab').removeClass('tab-active');
    $('.post-edit-container').addClass('container-hidden');
    $('.previewTab').addClass('tab-active');
    $('.post-preview-container').removeClass('container-hidden');
  });

  // ここから入力値をプレビューに反映処理
  // markedjs設定
  init_marked_render();
  // テキストエリア初期化
  if( window.sessionStorage.getItem(['article-content']) != null ){
    $('#textarea-content').val( window.sessionStorage.getItem(['article-content']) );
    $('#input-title').val( window.sessionStorage.getItem(['article-title']) );
    $('#pre-title').html( $('#input-title').val() );
    $('#pre-content').html( marked($('#textarea-content').val()) );
  }
  // タイトル変更時
  $('#input-title').change(function(){
    window.sessionStorage.setItem(['article-title'],$(this).val());
    $('#pre-title').html($(this).val());
  });
  // コンテンツ変更時
  $('#textarea-content').change(function(){
      window.sessionStorage.setItem(['article-content'],$(this).val());
    $('#pre-content').html(　marked($(this).val()) );
  });

  // 投稿ボタン処理
  $('post-btn').click(function()[
    $('form[name="post-form"]').submit();
  ]);
})
