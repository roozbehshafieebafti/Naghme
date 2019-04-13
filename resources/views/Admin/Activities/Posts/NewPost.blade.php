@extends('Masters.Admin')
@section('title','فعالیت اجرایی جدید')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0">
		<h2>فعالیت اجرایی جدید</h2>
		<div>
			@if(count($errors)>0)
				<div  style="margin-top: 20px">
					<ul class="alert alert-danger">
					@foreach($errors->all() as $val)
						<li>{{ $val }}</li>
					@endforeach
					</ul>
				</div>
			@endif
			<form class="form" method="post" action="" style="padding: 20px 0" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div style="display:none" id="Alert" class="alert alert-danger"></div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label >عنوان :</label>
                        <input type="text" name="Post_tite" class="form-control text-left" placeholder="عنوان" required="required">
                    </div>
                    <div class="form-group col-md-6">
                        <label >دسته‌بندی :</label>
                        <select name="Catigory" class="form-control" >
                            @if (count($title) > 0)
                                @foreach ($title as $value)
                                    <option value="{{$value->id}}"> {{$value->at_title}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label >تصویر سر برگ :</label>
                    <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture" name="Post_First_Picture" class="form-control text-left" required="required" >
                </div>
				<div class="form-group">
				    <label >توضیحات</label>
				    <textarea style="resize:none;height:300px" type="text" name="Post_Description" class="form-control" required="required"></textarea>
				  </div>
				<button id="PostSubmit" class="btn btn-success">پست فعالیت</button>
				<a href="{{ route('Get_Posts') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
			</form>
		</div>
	</div>
@endsection