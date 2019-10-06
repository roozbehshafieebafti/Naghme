@extends('Masters.Main')

@section('title','عضویت')

@section('content')
    @include('Partials.GeneralHeader')
        <div class="container" style="direction:rtl;margin-top:220px;">
            <div class="">
                <ul class="">
                    @foreach ($score as $item)
                        <li class="HPP-li">
                            {{ $item->score_description }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="row mb-5 mt-5">
                <div class="Membership-right-div">
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
                <div class="Membership-left-div p-3">
                    <div class="Membership-header-text d-flex justify-content-between">
                        <div class="Membership-table-cell text-center"><b>شماره عضویت</b></div>
                        <div class="Membership-table-cell text-center"><b>نام و نام‌خانوادگی</b></div>
                        <div class="Membership-table-cell text-center"><b>نوع عضویت</b></div>
                    </div>
                    <div class="Membership-table-rows d-flex justify-content-between ">
                        <div class="Membership-table-cell text-center">001</div>
                        <div class="Membership-table-cell text-center">کریم الدین نظام زاده</div>
                        <div class="Membership-table-cell text-center">پیوسته 1</div>
                    </div>
                    <div class="Membership-table-rows  d-flex justify-content-between">
                        <div class="Membership-table-cell text-center">001</div>
                        <div class="Membership-table-cell text-center">کریم الدین نظام زاده</div>
                        <div class="Membership-table-cell text-center">پیوسته 1</div>
                    </div>
                    <div class="Membership-table-rows  d-flex justify-content-between">
                        <div class="Membership-table-cell text-center">001</div>
                        <div class="Membership-table-cell text-center">کریم الدین نظام زاده</div>
                        <div class="Membership-table-cell text-center">پیوسته 1</div>
                    </div>
                    <div class="Membership-table-rows  d-flex justify-content-between">
                        <div class="Membership-table-cell text-center">001</div>
                        <div class="Membership-table-cell text-center">کریم الدین نظام زاده</div>
                        <div class="Membership-table-cell text-center">پیوسته 1</div>
                    </div>
                    <div class="Membership-table-rows  d-flex justify-content-between">
                        <div class="Membership-table-cell text-center">001</div>
                        <div class="Membership-table-cell text-center">کریم الدین نظام زاده</div>
                        <div class="Membership-table-cell text-center">پیوسته 1</div>
                    </div>
                    <div class="Membership-table-rows  d-flex justify-content-between">
                        <div class="Membership-table-cell text-center">001</div>
                        <div class="Membership-table-cell text-center">کریم الدین نظام زاده</div>
                        <div class="Membership-table-cell text-center">پیوسته 1</div>
                    </div>
                </div>
            </div>
        </div>
    @include('Partials.GeneralFooter')
@endsection