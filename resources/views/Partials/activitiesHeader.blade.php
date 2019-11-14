{{-- Mobile --}}
<div class="activity-header-menu">
    <div class="toggle-button">
        <span onclick="openMenu()" class=""><i class="fas fa-bars h4 toggle-button-key"></i></span>
    </div>
    <div class="text-white">
        <a href="{{ config("app.url") }}">
            <img class="logo-img " src="{{ config('app.url')."picture/assets/logo.png"}}" alt="{{ config('view.alt') }}" title="{{ config('view.title') }}" />
        </a>
    </div>
    <div class="not-menu-content" onclick="closeMenu()"></div>
    <div class="AllAct-white-border">
        <span class="span-dark-background" style="background:#000"></span>
        <div class="AllAct-title-main-container">
            <div class="AllAct-title-container">             
                <div class="text-white AllAct-title">فعالیت ها</div> 
                <div class="AllAct-title-border-yellow"></div>
                <div class="AllAct-title-border-black"></div>
            </div>   
        </div>
        <div class="AllAct-links-container">
            <div class="">
                <div class="AllAct-mobile-row-1 " >
                    <div class="AllAct-mobile-sqr mobile-fst-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link AllAct-Link1" href="{{ route("Get_All_Activities").'#'.$titles[0]->id }}">{{$titles[0]->at_title}}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="AllAct-mobile-row-2">
                    <div class="AllAct-mobile-sqr mobile-sec-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link AllAct-Link2" href="{{ route("Get_All_Activities").'#'.$titles[1]->id }}">
                                {{ isset($titles[1]) ? $titles[1]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="AllAct-mobile-row-3">
                    <div class="AllAct-mobile-sqr mobile-thr-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link AllAct-Link3" href="{{ route("Get_All_Activities").'#'.$titles[2]->id }}">
                                {{ isset($titles[2]) ? $titles[2]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                    <div class="AllAct-mobile-sqr mobile-thr-sqr sqr-row3-col2">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link AllAct-Link4"
                                href="{{ route("Get_All_Activities").'#'.$titles[3]->id }}"
                            >
                                {{ isset($titles[3]) ? $titles[3]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="AllAct-mobile-row-4">
                    <div class="AllAct-mobile-sqr mobile-fth-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link AllAct-Link5" 
                                href="{{ route("Get_All_Activities").'#'.$titles[4]->id }}"
                            >
                                {{ isset($titles[4]) ? $titles[4]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                    <div class="AllAct-mobile-sqr mobile-fth-sqr sqr-row4-col2">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link AllAct-Link6" 
                                href="{{ route("Get_All_Activities").'#'.$titles[5]->id }}"
                            >
                                {{ isset($titles[5]) ? $titles[5]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="AllAct-mobile-row-5">
                    <div class="AllAct-mobile-sqr mobile-fifth-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link AllAct-Link7" 
                                href="{{ route("Get_All_Activities").'#'.$titles[6]->id }}"
                            >
                                {{ isset($titles[6]) ? $titles[6]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                    <div class="AllAct-mobile-sqr mobile-fifth-sqr sqr-row5-col2">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link AllAct-Link8" href="{{ route("Get_All_Activities").'#'.$titles[7]->id}}">
                                {{ isset($titles[7]) ? $titles[7]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="text-white">
                <div class="AllAct-mobile-row-6">
                    <div class="AllAct-mobile-sqr mobile-sixth-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link AllAct-Link9" href="{{ route("Get_All_Activities").'#'.$titles[8]->id }}">
                                {{ isset($titles[8]) ? $titles[8]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

<div class="Header-with-toggle text-white mt-1">
    <div class="menu-content bg-white pt-2" id="menuContent">
        <div class="" id="accordionExample">
            <div class="">
                <div class="" id="headingOne">
                    <h2 class="mb-0">
                        <button class="mobile-header-title" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            نغمه ماندگار
                            <span class="mobile-fill-diamond">&#9670;</span>
                        </button>
                    </h2>
                </div>
            
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="">
                        <ul class="header-ul-list bg-white  col-12">
                            <li><a class="mobile-header-sub-title" href="{{ route('Menu_History').'#history' }}">تاریخچه<span class="mobile-empty-diamond">&#9671;</span></a></li>
                            <li><a class="mobile-header-sub-title" href="{{ route('Menu_Purpose').'#purpose' }}">اهداف<span class="mobile-empty-diamond">&#9671;</span></a></li>
                            <li><a class="mobile-header-sub-title" href="{{ route('Menu_Form') }}">فرم‌ها<span class="mobile-empty-diamond">&#9671;</span></a></li>
                            <li><a class="mobile-header-sub-title" href="{{ route('Menu_Plane').'#plane' }}">برنامه ها<span class="mobile-empty-diamond">&#9671;</span></a></li>
                            <li><a class="mobile-header-sub-title" href="{{ route('Menu_Statement').'#statement' }}">بیانیه ها<span class="mobile-empty-diamond">&#9671;</span></a></li>
                            <li><a class="mobile-header-sub-title" href="{{ route('Menu_Regulations') }}">آیین نامه ها<span class="mobile-empty-diamond">&#9671;</span></a></li>
                            <li><a class="mobile-header-sub-title" href="{{ route('Menu_Ethics') }}">منشور اخلاقی<span class="mobile-empty-diamond">&#9671;</span></a></li>
                            <li><a class="mobile-header-sub-title" href="{{ route('Menu_Chart','کرمان') }}">نمودار سازمانی<span class="mobile-empty-diamond">&#9671;</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="mobile-header-title collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            مسئولین
                            <span class="mobile-fill-diamond">&#9670;</span>
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="">
                        <ul class="header-ul-list bg-white  col-12">
                            @foreach ($_SESSION['Authorities'] as $item)
                                <li><a class="mobile-header-sub-title" href=" {{config('app.url').'authorities/'.$item->authorities_unit_title}} ">{{ $item->authorities_unit_title }}<span class="mobile-empty-diamond">&#9671;</span></a></li>                                
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="" id="headingThree">
                <h2 class="mb-0">
                    <button class="mobile-header-title collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        فعالیت‌ها
                        <span class="mobile-fill-diamond">&#9670;</span>
                    </button>
                </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="">
                    <ul class="accordion header-ul-list bg-white  col-12">
                        @foreach ($_SESSION['Activities'] as $key => $item)
                            <li>
                                <a style="cursor:pointer" class="mobile-header-sub-title"  href="{{route('Get_Activities',["name"=>$key , "id"=>1])}}">{{ $key }}<span class="mobile-empty-diamond">&#9671;</span></a>
                            </li> 
                        @endforeach
                    </ul>
                </div>
                </div>
            </div>
            <div class="">
                <div class="" id="headingThree">
                    <h2 class="mb-0">
                        <a href="{{ route('Get_All_News') }}" class="mobile-header-title collapsed" >
                            اخبار
                            <span class="mobile-fill-diamond">&#9670;</span>
                        </a>
                    </h2>
                </div>
            </div>
            <div class="">
                <div class="" id="headingThree">
                    <h2 class="mb-0">
                        <a href="{{ route("Representaion") }}" class="mobile-header-title collapsed" >
                            نمایندگی
                            <span class="mobile-fill-diamond">&#9670;</span>
                        </a>
                    </h2>
                </div>
            </div>
            <div class="">
                <div class="" id="headingThree">
                    <h2 class="mb-0">
                        <a href="{{ route("Get_Membership") }}" class="mobile-header-title collapsed" >
                            عضویت
                            <span class="mobile-fill-diamond">&#9670;</span>
                        </a>
                    </h2>
                </div>
            </div>
            <div class="" style="float: right">
                <div class="" id="headingThree">
                    <h2 class="mb-0">
                        <?php 
                            if(!Illuminate\Support\Facades\Auth::check()){
                                echo '<a class=" mobile-header-title" href="'.route('Login').'"><span>ورود</span><span class="mobile-fill-diamond">&#9670;</span></a>';
                            }
                            else{
                                $User = Auth::user();
                                echo '<a class="mobile-header-title" href=""><span>'.$User->name.' خوش آمدید'.'</span><span class="mobile-fill-diamond">&#9670;</span></a>';
                            }
                        ?>                        
                    </h2>
                </div>
            </div> 
            <div class="mobile-img-container">
                <img class="mobile-corner-img" src="{{ config('app.url')."picture/assets/corner.svg" }}" />
            </div>           
        </div>
    </div>
</div>
    
{{-- Desktop --}}
<div class="activity-Header-without-toggle text-white" style="background:#000">
    <div class="row d-flex justify-content-between">
        <div class="col-1 text-white ">
            <a href="{{ config("app.url") }}">
                <img class="logo-img " src="{{ config('app.url')."picture/assets/logo.png"}}" alt="{{ config('view.alt') }}" title="{{ config('view.title') }}" />
            </a>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-10">
            <div class="row">
                <div class="header-sub-menu  text-center ">
                    <a class="header-link-title text-white text-center" href="{{ route('Home') }}">
                        <span><b>صفحه اصلی</b></span>
                    </a>
                </div>
                <div class="header-sub-menu ">
                    <a class="text-white header-link-title text-center" role="button">
                        <span><b>نغمه ماندگار</b></span>
                    </a>
                    <ul class="header-ul-list col-12">
                        <li><span class="header-text-dimond-shape">&#9670;</span><a class="header-text-link " href="{{ route('Menu_History').'#history' }}">تاریخچه</a></li>
                        <li><span class="header-text-dimond-shape">&#9670;</span><a class="header-text-link " href="{{ route('Menu_Purpose').'#purpose' }}">اهداف</a></li>
                        <li><span class="header-text-dimond-shape">&#9670;</span><a class="header-text-link " href="{{ route('Menu_Form') }}">فرم‌ها</a></li>
                        <li><span class="header-text-dimond-shape">&#9670;</span><a class="header-text-link " href="{{ route('Menu_Plane').'#plane' }}">برنامه ها</a></li>
                        <li><span class="header-text-dimond-shape">&#9670;</span><a class="header-text-link " href="{{ route('Menu_Statement').'#statement' }}">بیانیه ها</a></li>
                        <li><span class="header-text-dimond-shape">&#9670;</span><a class="header-text-link " href="{{ route('Menu_Regulations') }}">آیین نامه ها</a></li>
                        <li><span class="header-text-dimond-shape">&#9670;</span><a class="header-text-link " href="{{ route('Menu_Ethics') }}">منشور اخلاقی</a></li>
                        <li><span class="header-text-dimond-shape">&#9670;</span><a class="header-text-link " href="{{ route('Menu_Chart','کرمان') }}">نمودار سازمانی</a></li>
                    </ul>
                </div>

                <div class="header-sub-menu ">
                    <a class="text-white header-link-title text-center" role="button">
                        <span><b>مسئولین</b></span>
                    </a>
                    <ul class="header-ul-list col-12">
                        @foreach ($_SESSION['Authorities'] as $item)
                            <li><span class="header-text-dimond-shape">&#9670;</span><a class="header-text-link " href=" {{config('app.url').'authorities/'.$item->authorities_unit_title}} ">{{ $item->authorities_unit_title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="header-sub-menu ">
                    <a class="text-white header-link-title text-center" role="button">
                        <span><b>فعالیت‌ها</b></span>
                    </a>
                    <ul class="accordion header-ul-list col-12">
                        @foreach ($_SESSION['Activities'] as $key => $item)
                            <li>
                                <span class="header-text-dimond-shape">&#9670;</span>
                                <a style="cursor:pointer" class="header-text-link"  href="{{route('Get_Activities',["name"=>$key , "id"=>1])}}" >{{ $key }}</a>
                            </li> 
                        @endforeach
                    </ul>
                </div>

                <div class="header-sub-menu ">
                    <a class="text-white header-link-title text-center" href="{{ route('Get_All_News') }}">
                        <span><b>اخبار</b></span>
                    </a>
                </div>

                <div class="header-sub-menu  text-center" >
                    <a class="header-link-title text-white" href="{{ route("Representaion") }}">
                        <span><b>نمایندگی‌ها</b></span>
                    </a>
                </div>
    
                <div class="header-sub-menu  text-center" >
                    <a class="header-link-title text-white" href="{{ route("Get_Membership") }}">
                        <span><b>عضویت</b></span>
                    </a>
                </div>
                <div class="header-sub-menu ">
                    <?php 
                        if(!Illuminate\Support\Facades\Auth::check()){
                            echo '<a class="header-link-title text-white" href="'.route('Login').'"><span><b>ورود</b></span></a>';
                        }
                        else{
                            $User = Auth::user();
                            echo '<a class="header-link-title text-white" href=""><span><b>'.$User->name.' خوش آمدید'.'</b></span></a>';
                        }
                    ?>  
                </div>
            </div>
        </div>  
    </div>
    <div class="AllAct-white-border">
        <span class="span-dark-background" style="background:#000"></span>
        <div class="AllAct-title-main-container">
            <div class="AllAct-title-container">             
                <div class="text-white AllAct-title">فعالیت ها</div> 
                <div class="AllAct-title-border-yellow"></div>
                <div class="AllAct-title-border-black"></div>
            </div>   
        </div>
        <div class="All-Act-main-Link-desktop">
            <div class="">
                <div class="AllAct-mobile-row-1" >
                    <div class="AllAct-mobile-sqr mobile-fst-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link" href="{{ route("Get_All_Activities").'#'.$titles[0]->id }}">{{$titles[0]->at_title}}</a>
                        </p>
                    </div>
                    <div class="AllAct-mobile-sqr mobile-sec-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link" href="{{ route("Get_All_Activities").'#'.$titles[1]->id }}">
                                {{ isset($titles[1]) ? $titles[1]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                    <div class="AllAct-mobile-sqr mobile-thr-sqr sqr-row3-col2">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link" href="{{ route("Get_All_Activities").'#'.$titles[2]->id }}">
                                {{ isset($titles[2]) ? $titles[2]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="AllAct-mobile-row-2" >
                    <div class="AllAct-mobile-sqr mobile-fst-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link" 
                                href="{{ route("Get_All_Activities").'#'.$titles[3]->id }}"
                            >
                                {{ isset($titles[3]) ? $titles[3]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                    <div class="AllAct-mobile-sqr mobile-sec-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link" 
                                href="{{ route("Get_All_Activities").'#'.$titles[4]->id }}"
                            >
                                {{ isset($titles[4]) ? $titles[4]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                    <div class="AllAct-mobile-sqr mobile-thr-sqr sqr-row3-col2">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link" 
                                href="{{ route("Get_All_Activities").'#'.$titles[5]->id }}"
                            >
                                {{ isset($titles[5]) ? $titles[5]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="AllAct-mobile-row-3" >
                    <div class="AllAct-mobile-sqr mobile-fst-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link" 
                                href="{{ route("Get_All_Activities").'#'.$titles[6]->id }}"
                            >
                                {{ isset($titles[6]) ? $titles[6]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                    <div class="AllAct-mobile-sqr mobile-sec-sqr">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link" href="{{ route("Get_All_Activities").'#'.$titles[7]->id  }}">
                                {{ isset($titles[7]) ? $titles[7]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                    <div class="AllAct-mobile-sqr mobile-thr-sqr sqr-row3-col2">                    
                        <p class="AllAct-mobile-sqr-content">
                            <a class="AllAct-mobile-sqr-link" href="{{ route("Get_All_Activities").'#'.$titles[8]->id }}">
                                {{ isset($titles[8]) ? $titles[8]->at_title : "-"}}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
