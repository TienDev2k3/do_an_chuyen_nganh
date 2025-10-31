
function updateCart(action, id) {
    $.ajax({
        url: 'pages/main/themgiohang.php',
        type: 'POST',
        data: {
            action: action,
            id: id
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                $('#quantity_' + id).text(response.quantity);
                $('#thanhtien_' + id).text(response.thanhtien + ' VNĐ');
                $('#tongtien').text(response.tongtien + ' VNĐ');
            }
        }
    });
}