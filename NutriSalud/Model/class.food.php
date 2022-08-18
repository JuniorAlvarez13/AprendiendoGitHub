<?php

class Food {

static function autenticacion(){

    $url = 'https://nutricontrol.co/api/login/login';
    $usuario = 'maryb@gmail.com';
    $password = '1234567';
 
    $curl = curl_init();
    
    $fields = array(
        'email' => $usuario,
        'password' => $password,
    );
    
    $json_string = json_encode($fields);
    
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, TRUE);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $json_string);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    $data = curl_exec($curl);
    $obj = json_decode($data,true);
    curl_close($curl);
    return $obj;
}

static function consultar($token) {

    $URL = "https://nutricontrol.co/api/food";
    $headers 	= array('Authorization: Bearer ' . $token);
    $ch 		= curl_init();
    curl_setopt($ch,CURLOPT_URL,$URL);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_TIMEOUT, 20);
    curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    $obj=json_decode($response, true);
    curl_close ($ch);
    return $obj;

}

static function POST($grupo,$nombre,$kcal,$foodUnits,$protein,$carbohidrate,$token){
    
    $URL = "https://nutricontrol.co/api/food";

    $fields = array(

        'NAME' => $nombre,
        'ID_GROUP' => $grupo,
        'KCAL' => $kcal,
        'ID_FOOD_UNITS' => $foodUnits,
        'PROTEIN' => $protein,
        'CARBOHYDRATE' => $carbohidrate
    );

    $datapost = json_encode($fields);

    $headers 	= array('Authorization: Bearer ' . $token);
    $ch 		= curl_init();
    curl_setopt($ch,CURLOPT_URL,$URL);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datapost);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
    curl_setopt($ch,CURLOPT_TIMEOUT, 20);
    curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    $obj = json_decode($response,true);
    curl_close ($ch);
    return $obj;
}

static function consultaId($id,$token){

    $URL = "https://nutricontrol.co/api/food/".$id;
    $headers 	= array('Authorization: Bearer ' . $token);
    $ch 		= curl_init();
    curl_setopt($ch,CURLOPT_URL,$URL);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_TIMEOUT, 20);
    curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    $obj=json_decode($response, true);
    curl_close ($ch);
    return $obj;

}


static function actualizar($nombre,$id,$grupo,$kcal,$foodUnits,$protein,$carbohidrate,$token){

         $URL = "https://nutricontrol.co/api/food".$id;

        $fields = array(

            'NAME' => $nombre,
            'ID_GROUP' => $grupo,
            'KCAL' => $kcal,
            'ID_FOOD_UNITS' => $foodUnits,
            'PROTEIN' => $protein,
            'CARBOHYDRATE' => $carbohidrate
        );

        $datapost = json_encode($fields);

		$headers 	= array('Authorization: Bearer ' . $token);
		$ch 		= curl_init();
		curl_setopt($ch,CURLOPT_URL,$URL);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "PATCH");
		curl_setopt($ch,CURLOPT_POST, 1);
		curl_setopt($ch,CURLOPT_POSTFIELDS,$datapost);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
        $obj = json_decode($response,true);
		curl_close ($ch);
		return $obj;
}


static function eliminar($id,$token){

    $URL = "https://nutricontrol.co/api/food/".$id;
    $headers 	= array('Authorization: Bearer ' . $token);
    $ch 		= curl_init();

    curl_setopt($ch,CURLOPT_URL,$URL);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_TIMEOUT, 20);
    curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close ($ch);
    return $response;

}







}




?>