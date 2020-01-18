
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;margin-top:43px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s3">
            <img src="/storage/avatars/{{ Auth::user()->avatar }}" class="w3-circle w3-margin-right" style="width:60px">
        </div>
        <div class="w3-col s9 w3-bar">
            <h5 style="margin-top: 20px;"><span>Welcome, <strong>{{ Auth::user()->first_name }}</strong></span></h5><br>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        @if (Auth::user()->user_type == 'C') <a href="{{ route('home') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'home') w3-blue @endif" id="payments-menu" ><i class="fa fa-diamond fa-fw"></i>  Payments</a>@endif
        @if (Auth::user()->user_type == 'C') <a href="{{ route('currency') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'currency') w3-blue @endif" id="buy-currency-menu" ><i class="fa fa-bank fa-fw"></i>  Buy Currency</a>@endif

        @if (Auth::user()->user_type == 'A')<a href="{{ route('manageUsers') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'manageUsers') w3-blue @endif" id="settings-menu" ><i class="fa fa-users fa-fw"></i>  Manage Users</a>@endif
        @if (Auth::user()->user_type == 'A')<a href="{{ route('viewRates') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'rates') w3-blue @endif" id="rates-menu" ><i class="fa fa-bank fa-fw"></i>  Rates</a>@endif
        @if (Auth::user()->user_type == 'A')<a href="{{ route('viewAddPhoto') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'addPhoto') w3-blue @endif" id="settings-menu" ><i class="fa fa-image fa-fw"></i>  Add Photo</a>@endif
        @if (Auth::user()->user_type == 'A')<a href="{{ route('viewPhotos') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'viewPhotos') w3-blue @endif" id="settings-menu" ><i class="fa fa-image fa-fw"></i>  View Photos</a>@endif
        @if (Auth::user()->user_type == 'A')<a href="{{ route('viewAddVideo') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'addVideo') w3-blue @endif" id="settings-menu" ><i class="fa fa-video fa-fw"></i>  Add Video</a>@endif
        @if (Auth::user()->user_type == 'A')<a href="{{ route('viewVideos') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'viewVideos') w3-blue @endif" id="settings-menu" ><i class="fa fa-video fa-fw"></i>  View Videos</a>@endif
        @if (Auth::user()->user_type == 'A')<a href="{{ route('viewAddMerchandise') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'addMerchandise') w3-blue @endif" id="settings-menu" ><i class="fa fa-tshirt fa-fw"></i>  Add Merchandise</a>@endif
        @if (Auth::user()->user_type == 'A')<a href="{{ route('viewMerchandise') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'viewMerchandise') w3-blue @endif" id="settings-menu" ><i class="fa fa-tshirt fa-fw"></i>  View Merchandise</a>@endif
        <a href="{{ route('viewProfile') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'profile') w3-blue @endif" id="settings-menu" ><i class="fa fa-cog fa-fw"></i>  Settings</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button w3-padding" id="logout-menu" onclick="openTab(this, '');"><i class="fa fa-sign-out fa-fw"></i>  Logout</a><br><br>
    </div>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

