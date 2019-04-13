<div id="SideBare" class="templatemo-sidebar">
    <header class="templatemo-site-header">
        <div class="square"></div>
        <h1>نغمه ماندگار</h1>
    </header>
    <div class="profile-photo-container">
        <img style="width:270px" src="{{ config('app.url').'/picture/Naghmeh.jpg'}}" alt="Profile Photo" class="img-responsive">  
        <div class="profile-photo-overlay"></div>
    </div>      
    <div style="margin-top:20px ">          
        <ul style="list-style-type: none">
            <li class="Naghme-Dashboard-List">
                <span><i class="fa fa-home fa-fw text-white"></i></span>
                <a  class="Naghme-Dashboard-List" href="{{ route('Admin_Dashboard') }}">&nbsp;داشبورد</a>
            </li>
        </ul>  
    </div>
</div>