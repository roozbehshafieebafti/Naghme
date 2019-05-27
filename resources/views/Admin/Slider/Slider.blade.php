@extends('Masters.Admin')
@section('title','اسلایدر')
@section('content')
    <div class="container" style="overflow: hidden;padding: 20px 0">
        <h2>اسلایدر</h2>
        <div class="alert alert-danger" id="Alert" style="display:none;"></div>
        <div class="mt-5 p-3 row">
            @for ($i = 0; $i < 3; $i++)
                <div class="card col-4" style="" >
                    <img src="" class="card-img-top" >
                    <div class="card-body">
                      <form class="mt-3" method="post" style="direction:rtl">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">تصویر:</label>
                                <div class="col-sm-8">
                                    <a class="btn  col-12" id="<?php echo 'choose'.$i; ?>" style="background-color:#eac1ff" onclick="selectPictureSlider('<?php echo 'staticPicture'.$i; ?>')">انتخاب تصویر</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">عنوان:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputPassword" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">لینک:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputPassword" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8">
                                    <input style="visibility: hidden" type="file" id="<?php echo 'staticPicture'.$i; ?>" onchange="sliderPictureValidation(this.id,'<?php echo 'choose'.$i; ?>')" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-primary">ثبت</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                  </div>
                {{-- --}}
            @endfor
        </div>
    </div>
@endsection