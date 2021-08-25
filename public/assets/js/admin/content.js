var content = 0;
var x = parseInt(document.getElementById('tot').innerHTML);

function addContent()
{
    content += 75000;
    x       += 75000;

    $('#content').html('Rp. '+content);
    $('#total').html('Rp. '+x);
    $('#tot').html(x);
}

function delContent(){
    content -= 75000
    x -= 75000
    $('#content').html('Rp. '+content);
    $('#total').html('Rp.'+x);
    $('#tot').html(x)
}
