@extends('Masters.Admin')
@section('title','ویرایش فعالیت اجرایی')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0">
        <h2>ویرایش فعالیت اجرایی</h2>
        <div id="Spining" class="text-center" style="display:none">
                <div  class="spinner-border text-warning" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
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
                        <input type="text" name="Post_tite" class="form-control text-left" value="{{ $Post['attributes']['apst_title'] }}" required="required">
                    </div>
                    <div class="form-group col-md-3">
                        <label >دسته‌بندی :</label>
                        <select onchange="GetSubTitle(this.value)" name="Catigory" class="form-control" >
                            @if (count($title) > 0)
                                @foreach ($title as $value)
                                    <option 
                                    value="{{$value->id}}" 
                                        @if ($value->id == $Post['attributes']['apst_activities_title_id'])
                                            {{ 'selected' }}
                                        @endif
                                    > {{$value->at_title}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                            <label >زیرمجموعه :</label>
                            <select  id="SubTitle" name="Sub_Catigory" class="form-control" >
                                @if (count($SubTitle) > 0)
                                    @foreach ($SubTitle as $value)
                                        <option 
                                        value="{{$value->id}}" 
                                            @if ($value->id == $Post['attributes']['apst_sub_activities_title_id'])
                                                {{ 'selected' }}
                                            @endif
                                        > {{$value->sat_title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                </div>
                <div class="form-group">
                    <label >تصویر سر برگ :</label>
                    <input type="file" onchange="PostPictureCheck(this.id)" id="Post_First_Picture" name="Post_First_Picture" class="form-control text-left" >
                </div>
				<div class="form-group">
				    <label >متن پست :</label>
				    <textarea style="resize:none;height:300px" type="text" name="Post_Description" class="form-control" required="required">{{ $Post['attributes']['apst_description'] }}</textarea>
				  </div>
				<button id="PostSubmit" class="btn btn-success">پست فعالیت</button>
				<a href="{{ route('Get_Posts') }}" class="btn btn-danger text-light" style="margin-right: 20px;">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
            </form>
            <script>
                const BaseUrl = "{{ config('app.url') }}";
            </script>
		</div>
	</div>
@endsection