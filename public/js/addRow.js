//order table addRow

$('.addRow').on('click', function () {
    addRow();
});

function addRow() {
    var tr = '<tr>\n' +
        '                                            <td>\n' +
        '                                                <input type="text" name="product" class="{{$errors->has(\'product\') ? \'error-border\' : \'\'}}" placeholder="Produkt" min="1">\n' +
        '                                            </td>\n' +
        '                                            <td>\n' +
        '                                                <input type="number" name="quantity" value="{{old(\'quantity\')}}" class="{{$errors->has(\'quantity\') ? \'error-border\' : \'\'}}" placeholder="Množstvo" min="1">\n' +
        '                                            </td>\n' +
        '                                            <td>\n' +
        '                                                <a class="send-btn text-white remove">\n' +
        '                                                    Odstrániť produkt\n' +
        '                                                </a>\n' +
        '                                            </td>\n' +
        '                                        </tr>';
    $('tbody').append(tr);
}

$('tbody').on('click', '.remove', function () {
    $(this).parent().parent().remove();
});
