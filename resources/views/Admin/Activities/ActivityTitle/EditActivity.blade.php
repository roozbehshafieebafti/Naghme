@extends('Masters.Admin')
@section('title','ویرایش فعالیت')

@section('content')
    <div class="container" style="overflow: hidden;padding: 20px 0">
        <h2>ویرایش فعالیت</h2>
        @if(count($errors)>0)
            <div style="margin-top: 20px">
                <ul style="direction:rtl" class="alert alert-danger">
                    @foreach($errors->all() as $val)
                        <li>{{ $val }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div>
            <form action="" class="form container" method="post" style="padding: 20px 0"  >
                {{ csrf_field() }}
				  <div class="form-group">
				    <label >عنوان:</label>
				    <input required="required" type="text" name="Activity_title" class="form-control text-left" value ="{{ $EditableActivity->at_title }}" >
				  </div>
                  <div class="form-group">
				    <label >توضیحات:</label>
				    <textarea required="required"  name="Activity_description" class="form-control text-left" style="resize:none" >{{ $EditableActivity->at_description }}</textarea>
				  </div>
                  <button id="Authorities_Submit" class="btn btn-success">ویرایش فعالیت</button>
                  <a href="{{ route('Get_Activity') }}" class="btn btn-danger text-light" style="margin-right: 20px;"><i class="fas fa-arrow-circle-left"></i> &nbsp;بازگشت &nbsp;</a>
            </form>
        </div>
    </div>
@endsection