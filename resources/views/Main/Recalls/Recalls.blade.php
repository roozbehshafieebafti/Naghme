@extends('Masters.Main')
@section('title',isset($Recalls[0]->name) ?  $Recalls[0]->name : "فراخوان")

@section('content')
    @include('Partials.GeneralHeader')
    {{-- آیا فراخوان موجود هست --}}
    @if (isset($Recalls[0]->name))        
        {{-- آیا فراخوان فعال هست --}}
        @if($Recalls[0]->activation == 1)
            @if($isAuth)
                {{-- تایید نهایی را انجام نداده --}}
                @if (!$isSubmited)
                    {{-- آموزش نحوه استفاده  --}}
                    <div id="RecallLearningPart" class="container recall-main-content">
                        <div class="pt-3 pb-3 pr-2 pl-2">
                            <h4>به {{$Recalls[0]->name}} خوش آمدید</h4>
                            <ul class="mt-3">
                                <li>
                                    <h6 style="text-align:justify">در این بخش تمامی مراحل بارگذاری عکس‌ها برای شما توضیح داده شده است، لطفا قبل از شروع بارگذاری <b>فیلم آموزشی</b> زیر را مشاهده کنید.</h6>
                                </li>
                                <li>
                                    <h6 style="text-align:justify">لطفا جهت اجرای بهتر سایت در طول مراحل بارگذاری، فیلترشکن خود را <b>خاموش</b> کنید.</h6>
                                </li>
                                <li>
                                    <h6 style="text-align:justify">در صورتی که از نحوه شرکت در فراخوان آگاهی دارید با کلیک به روی دکمه <b>«شروع فراخوان»</b> در انتهای صفحه، می‌توانید مراحل بارگذاری را آغاز کنید.</h6>
                                </li>
                            </ul>                            
                            <div class="p-5">
                                {{-- بارگذاری ویدئو --}}
                                <div id="20876753606"><script type="text/JavaScript" src="https://www.aparat.com/embed/blcF1?data[rnddiv]=20876753606&data[responsive]=yes"></script></div>
                            </div>
                            <div class="row p-3"> 
                                <div class="col-12 text-center">
                                    <button onclick="startRecall()" type="button" class="btn btn-primary" style="width:200px"><b>شروع فراخوان</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- محتوای فراخوان --}}
                    <div id="mainRecallContent" class="container recall-main-content" style="display:none">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="recall-tabs nav-link active" onclick="tabsClick(this)" id="information_tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">مشخصات</a>
                            </li>
                            <li class="nav-item" onchange="">
                                <a class="recall-tabs nav-link" onclick="tabsClick(this);selectUploadTab()" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">بارگذاری</a>
                            </li>
                            <li class="nav-item">
                                <a class="recall-tabs nav-link  "onclick="tabsClick(this);selectRegisterTab()" id="submit-tab" data-toggle="tab" href="#submit" role="tab" aria-controls="submit" aria-selected="false">ثبت نهایی</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">                            
                            {{-- تب اطلاعات --}}
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="pt-3">
                                    <div class="mt-3 row">
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-4 col-form-label">
                                                    <div class="recall-label-content border-bottom border-dark">
                                                        <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                        <span class="info-text-label" >نام:</span>
                                                    </div>
                                                </label>
                                                <div class="col-8">
                                                    <input class="form-control" value="{{$User['attributes']['name']}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-4 col-form-label">
                                                    <div class="recall-label-content border-bottom border-dark">
                                                        <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                        <span class="info-text-label" >نام خانوادگی:</span>
                                                    </div>
                                                </label>
                                                <div class="col-8">
                                                    <input class="form-control" value="{{$User['attributes']['family']}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-4 col-form-label">
                                                    <div class="recall-label-content border-bottom border-dark">
                                                        <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                        <span class="info-text-label" >ایمیل:</span>
                                                    </div>
                                                </label>
                                                <div class="col-8">
                                                    <input class="form-control" value="{{$User['attributes']['email']}}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div>
                                        <h5 class="pl-2">اطلاعات تکمیلی</h5>
                                        <form id="recallInformationForm" onsubmit="recallInformationSubmit(event)" >
                                            <div class="mt-3 row">
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-4 col-form-label">
                                                            <div class="recall-label-content border-bottom border-dark">
                                                                <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                                <span class="info-text-label" >کد ملی:</span>
                                                            </div>
                                                        </label>
                                                        <div class="col-8">
                                                            <input id="nationalCode" name="nationalCode" class="form-control" type="text" maxlength="10" value="{{ $UserData ? $UserData[0]->national_code : ""}}" <?php echo $UserData ? "disabled" : "" ?>>
                                                            <input id="userId" name="userId" class="form-control" type="text" maxlength="10" style="display: none" value="{{ $User['attributes']['id'] }}" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-4 col-form-label">
                                                            <div class="recall-label-content border-bottom border-dark">
                                                                <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                                <span class="info-text-label" >تاریخ تولد:</span>
                                                            </div>
                                                        </label>
                                                        <div class="col-8">
                                                            <input id="birthDate" name="birthDate" class="form-control" type="text" placeholder="**/**/****" maxlength="10" value="{{ $UserData ? $UserData[0]->birth_date : ""}}" <?php echo $UserData ? "disabled" : "" ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-4 col-form-label">
                                                            <div class="recall-label-content border-bottom border-dark">
                                                                <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                                <span class="info-text-label" >محل تولد:</span>
                                                            </div>
                                                        </label>
                                                        <div class="col-8">
                                                            <input id="birthLocation" name="birthLocation" type="text" class="form-control"   maxlength="100" value="{{ $UserData ? $UserData[0]->birth_location : ""}}" <?php echo $UserData ? "disabled" : "" ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-4 col-form-label">
                                                            <div class="recall-label-content border-bottom border-dark">
                                                                <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                                <span class="info-text-label" >شماره همراه:</span>
                                                            </div>
                                                        </label>
                                                        <div class="col-8">
                                                            <input id="phoneNumber" name="phoneNumber" class="form-control" type="text" placeholder="*********09" maxlength="11" value="{{ $UserData ? $UserData[0]->phone_number : ""}}" <?php echo $UserData ? "disabled" : "" ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-4 col-form-label">
                                                            <div class="recall-label-content border-bottom border-dark">
                                                                <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                                <span class="info-text-label" >شماره ثابت:</span>
                                                            </div>
                                                        </label>
                                                        <div class="col-8">
                                                            <input id="constantNumber" name="constantNumber" class="form-control" type="text" maxlength="20" value="{{ $UserData ? $UserData[0]->constant_number : ""}}" <?php echo $UserData ? "disabled" : "" ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-4 col-form-label">
                                                            <div class="recall-label-content border-bottom border-dark">
                                                                <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                                <span class="info-text-label" >آدرس:</span>
                                                            </div>
                                                        </label>
                                                        <div class="col-8">
                                                            <input id="address" name="address" type="text" class="form-control" maxlength="100" value="{{ $UserData ?  $UserData[0]->address : ""}}" <?php echo $UserData ? "disabled" : "" ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-4 col-form-label">
                                                            <div class="recall-label-content border-bottom border-dark">
                                                                <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                                <span class="info-text-label" style="font-size:16px">رشته تحصیلی:</span>
                                                            </div>
                                                        </label>
                                                        <div class="col-8">
                                                            <input id="major" name="major" class="form-control" type="text" placeholder=""  maxlength="100" value="{{ $UserData ? $UserData[0]->major : ""}}" <?php echo $UserData ? "disabled" : "" ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-4 col-form-label">
                                                            <div class="recall-label-content border-bottom border-dark">
                                                                <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                                <span class="info-text-label" style="font-size:15px" >مقطع تحصیلی:</span>
                                                            </div>
                                                        </label>
                                                        <div class="col-8">
                                                            <select id="levelOfEducation" name="levelOfEducation" class="form-control" type="text" placeholder="1350/01/01" maxlength="100" value="{{ $UserData ? $UserData[0]->education_level : ""}}" <?php echo $UserData ? "disabled" : "" ?>>
                                                                <option value="دیپلم" {{ isset($UserData[0]->education_level) && $UserData[0]->education_level== "دیپلم" ? "selected" : ""}}>دیپلم</option>
                                                                <option value="کاردانی" {{ isset($UserData[0]->education_level) && $UserData[0]->education_level== "کاردانی" ? "selected" : ""}}>کاردانی</option>
                                                                <option value="کارشناسی" {{ isset($UserData[0]->education_level) && $UserData[0]->education_level== "کارشناسی" ? "selected" : ""}}>کارشناسی</option>
                                                                <option value="کارشناسی ارشد" {{ isset($UserData[0]->education_level) && $UserData[0]->education_level== "کارشناسی ارشد" ? "selected" : ""}}>کارشناسی ارشد</option>
                                                                <option value="دکترا" {{ isset($UserData[0]->education_level) && $UserData[0]->education_level== "دکترا" ? "selected" : ""}}>دکترا</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-6 col-md-6 col-12 pr-4 pl-4">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-4 col-form-label">
                                                            <div class="recall-label-content border-bottom border-dark">
                                                                <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                                <span class="info-text-label" >نام دانشگاه:</span>
                                                            </div>
                                                        </label>
                                                        <div class="col-8">
                                                            <input id="univercityName" name="univercityName" type="text" class="form-control" maxlength="100" value="{{ $UserData ? $UserData[0]->univercity : ""}}" <?php echo $UserData ? "disabled" : "" ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3 row">
                                                <div class="col-12 pr-4 pl-4">
                                                    <div class="form-group">
                                                        <label style="width:150px">
                                                            <div class="border-bottom border-dark">
                                                                <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                                <span class="info-text-label">خلاصه سوابق هنری:</span>
                                                            </div>
                                                        </label>
                                                        <textarea id="brifeArtActions" name="brifeArtActions" style="height:100px;resize:none" class="form-control" maxlength="200" <?php echo $UserData ? "disabled" : "" ?>>{{ $UserData ? $UserData[0]->brife_art_expirences : ""}}</textarea>
                                                        <small>حداکثر 200 کاراکتر</small>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(!$UserData)
                                                <div class="mt-3 row">
                                                    <div class="col-12 pr-4 pl-4 d-flex justify-content-center mb-3">
                                                        <button id="recall_information_submit_btn" type="submit" class="btn btn-success" style="width:120px;height:45px"> تکمیل اطلاعات</button>
                                                    </div>
                                                </div>
                                            @endif
                                            <div id="recallInformationAllert" class="mt-3 row" style="display:none">
                                                <div class="col-12 pr-4 pl-4">
                                                    <div class="alert alert-primary " role="alert">
                                                        درحال ارسال اطلاعات، لطفا شکیبا باشید...
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="recallSendingResultAlert" class="mt-3 row" style="display:none">
                                                <div class="col-12 pr-4 pl-4">
                                                    <div id="recallSendingResultAlert_class" class="" role="alert"></div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="NextStepUpload">
                                        @if($UserData)
                                            <div class="row pt-3 pr-2 pl-2 pb-5 d-flex justify-content-center">
                                                <div class="col-10 text-right">
                                                    <span onclick="backwardToLearnPage()" class="btn btn-danger mr-1 ml-1" style="font-weight:bold"><i class="fas fa-arrow-circle-right" style="position:relative;top:3px;"></i> مرحله قبل </i></span>
                                                    <span onclick="activeUploadTab()" class="btn btn-success" style="font-weight:bold">مرحله بعد <i class="fas fa-arrow-circle-left" style="position:relative;top:3px;" ></i></span>
                                                </div>
                                            </div> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- تب بارگذاری آثار --}}
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div id="uploadingTabContent">
                                    {{-- اخطارهای زمان آپلود --}}
                                    <div class="pr-2 pl-2 pt-2"> 
                                        <ul class="alert alert-warning">
                                            <li>آثار به صورت مجموعه و بدون محدوديت در سبك و اجرا (مستند، فاين آرت، استيج، مفهومي، فتومونتاژ، كولاژ و ...) دریافت می‌گردد.</li>
                                            <li>عنوان و بیانیه (استيتمنت) برای مجموعه عکس اجباری می‌باشد.</li>
                                            <li>تعداد عکس ارسالي براي هر مجموعه: حداقل 5 و حداكثر 12 عکس.</li>
                                            <li>حداکثر سایز هر عکس : 700 <span style="font-size:16px">kb.</span></li>
                                            <li>فرمت‌های قابل قبول : <span style="font-size:16px"> png , jpg , gif</span>.</li>
                                            <li>آثار نباید دارای امضا، پاسپارتو، حاشیه، واترمارک و هر نشانه تصویری باشند.</li>
                                        </ul>
                                    </div>
                                    {{-- فرم بارگذاری --}}
                                    <form action="" id="sendingWorkForm"  enctype="multipart/form-data">
                                        <div class="row pt-2">
                                            <div class="col-xl-8 col-md-6 col-12">
                                                <div class="form-group row  pr-2 pl-2">
                                                    <label for="inputEmail3" class="col-xl-3 col-4 col-form-label">
                                                        <div class="recall-label-content border-bottom border-dark">
                                                            <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                            <span class="info-text-label" >عنوان:</span>
                                                        </div>
                                                    </label>
                                                    <div class="col-xl-6 col-8">
                                                        <input id="title" name="title" class="form-control" type="text" placeholder="" maxlength="100">
                                                        {{-- آیدی های مورد نیاز --}}
                                                        <input id="uploadUserId" name="uploadUserId" style="display:none" value="{{ $User['attributes']['id'] }}">
                                                        <input id="recallId" name="recallId"  style="display:none" value="{{ $Recalls[0]->id }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row  pr-2 pl-2">
                                                    <label for="inputEmail3" class="col-xl-3 col-4 col-form-label">
                                                        <div class="recall-label-content border-bottom border-dark">
                                                            <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                            <span class="info-text-label" >سال تولید:</span>
                                                        </div>
                                                    </label>
                                                    <div class="col-xl-6 col-8">
                                                        <input id="productionData" name="productionData" class="form-control" type="text"  maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="form-group row  pr-2 pl-2">
                                                    <label for="inputEmail3" class="col-xl-3 col-4 col-form-label">
                                                        <div class="recall-label-content border-bottom border-dark">
                                                            <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                            <span class="info-text-label" >اندازه:</span>
                                                        </div>
                                                    </label>
                                                    <div class="col-xl-6 col-8">
                                                        <input id="workSize" name="workSize" class="form-control" type="text" placeholder="100x100" maxlength="100">
                                                        <small>واحد سانتی‌متر</small>
                                                    </div>
                                                </div>
                                                <div class="form-group row  pr-2 pl-2">
                                                    <label for="inputEmail3" class="col-xl-3 col-4 col-form-label">
                                                        <div class="recall-label-content border-bottom border-dark">
                                                            <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                            <span class="info-text-label" >تکنیک:</span>
                                                        </div>
                                                    </label>
                                                    <div class="col-xl-6 col-8">
                                                        <input id="workTechniuqe" name="workTechniuqe" class="form-control" type="text" placeholder="" maxlength="100">
                                                    </div>
                                                </div>
                                                <div class="form-group row  pr-2 pl-2">
                                                    <label for="inputEmail3" class="col-xl-3 col-4 col-form-label">
                                                        <div class="recall-label-content border-bottom border-dark">
                                                            <span class="element-near-label" style="color:#f6a619">&#9672;</span>
                                                            <span class="info-text-label" >بیانیه:</span>
                                                        </div>
                                                    </label>
                                                    <div class="col-xl-6 col-8">
                                                        <input id="workStatments" name="workStatments" class="form-control" type="text" placeholder="" maxlength="100">
                                                        <small>حداکثر 100 کاراکتر</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12">                           
                                                <div class="pr-2 pl-2" id="sendingImageContainer">
                                                    <img id="sendingImagePreview" class="image-preview" src="{{ config('app.url').'picture/assets/no-image.png' }}" alt="image-preview" />
                                                </div>
                                                <div class="pr-2 pl-2">
                                                    <button onclick="selectFileClick()" class="col-12 mt-2 btn btn-info" type="button">آپلود اثر</button>
                                                </div>
                                                <div style="display: none">
                                                    <input id="pictureFile" name="pictureFile" type="file" onchange="changePicture()" />
                                                </div>
                                                <div class="pr-2 pl-2 pt-1">
                                                    <div id="sendingPictureAlert" class="alert alert-danger" style="display:none"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row pb-2 pt-4">
                                            <div class="col-12 d-flex justify-content-center">
                                                <button id="sendingWorkBtn" class="btn btn-success" style="width:120px;height:45px">ارسال اثر</button>
                                            </div>
                                        </div>
                                        <div class="row pb-2 pt-4" style="display:none" id="newPictureUploading">
                                            <div class="col-12 d-flex justify-content-center">
                                                <button onclick="uploadingFormReset()" class="btn btn-info" style="width:120px;height:45px">عکس جدید</button>
                                            </div>
                                        </div>
                                        <div class="pr-2 pl-2 pt-1">
                                            <div id="progressBarDiv"  class="progress" style="height:30px;display: none;">
                                                <div id="progressBar" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 0%;height:30px" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- اخطار ثبت با موفقیت یا خطا --}}
                                    <div id="uploadingAlert" class="pr-2 pl-2 pt-4 d-flex align-items-center justify-content-center" style="display: none">
                                        <div id="uploadingAlertElement"></div>
                                    </div>
                                    <hr>
                                    {{-- آرشیو عکس‌های کاربر --}}
                                    <div id="ArchiveContainer" class="container">                                                                                                
                                        <div id="ArchiveConterntId" class="row pt-3 pr-2 pl-2">
                                            @if(count($UserWorks)>0)
                                                @foreach ($UserWorks as $item)
                                                    <div class="col-xl-4 col-md-6 col-12">
                                                        <div class="card mt-1 mb-2" >
                                                            <img src="{{ config('app.url').$item->picture }}" class="card-img-top" alt="...">
                                                            <div class="card-body">                                    
                                                                <div style="list-style: none">
                                                                    <div class="d-flex justify-content-start">
                                                                        <span class="recall-Archive-title">عنوان:</span>
                                                                        <span>{{$item->title}}</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-start">
                                                                        <span class="recall-Archive-title">سال تولید:</span>
                                                                        <span>{{$item->production_date}}</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-start">
                                                                        <span class="recall-Archive-title">اندازه اثر:</span>
                                                                        <span>{{$item->size}}</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-start">
                                                                        <span class="recall-Archive-title">تکنیک:</span>
                                                                        <span>{{$item->technique}}</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-start">
                                                                        <span class="recall-Archive-title">بیانیه:</span>
                                                                        <span style="display:inline-block;width:200px"> {{$item->statements}}</span>
                                                                    </div>
                                                                    <div class="d-flex justify-content-end">
                                                                        <span class="recall-Archive-title text-danger" style="cursor:pointer" onclick="deleteUserWorks({{$item->id}},this,{{$User['attributes']['id']}} , {{$Recalls[0]->id}})">حذف</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                                        
                                                @endforeach
                                            @endif                                            
                                        </div>                                       
                                    </div>
                                    <div id="NextStepRegister">
                                        @if(count($UserWorks)>0)
                                            <div class="row pt-3 pr-2 pl-2 d-flex justify-content-center">
                                                <div class="col-10 text-center">
                                                    <span onclick="activeRegisterTab()" class="btn btn-info" style="width:200px;font-weight:bold">مرحله بعد</span>
                                                </div>
                                            </div> 
                                        @endif
                                    </div>
                                    <div class="pr-2 pl-2 pt-2">
                                        @if(count($UserWorks)<=0)
                                            <div id="ArchiveAlertDiv" class="alert alert-warning text-center">
                                                تاکنون تصویری ثبت نشده است
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                {{-- اخطار عدم ثبت اطلاعات --}}
                                <div id="uploadingTabAlert" class="pr-2 pl-2 pt-4 d-flex align-items-center justify-content-center" style="display: none;min-height:500px"></div>
                            </div>
                            {{-- تب ثبت نهایی --}}
                            <div class="tab-pane fade " id="submit" role="tabpanel" aria-labelledby="submit-tab">
                                <div id="registerTabContent" class="container pt-4">
                                    <div class="alert alert-warning">
                                        <ul >
                                            <li>شرایط سنی شرکت کنندگان: جوانان 18 تا 35 سال.</li>
                                            <li>آثار پس از بررسی و انتخاب توسط هیأتی متشکل از کارشناسان متخصص هنری (هیأت انتخاب) در گالری ماندگار به نمایش در می‌آیند و هیچگونه تعهدی در قبال نمایش تمامی مجموعه‌های ارسالی وجود ندارد.</li>
                                            <li>اسامی هیأت انتخاب اعلام نخواهد شد.</li>
                                            <li>انجمن هیچ مسئولیتی در قبال برداشته شدن عکس ها توسط بازدیدکنندگان سایت ندارد اما در صورت برداشت، عکس با کیفیت <span style="font-size:16px">kb</span>  70 است و قابل چاپ نمی باشد.</li>
                                            <li>آثار می توانند به صورت مجموعه یا تک بفروش برسند.</li>
                                            <li>در صورت فروش، عکس با کیفیت اصلی تحویل خریدار می‌گردد.</li>
                                            <li>در صورت فروشِ نسخه چاپی، هزینه چاپ بر عهده هنرمند می‌باشد.</li>
                                            <li>پس از فروش آثار، 80% از درآمد حاصل از فروش برای هنرمندان عضو انجمن و 70% برای سایر به حساب هنرمند منظور می‌گردد.</li>
                                            <li>فروش آثار فقط از طریق روابط عمومی انجمن انجام می‌شود.</li>
                                            <li>در صورت عدم انتخاب مجموعه توسط هیأت انتخاب، حق اعتراض برای هنرمند محفوظ می‌باشد.</li>
                                            <li>انجمن ارسال کننده را به عنوان صاحب اثر می‌شناسد و بدیهی است هرگونه مسئولیت و پاسخگویی به پیامدهای حقوقی ناشی از آن با ارسال کننده‌ی اثر خواهد بود.</li>
                                            <li>ارسال اثر به منزله پذیرش مقررات گالری می‌باشد.</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <form action="" method="POST" onsubmit="finalFormSubmition(event,{{ $User['attributes']['id'] }},{{ $Recalls[0]->id }})">
                                            <div class="custom-control custom-checkbox pl-5">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" onchange="changeSubmitBtn(this)">
                                                <label class="custom-control-label" for="customCheck1">
                                                    اینجانب 
                                                    {{$User['attributes']['name']. ' ' . $User['attributes']['family']}}،
                                                    تمام موارد فوق را مطالعه کرده و قبول دارم.
                                                </label>
                                            </div>
                                            <div class="d-flex justify-content-center mb-4 mt-2">
                                                <button class="btn btn-success" type="submit" id="finalSubmitBtn" disabled>ثبت‌نهایی</button>
                                            </div>
                                            <div id="submiAlertDiv" class=""></div>
                                        </form>
                                    </div>
                                </div>
                                {{-- اخطار عدم ثبت اطلاعات --}}
                                <div id="RegisterTabAlert" class="pr-2 pl-2 pt-4 d-flex align-items-center justify-content-center" style="display: none;min-height:500px"></div>
                            </div>
                        </div>
                    </div>                    
                @else
                    {{-- تاییدیه نهایی را انجام داده --}}
                    <div class="container recall-main-content">
                        <div class="pt-5 pb-5">
                            <div class="alert alert-success text-center">
                                <div>آثار شما برای این فراخوان ارسال شده است.</div>                                
                            </div>
                        </div>
                    </div>    
                @endif
            @else
                {{-- خطای عدم ورود --}}
                <div class="container recall-main-content">
                    <div class="pt-5 pb-5">
                        <div class="alert alert-warning text-center">
                            <div>برای ورود به فراخوان بایستی ابتدا وارد سایت شوید</div>
                            <div>برای ورود<span class="text-primary" data-toggle="modal" data-target="#exampleModalCenter" style="cursor:pointer;"> اینجا </span>کلیلک کنید</div>
                        </div>
                    </div>
                </div>
                {{-- مدال ورود و ثبت نام --}}
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" id="Actvity_Moadal_content" style="direction: rtl">
                            <div class="modal-header d-flex justify-content-between">
                                <div>
                                    <h5 class="modal-title" id="exampleModalCenterTitle">ورود به سایت</h5>
                                </div>
                                <div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>                                    
                                </div>
                            </div>
                            <div class="modal-body">
                                <form class="" method="GET" id="loginFormContent">
                                    <div class="row d-flex justify-content-between pr-2 pl-2 mb-3" >
                                        <div class="mb-3" style="position:relative;top:10px">
                                            <span style="color:#f6a619;position:relative;top:4px;">&#9672;</span>
                                            <span >ایمیل:</span>
                                        </div>
                                        <input type="email" name="email_ng" class="form-control mt-2 col-sm-9 col-12 text-right" placeholder="Enter email">                                            
                                    </div>
                                    <div class="row d-flex justify-content-between pr-2 pl-2">
                                        <div class="mb-3"  style="position:relative;top:10px">
                                            <span style="color:#f6a619;position:relative;top:4px;">&#9672;</span>
                                            <span >گذرواژه:</span>
                                        </div>
                                        <input type="password" name="password_ng" class="form-control mt-2 col-sm-9 col-12 text-right"  placeholder="Password">
                                    </div>
                                    <div class="row text-right mt-2">
                                        <div style="position:relative;top:22px;" class="text-left col-md-4">
                                            <span style="color:#f6a619">&#9672;</span>
                                            <span >کد امنیتی:</span>
                                        </div>
                                        <div class="col-md-8 col-12 captcha-container">
                                            <span id="Captcha_Image" class="login-captcha-image">{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-success mr-5" style="width:38px;height:38px;position:relative;top:15px;right:20px" onclick="captchaRefresh()"><i class="fas fa-redo-alt"></i></button>
                                        </div>                                            
                                    </div>
                                    <div class="row d-flex justify-content-between pr-2 pl-2">
                                        <div class="mb-3"  style="position:relative;top:10px">
                                            <span style="color:#FFF;position:relative;top:4px;">&#9672;</span>
                                            <span style="color:#FFF">کپچا:</span>
                                        </div>
                                        <input type="text" name="captcha_ng"  class="form-control mt-2 col-sm-9 col-12 text-left"  placeholder="لطفا کد امنیتی فوق را اینجا وارد کنید">
                                    </div>
                                    <div id="Modal_Alert" class="alert alert-danger mt-2" style="display:none"></div>
                                    <div class="d-flex justify-content-center mt-4">
                                        <button id="login_btn_activity" onclick="handleSubmit()" type="button" type="button" class="btn btn-success ml-3">ورود</button>
                                        <button type="button" type="submit" onclick="showRegisterPage()" class="btn mr-3">ثبت‌نام</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @else
            {{--   خطای نمایش عدم فعال بودن --}}
            <div class="container recall-main-content">
                <div class="pt-5 pb-5">
                    <div class="alert alert-primary text-center">
                        <div>{{$Recalls[0]->name . " فعال نیست!"}}</div>                    
                    </div>
                </div>
            </div>
        @endif
    @else
        {{-- عدم موجود بودن فراخوان  --}}
        <div class="container recall-main-content">
            <div class="pt-5 pb-5">
                <div class="alert alert-danger text-center">
                    <div>چنین فراخوانی تاکنون ثبت نشده است</div>                    
                </div>
            </div>
        </div>
    @endif
    @include('Partials.GeneralFooter')
    <script> 
        const captchaUrl = "<?php echo route('Refresh_Capthca_Route') ?>"; 
        const loginUrl = "<?php echo route('Do_Login') ?>"; 
        const registerUrl = "<?php echo route('Do_register') ?>";
        const createUserInformationUrl = "<?php echo route('Do_Create_User_information') ?>";
        var   hasUserInformation = "<?php echo  $UserData ? true : false ?>";
        const uploadWorksUrl = "<?php echo route('Do_create_User_Work') ?>";
        const baseUrl = "<?php echo config('app.url'); ?>";
        const noImageSrc = "<?php echo config('app.url').'picture/assets/no-image.png'; ?>"
    </script>
@endsection