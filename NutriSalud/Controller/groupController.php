<?php
require_once('Model//class.group.php');
class GroupController{

    function Index(){
        $respuesta = Group::autenticacion();
        $token = $respuesta['token'];
        $_SESSION['TOKEN'] = $token;
        $cmU = Group::consultar( $token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View/Group/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            Group::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }



    

   





}

?>