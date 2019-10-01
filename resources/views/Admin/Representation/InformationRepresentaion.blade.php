@extends('Masters.Admin')

@section('title','اطلاعات نمایندگی‌')

@section('content')
	<div class="container" style="direction: rtl;padding: 20px 0px;">
        <h2>اطلاعات نمایندگی‌</h2>
        @if(count($errors)>0)
            <div class="alert alert-danger" style="margin-top: 20px">
                @foreach($errors->all() as $val)
                    {{ $val }}
                @endforeach
            </div>
        @endif
		<div>
            <div style="margin-top: 40px;">
                <form class="container" action="" method="POST">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">سرپرست نمایندگی:</label>
                        <div class="col-sm-10">
                            <input type="text" name="representation_leader" required class="form-control" value="{{ $information[0]->representation_leader }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">آدرس:</label>
                        <div class="col-sm-10">
                            <input type="text" name="representation_address" required class="form-control" value="{{ $information[0]->representation_address }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">شماره تماس:</label>
                        <div class="col-sm-10">
                            <input type="text" name="representation_telephone" required class="form-control" value="{{ $information[0]->representation_telephone }}">
                        </div>
                    </div>
                    <button type="submit" style="margin-top:20px" class="btn btn-success">به‌روزرسانی</button>
                    <a href="{{ route('Get_Representation') }}" class="btn btn-danger text-light" style="margin-right: 20px;margin-top:20px">&nbsp;بازگشت &nbsp;<i class="fas fa-arrow-circle-left"></i></a>
                </form>
            </div>       
		</div>
	</div>
@endsection