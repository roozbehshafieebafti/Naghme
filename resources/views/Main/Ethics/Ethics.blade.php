@extends('Masters.Main')

@section('title','منشور اخلاقی')

@section('content')
    @include('Partials.GeneralHeader')
    <div style="direction: rtl" class="container-fluid">
        <div class="Statemants container ethics-container-div">
            <ul class="p-0 ul-li-container">
                <div class="ul-div-container">
                    @foreach ($Ethics as $key => $item)
                        <li class="mt-2 ethics-li">
                            {{ $key }}
                        </li>
                        <ol class="ethics-inner-li" style="list-style-type: none; margin-top: 20px;margin-bottom: 40px;">
                            @foreach ($item as $Colection)                                    
                                    <?php 
                                        if($Colection == '') continue;
                                        echo '<li class="ethics-inner-li-sub"><span style="color:#f6a619;">&#9670;</span> '.$Colection.'</li>';
                                    ?>
                            @endforeach
                        </ol>
                    @endforeach
                </div>
            </ul>
        </div>
    </div>
    @include('Partials.GeneralFooter')
@endsection