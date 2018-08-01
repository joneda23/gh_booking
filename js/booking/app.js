var sh ;
$(function (){
    $('#pdate').on('change',function(){
        $('#div_hours').html("");
       $.post('booking/availability',{d:$('#pdate').val()},function(data){
        var obj = JSON.parse(data);
        obj.forEach(function(item){
            $('#div_hours').append('<button class="btn btn-success col-md-3" data-toggle="modal" data-target="#mbook" onclick="ch_hour('+item+')">Select '+item+':00</button>')
        });
       });
    });

    $('#sbysin').on('keyup',function(e){
        this.value = this.value.replace(/[^0-9]/gi, '');
        
        if (($('#sbysin').val()+"").length==9){
            $.post('patient/find_patient',{s:this.value},function(data){
                dato = JSON.parse(data);
                console.log(dato.hay);
                if (dato.hay ==1){
                    $('#mbt_name').html(dato.n);
                    $('#mbt_address').html(dato.a);
                    $('#mbt_email').html(dato.e);
                    $('#mbt_phone').html(dato.p);
                }else {
                    $('#mbt_name').html("");
                    $('#mbt_address').html("");
                    $('#mbt_email').html("");
                    $('#mbt_phone').html("");
                }
            });
        } else {
            $('#mbt_name').html("");
            $('#mbt_address').html("");
            $('#mbt_email').html("");
            $('#mbt_phone').html("");
        }
    });

    $('#bspatient').on('click',function(){
        $.post('patient/add_patient',{s:$('#mpi_sin').val(),n:$('#mpi_name').val(),a:$('#mpi_address').val(),e:$('#mpi_email').val(),p:$('#mpi_phone').val()},function(data){
            dato = JSON.parse(data);
            if (dato.error==0){
                $('#sbysin').val(dato.sin);
                $('#mpatient').modal('toggle');
                $('#sbysin').trigger('keyup');
            } else alert (dato.message);
        });
    });

    $('#bsbook').on('click',function(){
        if ($('#mbt_name').html() != ""){
            $.post('booking/book_now',{p:$('#sbysin').val(),d:$('#pdate').val(),h:$('#mih_hour').val(),r:$('#mbt_reason').val()},function(data){
                dato = JSON.parse(data);
                if (dato.error==1){
                    $('#mbook').modal('toggle');
                }
                
                $('#pdate').trigger('change');
            });
        }
    });

});

function ch_hour(h){
    $("#mih_hour").val(h);
    $("#ms_h").html(' at '+h+':00');
}