@extends('layouts.app')

@section('content')
<script src="{{ asset('js/custom.js') }}" defer></script>
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;margin-top:43px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s3">
            <img src="{{url('/images/avatar.png')}}" class="w3-circle w3-margin-right" style="width:60px">
        </div>
        <div class="w3-col s9 w3-bar">
            <h5><span>Welcome, <strong>Mike Bird</strong></span></h5><br>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dashboard</h5>
    </div>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a href="{{ route('home') }}" class="w3-bar-item w3-button w3-padding w3-blue" id="payments-menu" onclick="openTab(this,'payments-tab');"><i class="fa fa-diamond fa-fw"></i>  Payments</a>
        <a href="{{ route('currency') }}" class="w3-bar-item w3-button w3-padding" id="buy-currency-menu" onclick="openTab(this, 'buy-currency-tab');"><i class="fa fa-bank fa-fw"></i>  Buy Currency</a>
        <a href="#" class="w3-bar-item w3-button w3-padding" id="settings-menu" onclick="openTab(this, 'settings-tab');"><i class="fa fa-cog fa-fw"></i>  Settings</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button w3-padding" id="logout-menu" onclick="openTab(this, '');"><i class="fa fa-sign-out fa-fw"></i>  Logout</a><br><br>
    </div>
</nav>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
    </header>

    <div class="w3-panel payments-tab w3-white w3-card-4" style="padding: 45px 40px; margin: 20px 15px;">
        <div class="w3-row-padding" style="margin:0 -16px">
            <div class="">
                <table id="table_id" class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-card-4 w3-white">
                    <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    <tr>
                        <td>12345543</td>
                        <td>PayPal</td>
                        <td>$50</td>
                        <td>6:34 PM</td>
                        <td>10-11-2020</td>
                        <td class="amount-processed"><b>Processed</b></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="w3-panel buy-currency-tab">
        <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-card-4 w3-white buy-currency-body">
                <div class="w3-green" id="buy-currency-success">
                    <strong>Success!</strong> You have Successfully bought 10 points.
                </div>
                <h5><b>Buy Currency</b></h5><br/>
                Enter Amount:<br/><br/>
                <input type="text" name="currencyAmount" placeholder="Amount"/>
                <input type="submit" value="Buy" onclick="buySuccess();">
            </div>
        </div>
    </div>


    <div class="w3-panel settings-tab">
        <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-card-4 w3-white settings-body">
                <div class="w3-green" id="settings-success">
                    <strong>Success!</strong> You have Successfully saved your profile.
                </div>
                <h5><b>Settings</b></h5><br/>
                First name:<br/><br/>
                <input type="text" name="firstName" placeholder="First Name"/>
                last name:<br/><br/>
                <input type="text" name="lastName" placeholder="Last Name"/>
                <input type="submit" value="Save" onclick="saveSuccess();">
            </div>
        </div>
    </div>
    <hr>


    <!-- Footer -->
    <footer class="w3-container w3-bottom w3-dark-grey">
        <h4></h4>
        <p>Powered by <a href="#">Softicks</a></p>
    </footer>

    <!-- End page content -->
</div>
@endsection
