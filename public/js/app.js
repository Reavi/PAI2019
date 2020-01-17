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