@extends('Masters.Admin')
@section('title','اسلایدر')
@section('content')
    <div class="container" style="overflow: hidden;padding: 20px 0">
        <h2>اسلایدر</h2>
        @if(session('success'))
            <div class="alert alert-success" id="ServerAlert" style="">
                    {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger" style="margin-top: 30px">
                {{ session('error') }}
            </div>
        @endif
        <div class="alert alert-danger" id="Alert" style="display:none;"></div>
        <div class="mt-5 p-3 row">
            <?php $i = 0 ?>
            @foreach ($Slides as $Value)
            <div class="col-4">
                <div class="card" style="" >
                    <img src="{{ config('app.url').'/'.$Value->picture }}" class="card-img-top" >
                    <div class="card-body">
                      <form class="mt-3" method="post" style="direction:rtl" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">تصویر:</label>
                                <div class="col-sm-8">
                                    <a class="btn  col-12" id="<?php echo 'choose'.$i; ?>" style="background-color:#eac1ff" onclick="selectPictureSlider('<?php echo 'staticPicture'.$i; ?>')">انتخاب تصویر</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">عنوان:</label>
                                <div class="col-sm-8">
                                    <input name="title" type="text" class="form-control"  placeholder="" value="{{ $Value->title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">لینک:</label>
                                <div class="col-sm-8">
                                    <input style="direction:ltr" name="link" type="text" class="form-control"  placeholder="http://example.com" value="{{ $Value->link }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8">
                                    <input name="picture" style="visibility: hidden" type="file" id="<?php echo 'staticPicture'.$i; ?>" onchange="sliderPictureValidation(this.id,'<?php echo 'choose'.$i; ?>','<?php echo 'BTN'.$i; ?>')" >
                                    <input name="id" style="display:none" type="text" value="{{ $Value->id }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button id="<?php echo 'BTN'.$i; ?>" type="submit" class="btn btn-primary">ثبت</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-left" >
                                    <a href="#" class="text-secondary" style="font-size:12px" onclick="deleteSlide(event,'{{ $Value->id }}')">حذف اسلاید</a>
                                </div>
                            </div>
                        </form> 
                    </div>
                  </div>
                  <?php $i++; ?>
            </div>
            @endforeach
        </div>
        <div class="mt-33 p-3">
            <h3 class="mt-3">اسلاید جدید</h3>
            <form class="" action=" {{route('Create_Slide')}} " method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row bg-white p-3">
                    <div class="col-8">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">تصویر:</label>
                            <div class="col-sm-8">
                                <input name="picture" type="file" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">عنوان:</label>
                            <div class="col-sm-8">
                                <input name="title" type="text" class="form-control"  placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">لینک:</label>
                            <div class="col-sm-8">
                                <input style="direction:ltr" name="link" type="text" class="form-control"  placeholder="http://example.com" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" style="display:flex;align-items:center;justify-content:center">
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-success" style="width:120px;">ثبت</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript"> const Url = "{{ config('app.url') }}" ;</script>
@endsection