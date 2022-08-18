<?php
require_once('Model//class.food.php');
require_once('Model//class.group.php');
require_once('Model//class.foodUnit.php');
class FoodController{

    function Index(){
        $respuesta = Food::autenticacion();
        $token = $respuesta['token'];
        $cmU = Food::consultar( $token);
        $group = Group::consultar($token);
        $foodUnit = FoodUnit::consultar($token);
        require_once('layout/head.php');
        require_once('layout/nav.php');
        require_once('View/food/index.php');
        require_once('layout/footer.php');
    }

    function eliminar(){
        
        if(isset($_GET['id'])){
            Food::eliminar($_GET['id'],$_SESSION['TOKEN']);
        }
        $this->Index();
    }


    

   





}





























?>