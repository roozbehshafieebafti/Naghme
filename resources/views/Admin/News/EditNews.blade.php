@extends('Masters.Admin')
@section('title','ویرایش خبر')
@section('content')
    <div class="container" style="direction:rtl;padding: 20px 0">
        <h2> ویرایش خبر</h2>
        <div style="margin-top:20px">
            <div style="display:none" id="Alert" class="alert alert-danger"></div>
            <form id="EditFormOfNews" onsubmit="EditFormOfNews(event)" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label >عنوان :</label>
                <input class="form-control" maxlength="64" name="News_title" required="required" value="{{ $editabledRecord['attributes']['news_title']}}">
                  </div>
                  <div class="form-group">
                    <label >توضیحات:</label>
                    <textarea id="News_text" class="form-control" name="News_text" style="resize: none;" required="required">{{ $editabledRecord['attributes']['news_description']}}</textarea>
                  </div>
                  <div class="form-group">
                    <label >تصویر:</label>
                    <input class="form-control" id="Picture_file" type="file" onchange="PictureNewsCheck(this.id)" name="Picture_file">
                    <small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small><br>
                    <small class="">حداکثر سایز تصویر 300kb</small>
                  </div>
                <div class="form-group">
                    <label >فایل</label>
                    <input class="form-control" id="News_file" type="file" onchange="FileNewsCheck(this.id)" name="News_file" >
                    <small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small><br>
                    <small class="">فرمت فایل حتما بایستی pdf یا docx یا doc باشد</small>
                  </div>
                  <div class="form-group">
                    <label >حذف فایل</label>
                    <input  type="checkbox" name="Delete_News_file" ><br>
                    <small class="">درصورتی که میخواهید فایل موجو حذف شود تیک را بزنید</small>
                  </div>
                  {{-- <div class="form-row">
                      <div class="form-group col-4">
                          <label >نام لینک :</label>
                          <input class="form-control " name="NewsLinkName" value="{{ $editabledRecord['attributes']['news_link_name']}}"/>
                      </div>
                      <div class="form-group col-4">
                          <label >آدرس لینک :</label>
                          <input style="direction: ltr" class="form-control " value="{{ $editabledRecord['attributes']['news_link']}}" name="NewsLinkAddress" placeholder="http://www.google.com"/>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-4">
                          <label >نام لینک :</label>
                          <input class="form-control " name="NewsLinkName2" value="{{ $editabledRecord['attributes']['news_link_name2']}}"/>
                      </div>
                      <div class="form-group col-4">
                          <label >آدرس لینک :</label>
                          <input style="direction: ltr" class="form-control " value="{{ $editabledRecord['attributes']['news_link2']}}" name="NewsLinkAddress2" placeholder="http://www.google.com"/>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-4">
                          <label >نام لینک :</label>
                          <input class="form-control " name="NewsLinkName3" value="{{ $editabledRecord['attributes']['news_link_name3']}}"/>
                      </div>
                      <div class="form-group col-4">
                          <label >آدرس لینک :</label>
                          <input style="direction: ltr" class="form-control " value="{{ $editabledRecord['attributes']['news_link3']}}" name="NewsLinkAddress3" placeholder="http://www.google.com"/>
                      </div>
                  </div> --}}
                  <button id="NewsSubmit" type="submit" class="btn btn-primary" style="width:150px;">ارسال</button>
            </form>
            <div id="progressBarDiv"  class="progress" style="height:30px;margin-top: 50px;display: none;">
                <div id="progressBar" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%;height:30px" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
          <script type="text/javascript">
              const NewsUrl='{{ route("Do_Edit_News",$id) }}';
              const News = '{{ route("Get_News") }}';
          </script>
        </div>
    </div>
@endsection