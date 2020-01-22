$(document).ready(function(){


});

function chooseCity() {
    const apiUrl = "http://krystianmielec.eu/kelner/";
    var data = $('#findplaceFormChooseCity').serialize();
    if(data){
        $.ajax({
            url: apiUrl + '?page=getPlaceInCity',
            data: data,
            dataType: 'json'
        }).done((res) => {
            res.forEach((el) => {
                $("#chooseCity").attr('style', 'display:none');
                $con = $("#placeInCity");
                $con.attr('style', 'display:block');

                $con.empty().append(`<div class="col-12"><button style="margin-top: 1em" onclick="getPanelPlace(${el.IdLokal})" class="btn btn-primary buttonDefault buttonDark MenuBatton">${el.NazwaLokalu}</button></div>`);
            });
        });
    }else{
        alert("Wybierz miasto");
    }
}
