@extends('Masters.Main')

@section('title','نغمه ماندگار کیست')

@section('content')
    @include('Partials.GeneralHeader')
    <div class="History-Main container-fluid">
        <div class="HPP-content history mt-3 ">
            <h3 id="history" style="text-align:center">تاریخچه</h3>
            <div class="HPP-content-container history-content">
                @foreach ($History as $item)
                    <div>
                        {{ $item->hpp_data }}
                    </div>
                @endforeach
            </div>
        </div>

        <div class="HPP-content plane mt-3">
            <h3 id="plane" style="text-align:center">برنامه‌ها</h3>
            <div class="" >
                <ol class="">
                    @foreach ($Plane as $item)
                        <li class="">
                            {{ $item->hpp_data }}
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="HPP-content purpose mt-3">
            <h3 id="purpose"  style="text-align:center">اهداف</h3>
            <div class="">
                <ol class="">
                    @foreach ($Purpose as $item)
                        <li class="">
                            {{ $item->hpp_data }}
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="HPP-content Statemants mt-3">
            <h3 id="statement" style="text-align:center">بیانیه‌ها</h3>
            <div class="">
                <ul class="">
                    @foreach ($Statement as $key => $item)
                        <li class="mt-2">
                            {{ $key }}
                        </li>
                        <ol class="">
                            @foreach ($item as $Colection)
                                    <?php 
                                        if($Colection == '') continue;
                                        echo '<li>'.$Colection.'</li>';
                                    ?>
                            @endforeach
                        </ol>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection