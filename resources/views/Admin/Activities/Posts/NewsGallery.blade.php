@extends('Masters.Admin')
@section('title','فعالیت های اجرایی')

@section('content')
	<div class="" style="overflow: hidden;padding: 20px 0">
        <h2>نگاه رسانه "{{$postName}}"</h2>
        <div style="display:none" id="Alert" class="alert alert-danger"></div>
		@if(session('success'))
			<div class="alert alert-success" style="margin-top: 30px">
				{{ session('success') }}
			</div>
		@endif
		@if(session('error'))
			<div class="alert alert-danger" style="margin-top: 30px">
				{{ session('error') }}
			</div>
		@endif
        @if (count($Gallery) > 0)
            <div class="row">
                @foreach ($Gallery as $value)
                    <div class="contain col-2">
                        <img src="{{ config('app.url').'/'.$value->picture_name }}" class="image" style="width:100%">
                        <div class="middle">
                            <a href="{{ route('Delete_News_Post_Picture',$value->id) }}" class="btn text-white text" class="">حذف</a>
                        </div>
                        <p>{{$value->picture_title}}</p>
                    </div>
                @endforeach
            </div>            
        @else
            <div class="alert alert-warning" style="margin-top: 30px">
                تاکنون "تصویری" ثبت نشده است
            </div>
        @endif
    </div>
    <div>
        <form id="PostGalleryForm" action="" enctype="multipart/form-data">
            <div class="row pl-4 pr-4">
                <label >تصویر 1 :</label>
                <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture1" name="picture1" class=" text-left col-4" required="required" >
                <input type="text" onchange="" id="" name="Post_Picture_Title1" class="col-4" placeholder="عنوان عکس" maxlength="120">
            </div>
            <div class="row pl-4 pr-4 mt-3">
                <label >تصویر 2 :</label>
                <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture2" name="picture2" class="text-left col-4" >
                <input type="text" onchange="" id="" name="Post_Picture_Title2" class="col-4" placeholder="عنوان عکس" maxlength="120">
            </div>
            <div class="row pl-4 pr-4 mt-3">
                <label >تصویر 3 :</label>
                <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture3" name="picture3" class=" text-left col-4">
                <input type="text" onchange="" id="" name="Post_Picture_Title3" class="col-4" placeholder="عنوان عکس" maxlength="120">
            </div>
            <div class="row pl-4 pr-4 mt-3">
                <label >تصویر 4 :</label>
                <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture4" name="picture4" class="text-left col-4">
                <input type="text" onchange="" id="" name="Post_Picture_Title4" class="col-4" placeholder="عنوان عکس" maxlength="120">
            </div>
            <div class="row pl-4 pr-4 mt-3">
                <label >تصویر 5 :</label>
                <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture5" name="picture5" class="text-left col-4">
                <input type="text" onchange="" id="" name="Post_Picture_Title5" class="col-4" placeholder="عنوان عکس" maxlength="120">
            </div>
            <div style="padding:20px">
                <button  id="PostSubmit" class="btn btn-success">پست تصاویر</button>
                <a href="{{ route('Get_Posts') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </form>
        <div id="progressBarDiv"  class="progress" style="height:30px;margin-top: 50px;display: none;">
            <div id="progressBar" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%;height:30px" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
        </div>
    </div>
    <script type="text/javascript">
        const FormUrl='{{ route("Insert_News_Post_Gallery", ["id"=>$id , "postName"=>$postName]) }}';
        const Form = '{{ route("Get_News_Post_Gallery",["id"=>$id , "postName"=>$postName]) }}';
    </script>
@endsection