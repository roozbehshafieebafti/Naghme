@extends('Masters.Admin')
@section('title','فعالیت های اجرایی')

@section('content')
	<div class="" style="overflow: hidden;padding: 20px 0">
        <h2>گالری تصاویر "{{$postName}}"</h2>
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
                        <img src="{{ config('app.url').'/'.$value->apic_picture_name }}" class="image" style="width:100%">
                        <div class="middle">
                            <a href="{{ route('Delete_Post_Picture',$value->id) }}" class="btn text-white text" class="">حذف</a>
                        </div>
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
            <div>
                <label >تصویر 1 :</label>
                <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture1" name="picture1" class=" text-left col-6" required="required" >
            </div>
            <div >
                <label >تصویر 2 :</label>
                <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture2" name="picture2" class="text-left col-6" >
            </div>
            <div >
                <label >تصویر 3 :</label>
                <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture3" name="picture3" class=" text-left col-6">
            </div>
            <div>
                <label >تصویر 4 :</label>
                <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture4" name="picture4" class="text-left col-6">
            </div>
            <div >
                <label >تصویر 5 :</label>
                <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture5" name="picture5" class="text-left col-6">
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
        const FormUrl='{{ route("Insert_Post_Gallery", ["id"=>$id , "postName"=>$postName]) }}';
        const Form = '{{ route("Get_Post_Gallery",["id"=>$id , "postName"=>$postName]) }}';
    </script>
@endsection