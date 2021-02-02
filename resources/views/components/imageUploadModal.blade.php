<!-- modalを開きたいボタン等に以下の属性を付与してください -->
<!-- data-toggle="modal" data-target="#imageUploadModal" -->

<!-- カーソル位置保持用 -->
<input type="hidden" id="cursor-positon" value="">
<!-- 画像タグ長さ保持用 -->
<input type="hidden" id="modal-tag0-len" value="">
<input type="hidden" id="modal-tag1-len" value="">
<!-- modalを閉じる際にinsertしたかどうか判断 -->
<input type="hidden" id="is-inserted" value="false">

<!-- Modal -->
<div class="modal fade" id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<!-- <div class="" id="imageUploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Image upload</h5>

        <div class="disp-images-radio-group mr-0 ml-auto">
          <input type="radio" class="disp-images-radio" name="disp_images_group" id="thisBlogImages" value="{{config('const.imageUplodModal.DISP_THIS_ARTICLE_IMAGE')}}" checked/>
          <label for="thisBlogImages">this blog</label>
          <input type="radio" class="disp-images-radio" name="disp_images_group" id="allImages" value="{{config('const.imageUplodModal.DISP_ALL_IMAGE')}}"/>
          <label for="allImages">all</label>
        </div>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body container modal-body-container">
        <div class="row" id="images-container">
          <!-- ここにdiv要素が追加されていきます。 -->
          <!-- 要素自体の生成はとりあえず、resources/views/components/fileUploadScript.blade.phpで行っています。 -->
          <!-- ここまでdiv要素が追加されていきます。 -->
          <div id="upload-image-erea" class="col col-lg-3">
            <input type="hidden" id="member_id" name="member_id" value="1">
            <input type="hidden" id="article_id" name="article_id" value="temp">
            <input id="upload-image-file" type="file" name="files[]" multiple="" accept="image/*">
            <label for="upload-image-file" class="fileinput-button">
              <i class="fas fa-plus-square"></i>
              <p class="ml-1">Add image</p>
            </label>
          </div>
        </div>
      </div>

      @if (count($errors) > 0)
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{ $error }} </div>
        @endforeach 
      @endif

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>