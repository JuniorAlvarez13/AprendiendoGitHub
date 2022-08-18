<?php
require_once('Model//class.answers.php');
class AnswersController{

    function Index(){
        $respuesta = Answers::autenticacion();
        $token = $respuesta['token'];
        $_SESSION['TOKEN'] = $token;
        $cmU = Answers::consultar( $token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View/Answers/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            Answers::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }



    

   





}

?>