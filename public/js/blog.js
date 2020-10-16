$(document).ready(function() {

$('.listar-articulos-table').each(function () {
    $(this).dataTable(window.dtDefaultOptions);
});
var dataTable = $('#listar-articulos-table').dataTable({
    processing: true,
    serverSide: true,
    dom: 'Bfrtip',
    stripHtml: false,
    iDisplayLength: 5,

    ajax: {
        "url": url + "articulo/data_listar_articulos",
        "type": "GET"
    },
    columns: [
        { data: 'id', name: 'id' },
        { data: 'titulo', name: 'titulo' },                         
        { 
            "mRender": function (data, type, row) {
                var foto = row.foto;
                return '<img height="100" width="150" src="./storage/'+foto+'">'; 
                //return '<span class="kt-font-bold kt-font-primary">'+logotipo+'</span>';  
            } 
           } ,
        { data: 'likes', name: 'likes' },                                                                                                                  
        {
            "mRender": function (data, type, row) {
                var id = row.id;                
                
    
                      return ' <table>\
                      <tbody><tr>\
                      <td> <a class="btn btn-outline-success" onClick="irArticulo('+id+');" href="javascript:void(0)">Ver</a></td>\
                      <td> <a class="btn btn-outline-warning" onClick="editarArticulo('+id+');" href="javascript:void(0)">Editar</a></td>\</tr>\
                      <td> <a class="btn btn-outline-danger" onClick="borrarArticulo('+id+');" href="javascript:void(0)">Borrar</a></td>\</tr>\
                      </tbody></table>\
                                 ';

            }
        }

    ]
    });
    });

    
    function irArticulo(id) {
        window.location.href = url+ "articulo/verArticulo/"+id;
        
    }
    function editarArticulo(id) {
        window.location.href = url+ "articulo/editarArticulo/"+id;
        
    }
    function borrarArticulo(id) {
       
        swal({
            title: "Seguro que requiere borrar este artículo?",
            text: "Una vez borrado, no podrá recuperarlo!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : url + "articulo/borrarArticulo/"+id,
                    dataType: 'html',
                    success: function(resp_success) {
                        swal('Borrado!','EL articulo fue borrado exitosamente ','success');
                        location.reload();
                    },
                    error: function(respuesta) {
                        swal('Aleta!','Ocurrio un error, vuelva a intentar mas tarde','warning');
                    }
                });
            } else {
              swal("No se borro su artículo!");
            }
          });
        
        
    }