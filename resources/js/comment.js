
$('form[name="comment"]').submit(function(e) {

    e.preventDefault();

    var form = $(this).serialize();
    var url = $(this).attr('action');
    $(this).parent().addClass('disabled');
    $(this).find(":input").prop("disabled", true);

    $.ajax({
        url: url,
        type: 'post',
        data: form,
    })
    .then( (response) => {
        $(".alert-danger").addClass('hide');
        $(this).slideUp(400);
        setTimeout(() => {
            $(this).parent().removeClass('disabled').addClass('sucsess');
        }, 400);
        console.log(response);
    })
    .catch((jqXHR, textStatus) => {
        $(this).parent().removeClass('disabled');
        $(this).find(":input").prop("disabled", false);
        $(".alert-danger").slideDown(400).removeClass('hide');
        console.log("err:", jqXHR, textStatus);
    });

});

$(".alert-danger").click(function(e) {

    $(".alert-danger").slideUp(400);
})


$(".like").click(function(e) {

    var article = $("#counters").data("id");

    $.ajax({
        url: '/api/v01/like/'+article,
        type: 'post',
    })
    .then( (response) => {
        $(".likes-count").html(response);
        console.log(response);
    })
    .catch((jqXHR, textStatus) => {
        console.log("err:", jqXHR, textStatus);
    });
})



$( document ).ready(function(e) {

    var article = $("#counters").data("id");

    $.ajax({
        url: '/api/v01/viev/'+article,
        type: 'post',
    })
    .then( (response) => {
        $(".views-count").html(response);
        console.log(response);
    })
    .catch((jqXHR, textStatus) => {
        console.log("err:", jqXHR, textStatus);
    });
})

