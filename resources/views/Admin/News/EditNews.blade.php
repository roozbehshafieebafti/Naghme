@extends('Masters.Admin')
@section('title','ویرایش خبر')
@section('content')
    <div class="container" style="direction:rtl;padding: 20px 0">
        <h2> ویرایش خبر</h2>
        <div style="margin-top:20px">
            <div style="display:none" id="Alert" class="alert alert-danger"></div>
            <form id="EditFormOfNews" onsubmit="EditFormOfNews(event)" method="post" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label >عنوان :</label>
                        <input class="form-control" maxlength="64" name="News_title" required="required" value="{{ $editabledRecord['attributes']['news_title']}}">
                    </div>
                    <div class="form-group col-md-6">
                        <?php
                            $_date = new \App\Model\News();
                        ?>
                        <label >تاریخ :</label>
                        <input type="text" name="News_Date" id="Date_Input" class="form-control text-left" value="<?php echo $_date->getNewsDateAttribute($editabledRecord['attributes']['news_date']) ?>" placeholder="1300/01/02" required="required" onchange="DateValidation(event)">
                        <small class="">تاریخ حتما باید 10 کاراکتری باشد</small><br>
                    </div>
                </div>
                  <div class="form-group">
                    <label >توضیحات:</label>
                    <textarea id="News_text" class="form-control" name="News_text" style="height:350px;" required="required">{{ $editabledRecord['attributes']['news_description']}}</textarea>
                  </div>
                <div class="row mt-5">
                    <div class="form-group col-md-6">
                        <label >تصویر سربرگ :</label>
                        <input class="form-control" id="Picture_file" type="file" onchange="PictureNewsCheck(this.id)" name="Picture_file">
                        <small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small><br>
                        <small class="">حداکثر سایز تصویر 300kb</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label >تصویر کاور :</label>
                        <input class="form-control" id="Cover_Picture_file" type="file" onchange="PictureNewsCheck(this.id)" name="Cover_Picture_file">
                        <small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small><br>
                        <small class="">حداکثر سایز تصویر 300kb</small>
                    </div>
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