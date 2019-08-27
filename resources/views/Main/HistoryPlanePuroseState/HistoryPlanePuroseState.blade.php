@extends('Masters.Main')

@section('title','نغمه ماندگار کیست')

@section('content')
    @include('Partials.GeneralHeader')
    <div class="History-Main container-fluid">
        <div class="history container mt-3">
            <h3 id="history">تاریخچه</h3>
            <div class="">
                @foreach ($History as $item)
                    <div class="alert alert-success">
                        {{ $item->hpp_data }}
                    </div>
                @endforeach
            </div>
        </div>

        <div class="plane container mt-3">
            <h3 id="plane">برنامه‌ها</h3>
            <div class="" >
                <ol class="alert alert-warning">
                    @foreach ($Plane as $item)
                        <li class="">
                            {{ $item->hpp_data }}
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="purpose container mt-3">
            <h3 id="purpose">اهداف</h3>
            <div class="">
                <ol class="alert alert-primary">
                    @foreach ($Purpose as $item)
                        <li class="">
                            {{ $item->hpp_data }}
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>

        <div class="Statemants container mt-3">
            <h3 id="statement">بیانیه‌ها</h3>
            <div class="">
                <ul class="alert alert-danger">
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
@endsection