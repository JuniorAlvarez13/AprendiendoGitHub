<?php
require_once('Model//class.typeActivities.php');
class TypeactivitiesController{

    function Index(){
        $respuesta = TypeActivities::autenticacion();
        $token = $respuesta['token'];
        $_SESSION['TOKEN'] = $token;
        $rta = TypeActivities::POST("ejercicio",$token);
        var_dump($rta);
        exit;
        $cmU = TypeActivities::consultar( $token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View/TypeActivities/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            TypeActivities::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }



    

   





}

?>