<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ApiController extends BaseController
{

    //get list of invoices
    public function Invoices() {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://devfactura.in/api/v3/cfdi33/list");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "F-PLUGIN: " . '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
            "F-Api-Key: ".'JDJ5JDEwJHNITDlpZ0ZwMzdyd0RCTzFHVXlUOS5XVnlvaFFjd3ZWcnRBZHBIV0Q5QU5xM1Jqc2lpNlVDY',
            "F-Secret-Key: " .'JDJ5JDEwJHRXbFROTHNiYzRzTXBkRHNPUVA3WU83Y2hxTHdpZHltOFo5UEdoMXVoakNKWTl5aDQwdTFT'
        ));

        $response = curl_exec($ch);

        return $response;

        curl_close($ch);
        
    }

    //Cancel Invoice
    public function Cancel($id) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://factura.in/api/v3/cfdi33/". $id ."/cancel");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "F-PLUGIN: " . '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
            "F-Api-Key: ".'JDJ5JDEwJHNITDlpZ0ZwMzdyd0RCTzFHVXlUOS5XVnlvaFFjd3ZWcnRBZHBIV0Q5QU5xM1Jqc2lpNlVD',
            "F-Secret-Key: " .'JDJ5JDEwJHRXbFROTHNiYzRzTXBkRHNPUVA3WU83Y2hxTHdpZHltOFo5UEdoMXVoakNKWTl5aDQwdTFT'
        ));
        
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    //send invoice into email
    public function Send($id) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://factura.in/api/v3/cfdi33/". $id ."/email");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "F-PLUGIN: " . '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
        "F-Api-Key: ".'JDJ5JDEwJHNITDlpZ0ZwMzdyd0RCTzFHVXlUOS5XVnlvaFFjd3ZWcnRBZHBIV0Q5QU5xM1Jqc2lpNlVD',
        "F-Secret-Key: " .'JDJ5JDEwJHRXbFROTHNiYzRzTXBkRHNPUVA3WU83Y2hxTHdpZHltOFo5UEdoMXVoakNKWTl5aDQwdTFT'
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
     }

    //get tipe of invioces
    public function Documents() {

    $docs = [
        "factura" => "Factura",
        "factura_hotel" => "Factura para hoteles",
        "honorarios" => "Recibo de honorarios",
        "nota_cargo" => "Nota de cargo",
        "donativos" => "Donativo",
        "arrendamiento" => "Recibo de arrendamiento",
        "nota_credito" => "Nota de crédito",
        "nota_debito" => "Nota de débito",
        "nota_devolucion" => "Nota de devolución",
        "carta_porte" => "Carta porte",
    ];
    
    return  json_encode($docs);
    }

    //get list of units
    public function Unidad() {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://devfactura.in/api/v3/catalogo/ClaveUnidad");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "F-PLUGIN: " . '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
        "F-Api-Key: ".'JDJ5JDEwJHNITDlpZ0ZwMzdyd0RCTzFHVXlUOS5XVnlvaFFjd3ZWcnRBZHBIV0Q5QU5xM1Jqc2lpNlVD',
        "F-Secret-Key: " .'JDJ5JDEwJHRXbFROTHNiYzRzTXBkRHNPUVA3WU83Y2hxTHdpZHltOFo5UEdoMXVoakNKWTl5aDQwdTFT'
    ));
    
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
    }

    //get list of cfdis
    public function usoCFDI() {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://devfactura.in/api/v3/catalogo/UsoCfdi");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "F-PLUGIN: " . '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
        "F-Api-Key: ".'JDJ5JDEwJHNITDlpZ0ZwMzdyd0RCTzFHVXlUOS5XVnlvaFFjd3ZWcnRBZHBIV0Q5QU5xM1Jqc2lpNlVD',
        "F-Secret-Key: " .'JDJ5JDEwJHRXbFROTHNiYzRzTXBkRHNPUVA3WU83Y2hxTHdpZHltOFo5UEdoMXVoakNKWTl5aDQwdTFT'
    ));
    
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
    }

    //get ways to pay
    public function mPago() {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://devfactura.in/api/v3/catalogo/FormaPago");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "F-PLUGIN: " . '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
        "F-Api-Key: ".'JDJ5JDEwJHNITDlpZ0ZwMzdyd0RCTzFHVXlUOS5XVnlvaFFjd3ZWcnRBZHBIV0Q5QU5xM1Jqc2lpNlVD',
        "F-Secret-Key: " .'JDJ5JDEwJHRXbFROTHNiYzRzTXBkRHNPUVA3WU83Y2hxTHdpZHltOFo5UEdoMXVoakNKWTl5aDQwdTFT'
    ));
    
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
    }

    //get list of coins
    public function Moneda() {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://devfactura.in/api/v3/catalogo/Moneda");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "F-PLUGIN: " . '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
        "F-Api-Key: ".'JDJ5JDEwJHNITDlpZ0ZwMzdyd0RCTzFHVXlUOS5XVnlvaFFjd3ZWcnRBZHBIV0Q5QU5xM1Jqc2lpNlVD',
        "F-Secret-Key: " .'JDJ5JDEwJHRXbFROTHNiYzRzTXBkRHNPUVA3WU83Y2hxTHdpZHltOFo5UEdoMXVoakNKWTl5aDQwdTFT'
    ));
    
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
    }

    //get client data
    public function Client($rfc) {

    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, "http://devfactura.in/api/v1/clients/".$rfc);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "F-PLUGIN: " . '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
        "F-Api-Key: ".'JDJ5JDEwJHNITDlpZ0ZwMzdyd0RCTzFHVXlUOS5XVnlvaFFjd3ZWcnRBZHBIV0Q5QU5xM1Jqc2lpNlVD',
        "F-Secret-Key: " .'JDJ5JDEwJHRXbFROTHNiYzRzTXBkRHNPUVA3WU83Y2hxTHdpZHltOFo5UEdoMXVoakNKWTl5aDQwdTFT'
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
    }

    //Create invoice
    public function Create(Request $request) {

    
    $ch = curl_init();
    $payLoad = json_decode(request()->getContent(), true);


    $fields = [
        "Receptor" => ["UID" => $payLoad['receptor'][1]],
        "TipoDocumento" => $payLoad['TipoDocumento'],
        "UsoCFDI" => $payLoad['usoCFDI'],
        "Redondeo" => 2,
        "Conceptos" => $payLoad['Conceptos'],
        "FormaPago" => "01",
        "MetodoPago" => 'PUE',
        "Moneda" => "MXN",
        "CondicionesDePago" => "Pago en una sola exhibición",
        "Serie" => $payLoad['Serie'],
        "EnviarCorreo" => 'true',
        "InvoiceComments" => ""
    ];
    
    
    curl_setopt($ch, CURLOPT_URL, "http://devfactura.in/api/v3/cfdi33/create");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "F-PLUGIN: " . '9d4095c8f7ed5785cb14c0e3b033eeb8252416ed',
        "F-Api-Key: ".'JDJ5JDEwJHNITDlpZ0ZwMzdyd0RCTzFHVXlUOS5XVnlvaFFjd3ZWcnRBZHBIV0Q5QU5xM1Jqc2lpNlVD',
        "F-Secret-Key: " .'JDJ5JDEwJHRXbFROTHNiYzRzTXBkRHNPUVA3WU83Y2hxTHdpZHltOFo5UEdoMXVoakNKWTl5aDQwdTFT'
    ));
    
    $response = curl_exec($ch);
    
    return die($response);
    
    curl_close($ch);
    
    }
     
}
