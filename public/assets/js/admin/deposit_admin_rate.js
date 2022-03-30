    function change()
    {
        var rate = 0;
        var subtotal = parseInt(document.getElementById('amount').value);
        var admin = parseInt(document.getElementById('amount').value) * rate;

        $('#subtotal').html("Rp. "+ subtotal);
        $('#admin').html("Rp. "+ admin);
        $('#total').html("Rp. "+ parseInt(subtotal + admin));
        document.getElementById('sub').value = subtotal + admin;
    }
