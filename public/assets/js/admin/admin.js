    let admin = Math.floor((Math.random() * 1000) + 500);
    $('#admin').html("Rp. " + admin);
    function change()
    {
        var subtotal = (parseInt(document.getElementById('amount').value));
        $('#jumlah').html("Rp. " + document.getElementById('amount').value)
        $('#subtotal').html("Rp. " + parseInt(subtotal + admin))
        $('#sub').val(parseInt(subtotal + admin));
    }

