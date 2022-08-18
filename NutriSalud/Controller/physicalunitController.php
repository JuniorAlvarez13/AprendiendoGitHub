<?php
require_once('Model//class.physicalUnit.php');
class PhysicalunitController{

    function Index(){
        $respuesta = PhysicalUnit::autenticacion();
        $token = $respuesta['token'];
        $_SESSION['TOKEN'] = $token;
        $cmU = PhysicalUnit::consultar( $token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View/PhysicalUnit/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            PhysicalUnit::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }



    

   





}

?>