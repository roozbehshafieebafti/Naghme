@extends('Masters.Main')

@section('title','عضویت')

@section('content')
    @include('Partials.GeneralHeader')
        <div class="container membership-main-container" style="direction:rtl;">
            <div class="">
                <p class="Membership-title">مزایای عضویت</p>
                <ul class="">
                    @foreach ($score as $item)
                        <li class="HPP-li">
                            {{ $item->score_description }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <h4 style="padding-top:40px;padding-right:40px">
                جهت عضویت در انجمن نغمه ماندگار
                <a target="_blanck" href="https://docs.google.com/forms/d/e/1FAIpQLSfawmCCj5JpKAWVl3zOacbaHscwll9n0_RCfFqt7kwDK8oX9Q/viewform?usp=sf_link">اینجا</a>
                کلیک نمایید
            </h4>
            <div style="padding-top:60px" class="mb-5 mt-5">
                <div class="Membership-header-div">
                    <div class="Membership-red-boarder d-flex justify-content-end">
                        <h4 class="Membership-eftekhari-title  bg-white"> 
                            <div class="authorities-title">
                                اعضای افتخاری
                            </div>
                            <div style="z-index:1" class="authorities-title-border-yellow"></div>
                            <div class="authorities-title-border-black bg-white"></div>
                        </h4>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-center">
                        <div class="membership-container">
                            <div class="membership-img-container">
                                <img class="membership-img" src="{{ config('app.url').'picture/membership/1.jpg' }}" alt="استاد داریوش برهانی" title="استاد داریوش برهانی">
                            </div>
                            <div class="membership-fullname-container ">
                                <p class="membership-fullname">استاد داریوش برهانی</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="membership-container">
                            <div class="membership-img-container">
                                <img class="membership-img" src="{{ config('app.url').'picture/membership/2.jpg' }}" alt="استاد حمید ایلاقی" title="استاد حمید ایلاقی">
                            </div>
                            <div class="membership-fullname-container ">
                                <p class="membership-fullname">استاد حمید ایلاقی</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="membership-container">
                            <div class="membership-img-container">
                                <img class="membership-img" src="{{ config('app.url').'picture/membership/5.jpg' }}" alt="استاد عطاالله مشرف‌زاده" title="استاد عطاالله مشرف‌زاده">
                            </div>
                            <div class="membership-fullname-container ">
                                <p class="membership-fullname" id="Moshref">استاد عطاالله مشرف‌زاده</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="membership-container">
                            <div class="membership-img-container">
                                <img class="membership-img" src="{{ config('app.url').'picture/membership/3.jpg' }}" alt="استاد سعادت ارجمند" title="استاد سعادت ارجمند">
                            </div>
                            <div class="membership-fullname-container ">
                                <p class="membership-fullname">استاد سعادت ارجمند</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="membership-container">
                            <div class="membership-img-container">
                                <img class="membership-img" src="{{ config('app.url').'picture/membership/4.jpg' }}" alt="استاد محمد میرزایی" title="استاد محمد میرزایی">
                            </div>
                            <div class="membership-fullname-container ">
                                <p class="membership-fullname">استاد محمد میرزایی</p>
                            </div>
                        </div>
                    </div>     
                    <div class="d-flex justify-content-center">
                        <div class="membership-container">
                            <div class="membership-img-container">
                                <img class="membership-img" src="{{ config('app.url').'picture/membership/6.jpg' }}" alt="استاد سیروس خاندانی" title="استاد سیروس خاندانی">
                            </div>
                            <div class="membership-fullname-container ">
                                <p class="membership-fullname"  id="Siroos">استاد سیروس خاندانی</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('Partials.GeneralFooter')
@endsection