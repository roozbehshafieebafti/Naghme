@extends('Masters.Admin')
@section('title','فرم جدید')

@section('content')
    <div class="container" style="direction: rtl;padding: 20px 0px;">
        <h2>فرم جدید</h2>
		<div>
            <div style="display:none" id="Alert" class="alert alert-danger"></div>
            <form id="FormOfForm" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
			    	<label >عنوان :</label>
			    	<input class="form-control" name="Form_title" placeholder="عنوان" required="required">
			  	</div>
			  	<div class="form-group">
			    	<label >توضیحات:</label>
			    	<textarea class="form-control" name="Form_text" style="resize: none;" required="required"></textarea>
			  	</div>
			  	<div class="form-group">
			    	<label >فایل PDF:</label>
			    	<input class="form-control" id="PDF_file" type="file" onchange="PdfFormCheck(this.id)" name="PDF_file" required="required">
			    	<small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small>
                  </div>
                <div class="form-group">
			    	<label >فایل WORD:</label>
			    	<input class="form-control" id="WORD_file" type="file" onchange="WordFormCheck(this.id)" name="WORD_file" >
			    	<small class="">نام فایل حتما باید شامل حروف انگلیسی یا اعداد باشد</small>
			  	</div>
			  	<button disabled id="FormSubmit" type="submit" class="btn btn-primary" style="width:150px;">ارسال</button>
            </form>
            <div id="progressBarDiv"  class="progress" style="height:30px;margin-top: 50px;display: none;">
                <div id="progressBar" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%;height:30px" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
          <script type="text/javascript">
              const FormUrl='{{ route("Create_Form") }}';
              const Form = '{{ route("Get_Forms") }}';
          </script>
        </div>
    </div>
@endsection