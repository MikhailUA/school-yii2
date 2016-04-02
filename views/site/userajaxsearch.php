<script src="https://code.jquery.com/jquery-2.2.2.min.js"
        integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>

<script>
    $(function () {
        $("#search").click(function () {
            $.ajax({
                url: "/site/userajaxsearch",
                data: {search: $("#searchText").val()},
                type: 'POST',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {

                     var trHTML = '';

                    for (var i= 0;i<data.length;i++){
                         trHTML +=
                             '<tr>' +
                             '<td>' + data[i]['id'] + '</td>' +
                             '<td>' + data[i]['firstName'] + '</td>' +
                             '<td>' + data[i]['lastName'] + '</td>' +
                             '<td>' + data[i]['email'] + '</td>' +
                             '</tr>';
                     }

                    $("#users").find('tbody').append(trHTML);

                },
            });
        });
    });
</script>

<input type="text" id="searchText"/>
<button id="search">Search</button>

<table id="users">
    <thead>
        <tr>
            <th id="idCol">ID</th>
            <th id="firstName">First Name</th>
            <th id="lastName">Last Name</th>
            <th id="email">Email</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


