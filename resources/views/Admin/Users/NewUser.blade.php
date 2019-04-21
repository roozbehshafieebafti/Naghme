@extends('Masters.Admin')
@section('title','عضو جدید')
@section('content')
    <div class="container" style="direction:rtl;padding: 20px 0">
        <div class="col-12">
            <h2 >عضو جدید</h2>
            @if(count($errors)>0)
				<ul class="alert alert-danger" style="margin-top: 20px">
					@foreach($errors->all() as $val)
						<li>{{ $val }}</li>
					@endforeach
                </ul>
			@endif
            <div style="margin-top:30px;min-height:300px">
                <form method="post" class="">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label >شماره عضویت</label>
                            <input type="text" maxlength="11" class="form-control" name="User_id" />
                        </div>
                        <div class="form-group col-md-4">
                            <label >نام</label>
                            <input maxlength="20" type="text" class="form-control" name="User_name"  placeholder="نام">
                        </div>
                        <div class="form-group col-md-4">
                            <label >نام خانوادگی</label>
                            <input maxlength="20" type="text" class="form-control" name="User_family" placeholder="نام خانوادگی">
                        </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-3">
                                <label >سطح عضویت </label>
                                <select name="User_level" id="" class="form-control" >
                                    <option value="1">طلایی</option>
                                    <option value="2">نقره‌ای</option>
                                    <option value="3">برنزی</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label >وضعیت </label>
                                <select name="User_Status" id="" class="form-control" >
                                    <option value="1">تمدید</option>
                                    <option value="0">عدم تمدید</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label >نوع عضویت</label>
                                <select  name="User_kind" id="" class="form-control" >
                                    <option value="1">پیوسته 1</option>
                                    <option value="2">پیوسته 2</option>
                                    <option value="3">پیوسته 3</option>
                                    <option value="4">وابسته 1</option>
                                    <option value="5">وابسته 2</option>
                                    <option value="6">دوستدار هنر </option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label >مرکز عضویت</label>
                                <select  name="User_City" id="" class="form-control" >
                                    @foreach ($City as $value)
                                    <option value="{{$value->id}}">{{$value->representation_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                            <label >رشته مربوطه</label>
                            <input type="text" class="form-control" maxlength="15" name="User_Activity" />
                        </div>
                    <button type="submit" style="width:150px" class="btn btn-primary">ثبت</button>
                 </form>
            </div>
        </div>
    </div>
    <script>const URL = "{{ config('app.url') }}";</script>
@endsection
