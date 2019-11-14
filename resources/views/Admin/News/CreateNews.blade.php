@extends('Masters.Admin')
@section('title','خبر جدید')
@section('content')
<div class="container" style="direction:rtl;padding: 20px 0">
        <h2>خبر جدید</h2>
        <div style="margin-top:20px">
                <div style="display:none" id="Alert" class="alert alert-danger"></div>
                <form id="FormOfNews" onsubmit="FormOfNews(event)" method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label >عنوان :</label>
                            <input class="form-control" maxlength="64" name="News_title" placeholder="عنوان" required="required">
                        </div>
                        <div class="form-group col-md-6">
                            <label >تاریخ :</label>
                            <input type="text" name="News_Date" id="Date_Input" class="form-control text-left" placeholder="1300/01/02" required="required" onchange="DateValidation(event)">
                            <small class="">تاریخ حتما باید 10 کاراکتری باشد</small><br>
                        </div>
                    </div>
                      <div class="form-group">
                        <label >خلاصه خبر</label>
                        <input id="News_text_sumery" class="form-control" type="text" name="News_text_sumery" maxlength="120"/>
                      </div>
                      <div class="form-group">
                        <label >توضیحات:</label>
                        <textarea id="News_text" class="form-control" type="text" name="News_text" style="height:350px" ></textarea>
                      </div>
                    <div class="row mt-5">
                        <div class="form-group col-md-6">
                            <label >تصویر سربرگ :</label>
                            <input class="form-control" id="Picture_file" type="file" onchange="PictureNewsCheck(this.id)" name="Picture_file" required="required">
                            <small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small><br>
                            <small class="">حداکثر سایز تصویر 300kb</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label >تصویر کاور :</label>
                            <input class="form-control" id="Cover_Picture_file" type="file" onchange="PictureNewsCheck(this.id)" name="Cover_Picture_file" required="required">
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
                      <button disabled id="NewsSubmit" type="submit" class="btn btn-primary" style="width:150px;">ارسال</button>
                </form>
                <div id="progressBarDiv"  class="progress" style="height:30px;margin-top: 50px;display: none;">
                    <div id="progressBar" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%;height:30px" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                </div>
              </div>
              <script type="text/javascript">
                  const NewsUrl='{{ route("Do_Create_News") }}';
                  const News = '{{ route("Get_News") }}';
              </script>
            </div>
        </div>
    </div>
@endsection