                    
 <a  href="#" onclick="add()" class="btn btn-success" id="btn-nuevo"><i class="fa-solid fa-user-plus"></i></a>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">FOOD</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>grupo</th>
                                            <th>Kcal</th>
                                            <th>Food Units</th>
                                            <th>Protein</th>
                                            <th>Carbohydrate</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>grupo</th>
                                            <th>Kcal</th>
                                            <th>Food Units</th>
                                            <th>Protein</th>
                                            <th>Carbohydrate</th>
                                            <th>Acciones</th>
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
                                        <td class="text-center"><?PHP echo $a4['NAME'];?></td>
                                        <?php
                                        $respuesta = $group['success'];
                                        if($respuesta == 1){
                                            $Group = $group['data'];
                                            foreach($Group as $a5){
                                                if($a4['ID_GROUP']==$a5['ID']){
                                        ?>
                                        <td class="text-center"><?PHP echo $a4['NAME'];?></td>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                        <td class="text-center"><?PHP echo $a4['KCAL'];?></td>
                                        <?php
                                        $rta = $foodUnit['success'];
                                        if($rta == 1){
                                            $FoodU = $foodUnit['data'];
                                            foreach($FoodU as $a6){
                                                if($a4['ID_FOOD_UNITS']==$a6['ID']){
                                        ?>
                                        <td class="text-center"><?PHP echo $a6['NAME'];?></td>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                        <td class="text-center"><?PHP echo $a4['PROTEIN'];?></td>
                                        <td class="text-center"><?PHP echo $a4['CARBOHYDRATE'];?></td>
                                        <td class="text-center"><a class="btn btn-danger" href="<?PHP echo './?c=food&a=eliminar&id='.$a4['ID']?>"><i class="fa-solid fa-trash-can"></i></a>
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