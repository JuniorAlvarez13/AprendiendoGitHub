<?php

class FoodUnit {

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

    $URL = "https://nutricontrol.co/api/foodUnit";
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

static function agregar($name,$token){

    /* API URL */
    $url = 'https://nutricontrol.co/api/foodUnit';
         
    /* Init cURL resource */
    $ch = curl_init($url);
       
    /* Array Parameter Data */
    $data = ['NAME'=> $name];

    $json = json_encode($data);
    var_dump($json);
       
    /* pass encoded JSON string to the POST fields */
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        
    /* set the content type json */
    $headers = [ 'Authorization: Bearer ' . $token
        ];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       
    /* set return type json */
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
    /* execute request */
    $result = curl_exec($ch);
        
    /* close cURL resource */
    curl_close($ch);

    return json_decode($result,true);

}

static function consultaId($id,$token){

    $URL = "https://nutricontrol.co/api/usuarios/".$id;
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


static function actualizar($id,$nombre,$fecha,$email,$password,$token){

         $URL = "https://nutricontrol.co/api/usuarios/".$id;

        $fields = array(
            'nombre' => $nombre,
            'fecha' => $fecha,
            'email' => $email,
            'password' => $password
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

    $URL = "https://nutricontrol.co/api/foodUnit/".$id;
    $headers 	= array('Authorization: Bearer ' . $token);
    $ch 		= curl_init();

    curl_setopt($ch,CURLOPT_URL,$URL);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_TIMEOUT, 20);
    curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    $obj = json_decode($response,true);
    curl_close ($ch);
    return $obj;

}







}




?>