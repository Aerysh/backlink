function change()
{
    // Change Rate To how much admin rate you want
    // example 5% = 5/100 = 0.05
    var rate = 0;
    var amount = parseInt(document.getElementById('amount').value);
    var admin = parseInt(document.getElementById('amount').value) * rate;
    var total = amount - admin;

    $('#subtotal').html('Rp. ' + amount);
    $('#admin').html('Rp. ' + admin);
    $('#total').html('Rp. ' + total);
    document.getElementById('total_amount').value = total;

}
