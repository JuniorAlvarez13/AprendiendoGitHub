<a  href="#" onclick="add()" class="btn btn-success" id="btn-nuevo"><i class="fa-solid fa-user-plus"></i></a>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">FOOD UNIT</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                        <?PHP
                                        $succes = $cmU['success'];
                                        if($succes == 1){
                                            $usuarios = $cmU['data'];
                                        foreach($usuarios as $a4){
                                        ?>
                                        <tr>
                                        <td class="text-center"><?PHP echo $a4['ID'];?></td>
                                        <td class="text-center"><?PHP echo $a4['NAME'];?></td>
                                        <td class="text-center"><a class="btn btn-danger" href="<?PHP echo './?c=foodUnit&a=eliminar&id='.$a4['ID']?>"><i class="fa-solid fa-trash-can"></i></a>
                                                                <a class="btn btn-primary" onclick="editar(<?PHP echo $a4['id']?>)"><span class="fa-solid fa-pencil"></span></a>
                                        </td>
                                        </tr>
                                        <?PHP
                                            }
                                        }else{
                                            $mensaje = $cmU['message'];
                                            echo "<script> alert('".$mensaje."'); </script>";
                                        }
                                        ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>





<script>
function add(){
    
    $.ajax({
        mimeType: 'text/html; charset=utf-8',
        url: './?c=usuario&a=nuevo',
        method: 'POST',
        async: true,
        data: { },
        dataType: 'html',
        success: function(respuesta) {
          
          $('#Mbody').html(respuesta);
          $('#Mtitle').html('Agregar');
          $('#Modal').modal('show');

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error 404');
        }
    }).done(function(respuesta) {

    });
}


function editar(vid){
    if(vid==''){
        alert();
    }
    $.ajax({
        mimeType: 'text/html; charset=utf-8',
        url: './?c=usuario&a=nuevo',
        method: 'POST',
        async: true,
        data: { id:vid},
        dataType: 'html',
        success: function(respuesta) {
          
            $('#Mbody').html(respuesta);
          $('#Mtitle').html('Editar');
          $('#Modal').modal('show'); 

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error 404');
        }
    }).done(function(respuesta) {

    });
}


    </script>