$(document).ready(function () {


});

function chooseCity() {
    const apiUrl = "http://krystianmielec.eu/kelner/";
    var data = $('#findplaceFormChooseCity').serialize();
    if (data) {
        $.ajax({
            url: apiUrl + '?page=getPlaceInCity',
            data: data,
            dataType: 'json'
        }).done((res) => {
            $con = $("#placeInCity");
            $con.attr('style', 'display:block');
            $con.empty();
            res.forEach((el) => {
                $("#chooseCity").attr('style', 'display:none');
                $con.append(`<div class="col-12"><button style="margin-top: 1em" onclick="getPanelPlace(${el.IdLokal})" class="btn btn-primary buttonDefault buttonDark MenuBatton">${el.NazwaLokalu}</button></div>`);
            });
        });
    } else {
        alert("Wybierz miasto");
    }
}


function getPanelPlace(id) {
    const apiUrl = "http://krystianmielec.eu/kelner/";
    $.ajax({
        url: apiUrl + '?page=getPlace',
        data: {id:id},
        dataType: 'json'
    }).done((res) => {
            console.log(res);
        $("#findplaceformdivget").attr('style','display:none');
        $("#ResultPanelPlaceContent").attr('style','display:');
        var d =$("#ResultPanelPlace");
        d.attr('style','display:block');
        d.empty();
        var place = res['place'];
        var tables=res['tables'];

        d.append(`<div class="col-12"><h1>${place.name}</h1></div>`);
        d.append(`<div class="col-12"><h1>Wolne stoliki</h1></div>`);
        console.log(tables.length);
        if(tables.length===0){
            d.append(`<div class="col-12"><h1>Brak wolnych stolików! Przepraszamy i zapraszamy ponownie!</h1></div>`);
        }
        tables.forEach((table)=>{
            d.append(`<div class="col-12"><button style="margin-top: 1em" class="btn btn-primary buttonDefault buttonDark MenuBatton">Ilość osób przy stoliku: ${table.IloscMiejsc}</button></div>`)
        })
    }).fail((res)=>{
        alert("fail");

    });
}

function backMenuBoard() {
    $("#findplaceformdivget").attr('style','display:');
    $("#ResultPanelPlaceContent").attr('style','display:none');
}