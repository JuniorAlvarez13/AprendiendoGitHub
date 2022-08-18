<?php
require_once('Model//class.FoodMoments.php');
class FoodMomentController{

    function Index(){
        $respuesta = FoodMoment::autenticacion();
        $token = $respuesta['token'];
        $_SESSION['TOKEN'] = $token;
        $cmU = FoodMoment::consultar( $token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View//FoodMoment/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            FoodMoment::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }



    

   





}

?>