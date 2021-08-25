var content = 0;
var admin = 0;
var subtotal = parseInt(document.getElementById('subtotal').innerHTML);
var x = parseInt(document.getElementById('tot').innerHTML);

function addContent()
{
    content += 75000;
    x       += 75000;
    admin = (subtotal + content) * 0.05

    $('#content').html('Rp. '+content);
    $('#admin').html('Rp. '+admin)
    $('#total').html('Rp. '+x);
    $('#tot').html(x);
}

function delContent(){
    content -= 75000
    x -= 75000
    admin = (subtotal + content) * 0.05
    $('#content').html('Rp. '+content);
    $('#admin').html('Rp. '+admin)
    $('#total').html('Rp.'+x);
    $('#tot').html(x)
}
