<div id="SideBare" class="templatemo-sidebar">
    <header class="templatemo-site-header">
        <div ></div>
        <span class="col-12 text-center h3 text-white">انجمن نغمه ماندگار</span>
    </header>
    <div class="profile-photo-container">
        <img style="width:100%" src="{{ config('app.url').'/picture/Naghmeh.jpg'}}" alt="Profile Photo" class="img-responsive">  
        <div class="profile-photo-overlay"></div>
    </div>      
    <div style="margin-top:20px ">          
        <ul style="list-style-type: none">
            <li class="Naghme-Dashboard-List mt-3">
                <span><i class="fa fa-home fa-fw text-white"></i></span>
                <a  class="Naghme-Dashboard-List" href="{{ route('Admin_Dashboard') }}">&nbsp;داشبورد</a>
            </li>
            <li class="Naghme-Dashboard-List mt-3">
                <span><i class="fas fa-images"></i></span>
                <a  class="Naghme-Dashboard-List" href="{{ route('Get_Slides') }}">&nbsp;اسلایدر</a>
            </li>
            <li class="Naghme-Dashboard-List mt-3">
                <span><i class="fas fa-comments"></i></span>
                <a  class="Naghme-Dashboard-List" href="{{ route('Get_Comments') }}">&nbsp;نظرات</a>
            </li>
            <li class="Naghme-Dashboard-List mt-3">
                <span><i class="fas fa-ethernet"></i></span>
                <a  class="Naghme-Dashboard-List" href="{{ route('Home') }}">&nbsp;صفحه اصلی سایت</a>
            </li>
            <li class="Naghme-Dashboard-List mt-3">
                <span><i class="fas fa-door-open"></i></i></span>
                <a  class="Naghme-Dashboard-List" href="{{ route('Exit') }}">&nbsp;خروج</a>
            </li>
        </ul>  
    </div>
</div>