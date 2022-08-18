<?php
require_once('Model//class.physicalMesure.php');
require_once('Model//class.physicalUnit.php');
class PhysicalmesureController{

    function Index(){
        $respuesta = PhysicalMesure::autenticacion();
        $token = $respuesta['token'];
        $_SESSION['TOKEN'] = $token;
        $cmU = PhysicalMesure::consultar( $token);
        $physicalUnit = PhysicalUnit::consultar($token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View/PhysicalMesure/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            PhysicalMesure::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }



    

   





}

?>