    function change()
    {
        var subtotal = parseInt(document.getElementById('amount').value);
        var tax = parseInt(document.getElementById('amount').value) * 0.05;

        $('#subtotal').html("Rp. "+ subtotal);
        $('#admin').html("Rp. "+ tax);
        $('#total').html("Rp. "+ parseInt(subtotal + tax));
        document.getElementById('sub').value = subtotal + tax;
    }
