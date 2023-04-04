<?php

class Request{

    public $urlApi;

    function __construct()
    {
        $this->urlApi = "http://ubiexpress.net:5610/georgio/mobil/PanelApp2022.php";
    }


    function getChecksCategory($id_ser_venta, $category)
    {
        $ch = curl_init();
        $params = [
            'opcion' => '4',
            'categoria' => $category,
            'idventa' => $id_ser_venta
        ];
        curl_setopt($ch,CURLOPT_URL,$this->urlApi);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $json = json_decode($response,true);
        return $json["Consulta"];       
    }

    function getOrdenServicio($id_ser_venta)
    {
        $array = [];
        $ch = curl_init();
        $params = [
            'opcion' => '3'
        ];
        curl_setopt($ch,CURLOPT_URL,$this->urlApi);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $json = json_decode($response,true);

        
        foreach($json as $dato){
            if($dato['id_ser_venta'] == $id_ser_venta){
                $array = $dato;
            }
        }

        return $array; 
        
    }

    function getFotosChecks($idCheck){
        $ch = curl_init();
        $params = [
            'opcion' => '9',
            'idcheck' => $idCheck
        ];
        curl_setopt($ch,CURLOPT_URL,$this->urlApi);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $json = json_decode($response,true);
        return $json["Consulta"];
    }

    function getFotosOrdenServicio($id_ser_venta){
        $arrayFinal = [];
        $final = [];
        for($i = 0; $i < 7; $i++){
            $cheks = $this->getChecksCategory($id_ser_venta,$i+1);
            foreach($cheks as $dato){
                if ($dato['comentarios'] != 'NA' && $dato['comentarios'] != 'correcto') {
                    array_push($arrayFinal,$dato);
                }
            }
        }

        foreach($arrayFinal as $arr){            
            $fotos = $this->getFotosChecks($arr['idcheck']);
            foreach($fotos as $foto){
                if($foto['idcheck'] == $arr['idcheck']){
                    array_push($final, array(
                        "idcheck" => $foto['idcheck'],
                        "observacion" => $arr['comentarios'],
                        "foto" => $foto['fotomane']
                    ));
                }
            }            
        }

        return $final;
    }

    
}




?>