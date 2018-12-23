var select = $('#docvidselect');
// var $select2 = $('#select2');
select.change(function(){
    var val = this.value;

    if( val == 0 ){
        // console.log(val);
        $('#srokdoc').hide();
        $('#srokdocinput').attr('value', '0');
        $('#srokdocinput').attr('type','text');
    }
    else{
        $('#srokdoc').show();
        $('#srokdocinput').attr('type','date');
    }

});