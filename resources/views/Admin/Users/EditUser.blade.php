@extends('Masters.Admin')
@section('title','ویرایش اعضا')
@section('content')
    <div class="container" style="direction:rtl;padding: 20px 0">
        <div class="col-12">
            <h2 >ویرایش اعضا</h2>
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
                        <div class="form-group col-md-6">
                            <label >نام</label>
                            <input value="{{ $User['attributes']['naghme_user_name'] }}" maxlength="20" type="text" class="form-control" name="User_name"  placeholder="نام">
                        </div>
                        <div class="form-group col-md-6">
                            <label >نام خانوادگی</label>
                            <input value="{{ $User['attributes']['naghme_user_family'] }}" maxlength="20" type="text" class="form-control" name="User_family" placeholder="نام خانوادگی">
                        </div>
                    </div>
                    <div class="form-row">
                            <div class="form-group col-md-6">
                                <label >سطح عضویت </label>
                                <select name="User_level" id="" class="form-control" >
                                    <option <?php echo $User['attributes']['naghme_user_level']==1 ? 'selected' : '' ?> value="1">طلایی</option>
                                    <option <?php echo $User['attributes']['naghme_user_level']==2 ? 'selected' : '' ?> value="2">نقره‌ای</option>
                                    <option <?php echo $User['attributes']['naghme_user_level']==3 ? 'selected' : '' ?> value="3">برنزی</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label >وضعیت </label>
                                <select name="User_Status" id="" class="form-control" >
                                    <option <?php echo $User['attributes']['naghme_user_status']==1 ? 'selected' : '' ?> value="1">تمدید</option>
                                    <option <?php echo $User['attributes']['naghme_user_status']==0 ? 'selected' : '' ?> value="0">عدم تمدید</option>
                                </select>
                            </div>
                        </div>

                    <div class="form-group">
                        <label >نوع عضویت</label>
                        <input value="{{ $User['attributes']['naghme_user_kind'] }}" type="text" class="form-control" maxlength="15" name="User_kind" />
                    </div>
                    <div class="form-group">
                            <label >زمینه فعالیت</label>
                            <input type="text" value="{{ $User['attributes']['naghme_user_activity'] }}" class="form-control" maxlength="15" name="User_Activity" />
                        </div>
                    <div class="form-group">
                            <label >شماره عضویت</label>
                            <input type="text" value="{{ $User['attributes']['naghme_user_id_card'] }}" maxlength="11" class="form-control" name="User_id" />
                        </div>
                    <button type="submit" style="width:150px" class="btn btn-primary">ثبت</button>
                 </form>
            </div>
        </div>
    </div>
    <script>const URL = "{{ config('app.url') }}";</script>
@endsection
