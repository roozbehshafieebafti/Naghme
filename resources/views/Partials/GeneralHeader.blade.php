{{-- Mobile --}}
<div class="Header-with-toggle bg-dark text-white ">
    <div class="toggle-button">
        <span onclick="openMenu()" class=""><i class="fas fa-bars h4 toggle-button-key"></i></span>
    </div>
    <div class="menu-content text-dark" id="menuContent">
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    نغمه ماندگار
                    </button>
                </h2>
                </div>
            
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="header-ul-list bg-white  col-12">
                        <li><a class="text-muted" href="{{ route('Menu_History').'#history' }}">تاریخچه</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Purpose').'#purpose' }}">اهداف</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Form') }}">فرم‌ها</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Plane').'#plane' }}">برنامه ها</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Statement').'#statement' }}">بیانیه ها</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Regulations') }}">آیین نامه ها</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Ethics') }}">منشور اخلاقی</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Chart','کرمان') }}">نمودار سازمانی</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    مسئولین
                    </button>
                </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="header-ul-list bg-white  col-12">
                        @foreach ($_SESSION['Authorities'] as $item)
                            <li><a class="text-muted" href=" {{config('app.url').'authorities/'.$item->authorities_title}} ">{{ $item->authorities_title }}</a></li>                                
                        @endforeach
                    </ul>
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    فعالیت‌ها
                    </button>
                </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <ul class="accordion header-ul-list bg-white  col-12">
                        <?php $i=0 ?>
                        @foreach ($_SESSION['Activities'] as $key => $item)
                            @if(is_array($item))  
                                <li>
                                    <span style="cursor:pointer" class="text-muted collapsed"  data-target="{{'#MobileCollapseExample'.$i}}" data-toggle="collapse" aria-expanded="false" aria-controls="{{'MobileCollapseExample'.$i}}">
                                        {{ $key }}
                                    </span>
                                </li>  
                                <ul class="collapse bg-dark" id="{{'MobileCollapseExample'.$i}}" aria-labelledby="headingTwo">
                                    @foreach ($item as $val)
                                        <li class="text-light"><a href="{{ config('app.url').'activities/'.$val }}">{{ $val }}</a></li>    
                                    @endforeach
                                </ul>
                                <?php $i++; ?>                                    
                            @else
                                <li>
                                    <a style="cursor:pointer" class="text-muted "  href="{{ config('app.url').'activities/'.$key }}">
                                        {{ $key }}
                                    </a>
                                </li> 
                            @endif
                        @endforeach
                    </ul>
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                    <a href="{{ route('Get_All_News') }}" class="btn btn-link collapsed" >
                        اخبار
                    </a>
                    </h2>
                </div>
                {{-- <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div> --}}
                </div>
            </div>
    </div>
    <div class="not-menu-content" onclick="closeMenu()"></div>
</div>

{{-- Desktop --}}
<div class="general-Header-without-toggle text-white" style="background:#000">
    <div class="row d-flex justify-content-between">
        <div class="col-1 text-white ">
            <a href="{{ config("app.url") }}">
                <img class="logo-img " src="{{ config('app.url')."picture/assets/logo.png"}}" alt="{{ config('view.alt') }}" title="{{ config('view.title') }}" />
            </a>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="header-sub-menu ">
                    <a class="text-white " role="button">
                        <span>نغمه ماندگار</span>
                    </a>
                    <ul class="header-ul-list bg-white  col-12">
                        <li><a class="text-muted" href="{{ route('Menu_History').'#history' }}">تاریخچه</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Purpose').'#purpose' }}">اهداف</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Form') }}">فرم‌ها</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Plane').'#plane' }}">برنامه ها</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Statement').'#statement' }}">بیانیه ها</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Regulations') }}">آیین نامه ها</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Ethics') }}">منشور اخلاقی</a></li>
                        <li><a class="text-muted" href="{{ route('Menu_Chart','کرمان') }}">نمودار سازمانی</a></li>
                    </ul>
                </div>

                <div class="header-sub-menu ">
                    <a class="text-white " role="button">
                        <span>مسئولین</span>
                    </a>
                    <ul class="header-ul-list bg-white  col-12">
                        @foreach ($_SESSION['Authorities'] as $item)
                            <li><a class="text-muted" href=" {{config('app.url').'authorities/'.$item->authorities_title}} ">{{ $item->authorities_title }}</a></li>                                
                        @endforeach
                    </ul>
                </div>

                <div class="header-sub-menu ">
                    <a class="text-white " role="button">
                        <span>فعالیت‌ها</span>
                    </a>
                    <ul class="accordion header-ul-list bg-white  col-12">
                        <?php $i=0 ?>
                        @foreach ($_SESSION['Activities'] as $key => $item)
                            @if(is_array($item))  
                                <li>
                                    <span style="cursor:pointer" class="text-muted collapsed"  data-target="{{'#collapseExample'.$i}}" data-toggle="collapse" aria-expanded="false" aria-controls="{{'collapseExample'.$i}}">
                                        {{ $key }}
                                    </span>
                                </li>  
                                <ul class="collapse bg-dark" id="{{'collapseExample'.$i}}" aria-labelledby="headingTwo">
                                    @foreach ($item as $val)
                                        <li class="text-light"><a href="{{ config('app.url').'activities/'.$val }}">{{ $val }}</a></li>    
                                    @endforeach
                                </ul>
                                <?php $i++; ?>                                    
                            @else
                                <li>
                                    <a style="cursor:pointer" class="text-muted "  href="{{ config('app.url').'activities/'.$key }}">
                                        {{ $key }}
                                    </a>
                                </li> 
                            @endif
                        @endforeach
                    </ul>
                </div>

                <div class="header-sub-menu ">
                    <a class="text-white" href="{{ route('Get_All_News') }}">
                        <span>اخبار</span>
                    </a>
                </div>
            </div>
        </div>  
    </div>
    <div class="general-white-border"><span class="span-dark-background" style="background:#000"></span></div>   
    <div class="general-header-title">
        <p class="general-header-title-text"></p>    
    </div>
    <div class="general-header-title-text-final">
        <?php 
            switch (true) {
                case isset($History):
                    echo "تاریخچه";
                    break;
                case isset($chart):
                    echo "ساختار سازمانی";
                    break;
            }    
        ?>
    </div>
</div>
