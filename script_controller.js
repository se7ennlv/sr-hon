
$(document).ready(function () {
    $('#body').bind('touchmove', false);
    $('.box-comment').hide();
    /*=========================================================================*/
    $("#deptID").on("change", function () {
        var $deptID = $(this).val();
        var selText = $(this).find("option:selected").text();
        //alert(selText);
        $("#getDeptName").val(selText);

        $.ajax({
            type: "POST",
            data: {deptID: $deptID},
            url: './controllers/getLocation.php',
            success: function (data) {
                $("#locaID").html(data)
            }
        });
    });

    $("#locaID").on("change", function () {
        var selText = $(this).find("option:selected").text();
        //alert(selText);
        $("#getLocaName").val(selText);
    });

});

/*=============================================Change langauge controll=================================================*/
function us() {
    //alert("US");
    $("#topText").text("How do you feel about Savan Resorts?");
    $("#veryGood").text("Verry Good");
    $("#tooBad").text("Too Bad");
    $("#bottomText").text("Thank you");
}

function th() {
    //alert("TH");
    $("#topText").text("คุณรู้สึกอย่างไรกับ สะหวัน รีสอร์ท ?");
    $("#veryGood").text("ดีมาก");
    $("#tooBad").text("ไม่ดีเลย");
    $("#bottomText").text("ขอบคุณที่ใช้บริการ");
}

/*============================Change background color on checkbox checked (Verygood)==================================*/
$('.verygood').change(function () {
    if ($(this).prop('checked')) {
        $(this).parent().removeClass("label-default");
        $(this).parent().addClass("label-primary");
    } else {
        $(this).parent().removeClass("label-primary");
        $(this).parent().addClass("label-default");
    }
});

/*============================Change background color on checkbox checked (Toobad)==================================*/
$('.toobad').change(function () {
    if ($(this).prop('checked')) {
        $(this).parent().removeClass("label-default");
        $(this).parent().addClass("label-danger");
        $(this).next('.box-comment').toggle();
        $(this).next('.box-comment').focus();
    } else {
        $(this).parent().removeClass("label-danger");
        $(this).parent().addClass("label-default");
        $(this).next('.box-comment').toggle();
    }
});




/*=============================================Form toobad controll=================================================*/
$('#frmTooBad').on("submit", function (e) {
    var chk = $(":checkbox:checked").length;
    var $deptIDs = $("#deptIDs").text().trim();
    var $locaIDs = $("#locaIDs").text().trim();

    if ($deptIDs == "" || $locaIDs == "") {
        $('.chk-dept-loca').css({display: 'block'}).text("Please set department and location!");
    } else {
        if (chk <= 0) {
            $('.chk-dept-loca').css({display: 'none'})
            $('.chk-check').css({display: 'block'});
        } else {
            var formData = new FormData(this);
            formData.append('deptID', $deptIDs);
            formData.append('locaID', $locaIDs);

            $.ajax({
                url: './controllers/create_toobad.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    if (data.status === "success") {
                        $("#modalTooBad").modal('hide');
                        swal({
                            //type: "warning",
                            title: "",
                            imageUrl: "assets/images/emo_nothing_gray.png",
                            text: "We are sorry for unhappy experience!\n สะหวัน รีสอร์ทรู้สึกเสียใจที่ไม่สามารถบริการท่านได้ด้วยดี",
                            //timer: 3000,
                            showConfirmButton: true
                        });
                    }
                }
            });
        }
    }

    e.preventDefault();
});

/*=============================================Form verygood controll=================================================*/
$('#frmVeryGood').on("submit", function (e) {
    var chk = $(":checkbox:checked").length;
    var $deptIDs = $("#deptIDs").text().trim();
    var $locaIDs = $("#locaIDs").text().trim();


    if ($deptIDs == "" || $locaIDs == "") {
        $('.chk-dept-loca').css({display: 'block'}).text("Please set department and location!");
    } else {
        if (chk <= 0) {
            $('.chk-dept-loca').css({display: 'none'})
            $('.chk-check').css({display: 'block'});
        } else {
            var formData = new FormData(this);
            formData.append('deptID', $deptIDs);
            formData.append('locaID', $locaIDs);

            $.ajax({
                url: './controllers/create_verygood.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (data) {
                    if (data.status === "success") {
                        $("#modalVeryGood").modal('hide');
                        swal({
                            //type: "warning",
                            title: "",
                            imageUrl: "assets/images/emo_good_yellow.png",
                            text: "Thank you/ขอบคุณที่ใช้บริการ",
                            //timer: 3000,
                            showConfirmButton: true
                        });
                    }
                }
            });
        }
    }

    e.preventDefault();
});

/*============================Reset everything when modal close=========================================*/
$(".modal").on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
    $('.chk-dept-loca').css({display: 'none'});
    $('.chk-check').css({display: 'none'});
    $('.box-comment').hide();
    /*=========================Reset label color when modal close=======================*/
    $('label').removeClass("label-danger");
    $('label').removeClass("label-primary");
    $('label').addClass("label-default");
});
