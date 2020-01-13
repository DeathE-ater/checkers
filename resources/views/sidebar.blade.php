
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
        <a href="{{ route('home') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'home') w3-blue @endif" id="payments-menu" ><i class="fa fa-diamond fa-fw"></i>  Payments</a>
        <a href="{{ route('currency') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'currency') w3-blue @endif" id="buy-currency-menu" ><i class="fa fa-bank fa-fw"></i>  Buy Currency</a>
        <a href="{{ route('viewProfile') }}" class="w3-bar-item w3-button w3-padding @if ($tab == 'profile') w3-blue @endif" id="settings-menu" ><i class="fa fa-cog fa-fw"></i>  Settings</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button w3-padding" id="logout-menu" onclick="openTab(this, '');"><i class="fa fa-sign-out fa-fw"></i>  Logout</a><br><br>
    </div>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

