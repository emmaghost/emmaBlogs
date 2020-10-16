$(document).ready(function() {

$('.listar-comentarios-table').each(function () {
    $(this).dataTable(window.dtDefaultOptions);
});
id_articulo =  $('#id_articulo').val();
var dataTable = $('#listar-comentarios-table').dataTable({
    processing: true,
    serverSide: true,
    dom: 'Bfrtip',
    stripHtml: false,
    iDisplayLength: 5,

    ajax: {
        "url": url + "articulo/data_listar_comentarios/"+id_articulo,
        "type": "GET"
    },
    columns: [
        { data: 'id_articulo', name: 'id_articulo' },
        { data: 'comentario', name: 'comentario' },                         
       

    ]
    });
    });

    
    function generaComentario(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : url + "articulo/modal_genera_comentario/"+id,
            dataType: 'html',
            success: function(resp_success) {
                var modal = resp_success;
                $(modal).modal().on('shown.bs.modal', function() {                               
                }).on('hidden.bs.modal', function() {
                    $(this).remove();
                });
            },
            error: function(respuesta) {
                Swal.fire('¡Alerta!','Error de conectividad de red USR-01','warning');
            }
        });
    }

    // Guardar nuevo comentario
function save_comentario() {   
    var comentario = $("#comentario").val();
    var id_articulo = $("#id_articulo").val();
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : url + "articulo/guardaComentario",
        type: 'POST',
        data: {comentario : comentario , id_articulo : id_articulo},
        dataType: 'json',
        success: function(respuesta) {            
            if (respuesta.success == true) {
                $('#mod_add_comentario').modal('hide').on('hidden.bs.modal', function() {
                    swal("Proceso  correcto!", respuesta.message,'success') 
                    location.reload();
                });
            } else {     
                $('#mod_add_comentario').modal('hide').on('hidden.bs.modal', function() {
                    swal("Error!", respuesta.message,'error')
                });                         
              
            }
        },
        error: function(xhr) {
         //   var message = getErrorAjax(xhr, 'Error de conectividad de red USR-02.');
         
         swal("Error", xhr,'warning')

        }
    });
}