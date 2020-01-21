function getUsers() {
    const apiUrl = "http://krystianmielec.eu/kelner/";
    const $list = $('.users-list');

    $.ajax({
        url: apiUrl + '?page=users',
        dataType: 'json'
    })
        .done((res) => {
            $list.empty();
            res.forEach(el => {
                $list.append(`<tr>
                        <td>${el.IdUser}</td>
                        <td>${el.email}</td>
                        <td>${el.imie}</td>
                        <td>${el.nazwisko}</td>
                        <td>${el.role}</td>
                        </tr>`);
            });
        });
}


function getMenu(positions) {
    var id = parseInt(positions.substring(6));
    getPosition(id);
    $("#IdFormInputAddPosition")
        .empty().
    append(`<input id='IdFormInputAddPositionVALUE' type='hidden' class='form-control' name='idmenu' placeholder='Wpisz nazwę' value='${id}' readonly='readonly'>`

    );
    $("#contentMenu").attr('style', 'display:none');
    $("#rp").attr('style', 'display:none');
    $("#contentMenuOne").attr('style', 'display:block');
    $("#prBack").attr('style', 'display:block');
}

function backMenu() {
    $("#contentMenu").attr('style', 'display:block');
    $("#rp").attr('style', 'display:block');
    $("#contentMenuOne").attr('style', 'display:none');
    $("#prBack").attr('style', 'display:none');
}

function addPositionMenuButton() {
    const apiUrl = "http://krystianmielec.eu/kelner/";
    var data = $('#addPositionMenuForm').serialize();

    $.ajax({
        url: apiUrl + '?page=addPositionMenu',
        data: data,
        dataType: 'json'
    }).done((res) => {
        alert("Dodano pomyślnie");
        getPosition($('#IdFormInputAddPositionVALUE').val())
    });

}

function getPosition(id) {
    const apiUrl = "http://krystianmielec.eu/kelner/";
    const $con = $('#contentPosition');
    $.ajax({
        url: apiUrl + '?page=getPositionMenu',
        data: {id: id},
        dataType: 'json'
    }).done((res) => {

        $con.empty();
        $con.append(`<div class="row" style="border-style:solid; border-color:red">
                        <div class="col-12">
                        <div class="row">
                        <div class="col-8">Nazwa</div>
                        <div class="col-4">Cena</div>
                        </div>
                        <div class="row">
                        <div class="col-12">
                        Opis
                        </div>
                        </div>`);

    res.forEach(function (el) {
        $con.append(`<div class="row" style="border-style:solid; border-color:red">
                        <div class="col-12">
                        <div class="row">
                        <div class="col-8">${el.Nazwa}</div>
                        <div class="col-4">${el.Cena}</div>
                        </div>
                        <div class="row">
                        <div class="col-12">
                        ${el.Opis}
                        </div>
                        </div>`);
    });
    });
}

