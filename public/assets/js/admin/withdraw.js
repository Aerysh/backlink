function change()
{
    var amount = parseInt(document.getElementById('amount').value);
    var admin = parseInt(document.getElementById('amount').value) * 0.05;
    var total = amount - admin;

    $('#subtotal').html('Rp. ' + amount);
    $('#admin').html('Rp. ' + admin);
    $('#total').html('Rp. ' + total);
    document.getElementById('total_amount').value = total;

}
