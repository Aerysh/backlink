var admin = 0;
var total = parseInt(document.getElementById('tot').innerHTML);

function addContent(){
    total += 75000
    admin += 75000
    $('#admin').html('Rp. '+admin);
    $('#total').html('Rp.'+total);
    $('#tot').html(total)
}

function delContent(){
    total -= 75000
    admin -= 75000
    $('#admin').html('Rp. '+admin);
    $('#total').html('Rp.'+total);
    $('#tot').html(total)
}
