/* document.getElementById("fotoArticulo").onchange = function(e) {
    addImage(e); 
} */

function addImage(e){
    var file = e.target.files[0],
    imageType = /image.*/;
    
    if (!file.type.match(imageType))
    return;
    
    var reader = new FileReader();
    reader.onload = fileOnload;
    reader.readAsDataURL(file);
}

function fileOnload(e) {
    var result=e.target.result;
    $('#imgSalida').attr("src",result);
}

// Muestra el modal del nuevo articulo
function add_articulo_modal() {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : url + "articulo/modal_create",
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
// Guardar nuevo articulo
function save_articulo() {   
    var form_data = new FormData($("#frm_nuevo_articulo")[0]);     

    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : url + "articulo/saveNewArt",
        type: 'POST',
        contentType: false,
        processData: false,
        data: form_data,
        dataType: 'json',
        success: function(respuesta) {            
            if (respuesta.success == true) {
                $('#mod_add_articulo').modal('hide').on('hidden.bs.modal', function() {
                    swal("Proceso  correcto!", respuesta.message,'success') 
                    location.reload();
                });
            } else {     
                $('#titulo_articulo').empty();           
                swal("Error!", respuesta.message,'error')
            }
        },
        error: function(xhr) {
         //   var message = getErrorAjax(xhr, 'Error de conectividad de red USR-02.');
         
         swal("Error", xhr,'warning')

        }
    });
}
function edit_articulo() {   
    var form_data = new FormData($("#frm_edita_articulo")[0]);     
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : url + "articulo/save_edita_articulo",
        type: 'POST',
        contentType: false,
        processData: false,
        data: form_data,
        dataType: 'json',
        success: function(respuesta) {            
            if (respuesta.success == true) {
                $('#mod_edit_articulo').modal('hide').on('hidden.bs.modal', function() {
                    swal("Proceso  correcto!", respuesta.message,'success') 
                    location.reload();
                });
            } else {     
                $('#titulo_articulo').empty();           
                swal("Error!", respuesta.message,'error')
            }
        },
        error: function(xhr) {
         //   var message = getErrorAjax(xhr, 'Error de conectividad de red USR-02.');
         
         swal("Error", xhr,'warning')

        }
    });
}
function editarArticulo(id) {
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : url + "articulo/modal_edita_articulo/"+id,
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
