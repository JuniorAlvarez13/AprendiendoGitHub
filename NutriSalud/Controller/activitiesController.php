<?php
require_once('Model//class.Activities.php');
require_once('Model//class.typeActivities.php');

class ActivitiesController{

    function Index(){
        $respuesta = Activities::autenticacion();
        $token = $respuesta['token'];
        $rta = Activities::POST("junior","1","12", $token);
        $cmU = Activities::consultar( $token);
        $rta = TypeActivities::consultar($token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View/Activities/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            Activities::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }



    

   





}

?>