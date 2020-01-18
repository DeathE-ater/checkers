$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready( function () {
    $('#table_id').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    });
} );

function openNav() {
    document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}

function w3_open() {
    if (document.getElementById("mySidebar").style.display === 'block') {
        document.getElementById("mySidebar").style.display = 'none';
        document.getElementById("myOverlay").style.display = "none";
    } else {
        document.getElementById("mySidebar").style.display = 'block';
        document.getElementById("myOverlay").style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

function filePhoto(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('.profile-header-img + img').remove();
            $('.profile-header-img').after('<img src="'+e.target.result+'" width="450"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#mediaPhoto, #merchandisePhoto").change(function () {
    filePhoto(this);
});

function fileVideo(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('.profile-header-img video').remove();
            $('.profile-header-img').append('<video width="320" height="240" controls id="addVideo"><source src="'+e.target.result+'" type="video/mp4"></video>');


        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#mediaVideo").change(function () {
    fileVideo(this);
});

function verifyUser(id, ctrl) {

    let verified = ctrl.checked;
    if(verified){
        verified='Y';
    } else {
        verified = 'N'
    }
    $.post( "/verifyUser", { id: id, verified: verified })
        .done(function( data ) {
        });
}
