$(document).ready(function() {
    var datatable = $('#list_all').DataTable( {
        "ajax": {"url":"patient/list_bydate","dataSrc":""}
    });

    $('#d_date').on('change',function(){
        $.post('patient/list_bydate',{d:$('#d_date').val()},function(data){
            dato = JSON.parse(data);
            console.log();
            datatable.clear();
            datatable.rows.add(dato);
            datatable.draw();
        });
    });

});