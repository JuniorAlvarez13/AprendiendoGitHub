<?php
require_once('Model//class.foodUnit.php');
class FoodUnitController{

    function Index(){
        $respuesta = FoodUnit::autenticacion();
        $token = $respuesta['token'];
        $_SESSION['TOKEN'] = $token;
        $cmU = FoodUnit::consultar( $token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View/FoodUnit/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            FoodUnit::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }



    

   





}

?>