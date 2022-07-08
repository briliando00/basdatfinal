let data = [];

function getData() {
    data = JSON.parse(localStorage.getItem("data"))
    return data;
}

function setData() {
    localStorage.setItem("data", JSON.stringify(data))
}

function insertData() {
    $('#table tbody').empty();
    var html = '';
    for (var i = 0; i < data.length; i++)
        html += '<tr><td>' + data[i].title +
            '</td><td>' + data[i].rate + '</td>' +
            '<td>  <button class="deleteItem" btn_id=' + i + '>Delete</button></td></tr>';
    $('#table tbody').append(html);
}

$(function () {
    $('#btnSubmit').click(function () {
        var model = {
            id: "",
            title: "",
            rate: null,
        }
        var movieName = $('#Nama-Tugas').val();
        var movieRate = $('#deadline').val();
        if (data.length === 0) {
            model.id = 1;
        } else {
            model.id = data[data.length - 1].id + 1;
        }
        model.title = movieName;
        model.rate = parseFloat(movieRate);
        data.push(model);
        insertData()
        setData()
    });
})

$('body').on('click', 'tbody .deleteItem', function () {
    let indexlist = $(this).parent().parent().index()
    let filterlist = data.filter(function (value, index) {
        return index !== indexlist
    })
    data = filterlist
    setData()
    insertData()
})

$(document).ready(function () {
    if(getData() === null){
        data = [];
    }else{
        getData()
    }
    insertData()
    $(document).on("click", "table thead tr th:not(.no-sort)", function () {
        var table = $(this).parents("table");
        var rows = $(this).parents("table").find("tbody tr").toArray().sort(TableComparer($(this).index()));
        var dir = ($(this).hasClass("sort-asc")) ? "desc" : "asc";

        if (dir == "desc") {
            rows = rows.reverse();
        }

        for (var i = 0; i < rows.length; i++) {
            table.append(rows[i]);
        }

        table.find("thead tr th").removeClass("sort-asc").removeClass("sort-desc");
        $(this).removeClass("sort-asc").removeClass("sort-desc").addClass("sort-" + dir);
    });

});


function TableComparer(index) {
    return function (a, b) {
        var val_a = TableCellValue(a, index);
        var val_b = TableCellValue(b, index);
        var result = ($.isNumeric(val_a) && $.isNumeric(val_b)) ? val_a - val_b : val_a.toString().localeCompare(val_b);

        return result;
    }
}

function TableCellValue(row, index) {
    return $(row).children("td").eq(index).text();
}