@extends('Masters.Admin')
@section('title','مسئول جدید')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0">
		<h2>ورود مسئول جدید</h2>
		<div>
			<div id="Alert" class="alert alert-danger" style="display: none;">
				
			</div>
			@if(count($errors)>0)
				<ul class="alert alert-danger" style="margin-top: 20px">
					@foreach($errors->all() as $val)
						<li>{{ $val }}</li>
					@endforeach
				</ul>
			@endif
			<form class="form" method="POST" action=" {{ route('Do_Create_Representation_Authorities') }} " style="padding: 20px 0" enctype="multipart/form-data">
                {{ csrf_field() }}
				<input type="hidden" name="CityId" value ="{{$id}}">
				<div class="row">
				  <div class="form-group col-6">
				    <label >نام:</label>
				    <input required="required" type="text" name="Authorities_name" class="form-control text-left" placeholder="" >
				  </div>
				  <div class="form-group col-6">
				    <label >نام خانوادگی:</label>
				    <input required="required" type="text" name="Authorities_family" class="form-control text-left" placeholder="" >
				  </div>   
				</div>
				<div class="row">
				  <div class="form-group col-6">
				    <label >واحد</label>
				    <input required="required" type="text" name="Authorities_unit_title" class="form-control text-left" placeholder="" >				    
				  </div>
				  <div class="form-group col-6">
				    <label >سمت</label>
				    <input required="required" type="text" name="Authorities_title" class="form-control text-left" placeholder="" >				    
				  </div>
				</div>
				  <div class="form-group">
				    <label >رزومه:</label>
				    <textarea style="resize: none" required="required" name="Authorities_cv" class="form-control text-left" ></textarea>
				  </div>
				  <div class="form-group">
				    <label >عکس:</label>
				    <input id="Authorities_picture" type="file" name="Authorities_picture" onchange="AuthoritiesPicture(event)" class="form-control" placeholder="" >
				    <small id="" class="form-text text-muted">حداکثر سایز 300 کیلو بایت</small>
				    <small id="" class="form-text text-muted">نام تصویر حتما باید انگلیسی یا عدد باشد</small>
				  </div>
				
				<button id="Authorities_Submit" disabled class="btn btn-success">ثبت مسئول</button>
			</form>
		</div>
	</div>
@endsection