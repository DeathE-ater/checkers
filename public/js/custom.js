
function openTab(ctrl, tabName){
    document.getElementById("payments-menu").classList.remove("w3-blue");
    document.getElementById("buy-currency-menu").classList.remove("w3-blue");
    document.getElementById("settings-menu").classList.remove("w3-blue");
    document.getElementById("logout-menu").classList.remove("w3-blue");
    ctrl.classList.add("w3-blue");
    if(tabName !== ''){
        document.getElementsByClassName('payments-tab')[0].style.display = "none";
        document.getElementsByClassName('buy-currency-tab')[0].style.display = "none";
        document.getElementsByClassName('settings-tab')[0].style.display = "none";
        document.getElementsByClassName(tabName)[0].style.display = "block";
    }

}
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
$(document).ready( function () {
    $('#table_id').DataTable();
} );

document.getElementById('buy-currency-success').style.display = 'none';
function buySuccess(){
    document.getElementById('buy-currency-success').style.display = 'block';
}

document.getElementById('settings-success').style.display = 'none';
function saveSuccess(){
    document.getElementById('settings-success').style.display = 'block';
}
