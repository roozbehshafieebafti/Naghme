@extends('Masters.Admin')
@section('title','خبر جدید')
@section('content')
<div class="container" style="direction:rtl;padding: 20px 0">
        <h2>خبر جدید</h2>
        <div style="margin-top:20px">
                <div style="display:none" id="Alert" class="alert alert-danger"></div>
                <form id="FormOfNews" onsubmit="FormOfNews(event)" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label >عنوان :</label>
                        <input class="form-control" maxlength="64" name="News_title" placeholder="عنوان" required="required">
                      </div>
                      <div class="form-group">
                        <label >توضیحات:</label>
                        <textarea id="News_text" class="form-control" type="text" name="News_text" style="resize: none;" ></textarea>
                      </div>
                      <div class="form-group">
                        <label >تصویر:</label>
                        <input class="form-control" id="Picture_file" type="file" onchange="PictureNewsCheck(this.id)" name="Picture_file" required="required">
                        <small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small><br>
                        <small class="">حداکثر سایز تصویر 300kb</small>
                      </div>
                    <div class="form-group">
                        <label >فایل</label>
                        <input class="form-control" id="News_file" type="file" onchange="FileNewsCheck(this.id)" name="News_file" >
                        <small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small><br>
                        <small class="">فرمت فایل حتما بایستی pdf یا docx یا doc باشد</small>
                      </div>
                      {{-- <div class="form-row">
                          <div class="form-group col-4">
                              <label >نام لینک :</label>
                              <input class="form-control " name="NewsLinkName" />
                          </div>
                          <div class="form-group col-4">
                              <label >آدرس لینک :</label>
                              <input style="direction: ltr" class="form-control " name="NewsLinkAddress" placeholder="http://www.google.com"/>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-4">
                              <label >نام لینک :</label>
                              <input class="form-control " name="NewsLinkName2" />
                          </div>
                          <div class="form-group col-4">
                              <label >آدرس لینک :</label>
                              <input style="direction: ltr" class="form-control " name="NewsLinkAddress2" placeholder="http://www.google.com"/>
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-4">
                              <label >نام لینک :</label>
                              <input class="form-control " name="NewsLinkName3" />
                          </div>
                          <div class="form-group col-4">
                              <label >آدرس لینک :</label>
                              <input style="direction: ltr" class="form-control " name="NewsLinkAddress3" placeholder="http://www.google.com"/>
                          </div>
                      </div> --}}

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