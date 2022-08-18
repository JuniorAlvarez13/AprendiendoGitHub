<?php
require_once('Model//class.Intensities.php');
class IntensitiesController{

    function Index(){
        $respuesta = Intensities::autenticacion();
        $token = $respuesta['token'];
        $_SESSION['TOKEN'] = $token;
        $cmU = Intensities::consultar( $token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View/Intensities/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            Intensities::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }



    

   





}

?>