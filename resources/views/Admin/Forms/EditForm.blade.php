@extends('Masters.Admin')
@section('title','فرم جدید')

@section('content')
    <div class="container" style="direction: rtl;padding: 20px 0px;">
        <h2>ویرایش فرم</h2>
		<div>
            <div style="display:none" id="Alert" class="alert alert-danger"></div>
            <form id="EditFormOfForm" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
			    	<label >عنوان :</label>
			    	<input class="form-control" name="Form_title" value="{{ $Forms['attributes']['form_title'] }}" required="required">
			  	</div>
			  	<div class="form-group">
			    	<label >توضیحات:</label>
			    	<textarea class="form-control" name="Form_text" style="resize: none;" required="required">{{ $Forms['attributes']['form_description'] }}</textarea>
			  	</div>
			  	<div class="form-group">
			    	<label >فایل PDF:</label>
			    	<input class="form-control" id="PDF_file" type="file" onchange="PdfFormCheck(this.id)" name="PDF_file">
                    <small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small>
                  </div>
                <div class="form-group">
			    	<label >فایل WORD:</label>
			    	<input class="form-control" id="WORD_file" type="file" onchange="WordFormCheck(this.id)" name="WORD_file" >
			    	<small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small><br>
                    <label > حذف فایل word:</label>
                    <input id="PDF_file" type="checkbox" name="Check_word_file">
			  	</div>
                  <button id="FormSubmit" type="submit" class="btn btn-primary" style="width:150px;">ارسال</button>
                  <a href="{{ route('Get_Forms') }}" class="btn btn-danger text-light" style="margin-right: 20px;"><i class="fas fa-arrow-circle-left"></i> &nbsp;بازگشت &nbsp;</a>
            </form>
            <div id="progressBarDiv"  class="progress" style="height:30px;margin-top: 50px;display: none;">
                <div id="progressBar" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%;height:30px" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
          <script type="text/javascript">
              const FormUrl='{{ route("Do_Edit_Form" , $Forms["attributes"]["id"]) }}';
              const Form = '{{ route("Get_Forms") }}';
          </script>
        </div>
    </div>
@endsection