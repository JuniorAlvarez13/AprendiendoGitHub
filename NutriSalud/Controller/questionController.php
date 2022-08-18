<?php
require_once('Model//class.question.php');
class QuestionController{

    function Index(){
        $respuesta = Question::autenticacion();
        $token = $respuesta['token'];
        $_SESSION['TOKEN'] = $token;
        $cmU = Question::consultar( $token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View/Question/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            Question::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }



    

   





}

?>