@php
    $randomKey = time();
@endphp     
<div class="card">
    <div class="card-body bg-blue-100">
                
        <div class="md:flex mb-6">
            <div class="md:w-1/3">                
                <legend class="text-gray-900 uppercase tracking-wide text-sm">User: {{$user}}</legend>
            </div>                    
            <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">                                                                                                     
                <div class="mb-4" id="datosCliente">
                    
                                                    
                </div>                                                            
            </div>                    
        </div>
    </div>    
    
    <div class="card-footer">
            <button class="bg-blue-700 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" name="anadirNuevoPrescriptor" id="anadirNuevoPrescriptor" onclick="editarAutorizacion('')">Guardar</button>
    </div>
</div>

<script>

function editarAutorizacion(id, cod){

    var actualizarAutorizacion = actualizarAutorizacionFormulario(id, cod);
    //console.log(actualizarAutorizacion);
     var parametros = {
        "datos" : actualizarAutorizacion,
        "_token": $("meta[name='csrf-token']").attr("content")
    };
    console.log(parametros);
    $.ajax({
        data: parametros,
        url: './autorizaciones/actualizar',
        type: 'post',
        timeout: 2000,
        async: true,
        success: function (response){
                console.log(response);
                if(response == 'ok'){
                    $("#refrescarTabla").trigger('click');   
                }else{
                    Swal.fire({
                        title: 'Error!',
                        text: response,
                        icon: 'error',
                        confirmButtonText: 'Cerrar'
                    })
                }
                //$("#refrescarTabla").trigger('click');
                //window.location.reload();                
        }
    })
}
</script>