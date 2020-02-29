@extends('Masters.Admin')
@section('title','سوالات پرسشنامه')

@section('content')
	<div class="container" style="overflow: hidden;padding: 20px 0">
		<h2>ویرایش سوال</h2>
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
        <div>
            <form action="" method="POST" class="mt-5"> 
                {{ csrf_field() }} 
                <div class="row">              
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">سوال:</label>
                            <div class="col-sm-10">
                                <input name="question" type="text" value="<?php echo $editableQuestion[0]->name ;?>" class="form-control" maxlength="120">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">نوع:</label>
                            <div class="col-sm-5">
                                <select name="kind" class="form-control" name="" id="" >
                                    <option value="1" {{$editableQuestion[0]->kind == "1" ? "selected" : null}}>تستی</option>
                                    <option value="2" {{$editableQuestion[0]->kind == "2" ? "selected" : null}} >تشریحی</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 ml-1">
                    <button class="btn btn-success"> ویرایش سولات</button>
                    <a class="btn btn-danger" href="{{route('Get_All_Questions',$question_id)}}">بازگشت</a>
                </div>
            </form>
        </div>
	</div>
@endsection