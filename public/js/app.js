function getUsers() {
    const apiUrl = "http://krystianmielec.eu/kelner/";
    const $list = $('.users-list');

    $.ajax({
        url : apiUrl + '?page=users',
        dataType : 'json'
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
    $("#contentMenu").attr('style','display:none');
    $("#rp").attr('style','display:none');
    $("#contentMenuOne").attr('style','display:block');
    $("#prBack").attr('style','display:block');
}

function backMenu() {
    $("#contentMenu").attr('style','display:block');
    $("#rp").attr('style','display:block');
    $("#contentMenuOne").attr('style','display:none');
    $("#prBack").attr('style','display:none');
}
