$(document).ready(function() {
    var table = $('#list_all').DataTable( {
        "ajax": {"url":"patient/list_all","dataSrc":""},
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button>..more..</button>"
        } ]
    } );
 
    $('#list_all tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $('#mph_sin').val(data[0]);
        $('#mpi_sin').val(data[0]);
        $('#mpi_name').val(data[1]);
        $('#mpi_address').val(data[2]);
        $('#mpi_email').val(data[3]);
        $('#mpi_phone').val(data[4]);
        
        $.post('patient/getPatientAppo',{p:data[0]},function(dat){
            dato = JSON.parse(dat);
            $('#div_appo').html('');
            dato.forEach(function(item){
                if (item[2]==0)
                    $('#div_appo').append('<tr><td>Passed on '+item[0]+' at '+item[1]+':00 hours</td></tr>');
                else
                $('#div_appo').append('<tr><td>Made for '+item[0]+' at '+item[1]+':00 hours</td><td>'+
                                      '<button type="button" class="btn btn-warning btn-xs" onclick="rm_appo(\''+data[0]+'\',\''+item[0]+'\','+item[1]+')">remove</button></td></tr>');
            });
            
            console.log(dato);
        });
        $('#mpatientview').modal('toggle');
    } );

    $('#rm_patient').on('click',function(){
        $.post('patient/rm_patient',{s:$('#mph_sin').val()},function(){
            location.reload();
        });
    });

    $('#up_patient').on('click',function(){
        $.post('patient/up_patient',{os:$('#mph_sin').val(),s:$('#mpi_sin').val(),n:$('#mpi_name').val(),a:$('#mpi_address').val(),e:$('#mpi_email').val(),p:$('#mpi_phone').val()},function(data){
            dato = JSON.parse(data);
            if (dato.error==0){
                alert('Success on updating the patient');
                location.reload();
            } else alert (dato.message);
        });
    });
} );

function rm_appo(si,da,ho){
    $.post('patient/rm_appo',{s:si,d:da,h:ho},function(){
        $.post('patient/getPatientAppo',{p:si},function(dat){
            dato = JSON.parse(dat);
            $('#div_appo').html('');
            dato.forEach(function(item){
                if (item[2]==0)
                    $('#div_appo').append('<tr><td>Passed on '+item[0]+' at '+item[1]+':00 hours</td></tr>');
                else
                $('#div_appo').append('<tr><td>Dated for '+item[0]+' at '+item[1]+':00 hours</td><td>'+
                                      '<button type="button" class="btn btn-warning btn-xs" onclick="rm_appo(\''+si+'\',\''+item[0]+'\','+item[1]+')">remove</button></td></tr>');
            });
            
            console.log(dato);
        });
    });
}