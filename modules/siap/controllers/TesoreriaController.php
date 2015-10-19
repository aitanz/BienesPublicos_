<?php

namespace app\modules\siap\controllers;

use app\components\AitController;
use \Yii;

class TesoreriaController extends AitController
{
    public function actionIndex()
    {
        return $this->redirect(['/siap/']);
    }
    
    public function actionPagoProveedores()
    {
        return $this->render('pagoProveedores');
    }
    
    public function actionGenerarArchivopagoProveedores()
    {
        if( Yii::$app->request->isAjax )
        {
            try
            {
                $return = ["success" => false];
                $datosEmpresa = json_decode( Yii::$app->request->post('datosEmpresa') );
                $proveedores = json_decode( Yii::$app->request->post('proveedores') );
                if( isset($datosEmpresa->nombreEmpresa) &&
                    isset($datosEmpresa->rif) &&
                    isset($datosEmpresa->letraRif) &&
                    isset($datosEmpresa->numeroReferencia) &&
                    isset($datosEmpresa->numeroNegociacion) &&
                    isset($datosEmpresa->fechaEnvio) &&
                    isset($datosEmpresa->tipoCuentaOrdenante) &&
                    isset($datosEmpresa->numeroCuentaOrdenante) &&
                        count( $proveedores ) > 0
                )
                {
                    $archivo = fopen("temporal/archivo.txt", "w+");
                    $header = "HEADER  ".str_pad( substr($datosEmpresa->numeroReferencia, 0, 8), 8, "0", STR_PAD_LEFT)
                            .str_pad(substr($datosEmpresa->numeroNegociacion, 0, 8), 8, "0", STR_PAD_LEFT)
                            .strtoupper($datosEmpresa->letraRif)
                            .str_pad( substr($datosEmpresa->rif, 0, 9), 9, "0", STR_PAD_LEFT)
                            .$datosEmpresa->fechaEnvio
                            .$datosEmpresa->fechaEnvio;
                    fwrite($archivo, $header.PHP_EOL);
                    $total = 0;
                    foreach ( $proveedores as $proveedor)
                    {
                        $proveedor->montoCredito = number_format($proveedor->montoCredito, 2, ",", "");
                        $debito = "DEBITO  ".str_pad( substr($proveedor->numeroReferencia, 0, 8), 8, "0", STR_PAD_LEFT)
                                .strtoupper($datosEmpresa->letraRif)
                                .str_pad( substr($datosEmpresa->rif, 0, 9), 9, "0", STR_PAD_LEFT)
                                .str_pad( substr(strtoupper($datosEmpresa->nombreEmpresa), 0, 35), 35, " ", STR_PAD_RIGHT)
                                .$proveedor->fechaValor
                                .$datosEmpresa->tipoCuentaOrdenante
                                .$datosEmpresa->numeroCuentaOrdenante
                                .str_pad( str_replace(".", ",", substr($proveedor->montoCredito, 0, 18)), 18, "0", STR_PAD_LEFT)
                                ."VEB40";

                        $credito = "CREDITO ".str_pad( substr($proveedor->numeroReferencia, 0, 8), 8, "0", STR_PAD_LEFT)
                                .strtoupper($datosEmpresa->letraRif)
                                .str_pad( substr($datosEmpresa->rif, 0, 9), 9, "0", STR_PAD_LEFT)
                                .str_pad( substr(strtoupper($proveedor->nombre), 0, 30) , 30, " ", STR_PAD_RIGHT)
                                .$proveedor->tipoCuenta
                                .str_pad( substr($proveedor->numeroCuenta, 0, 20) , 20, "0", STR_PAD_LEFT)
                                .str_pad( substr($proveedor->montoCredito, 0, 18), 18, "0", STR_PAD_LEFT);
                        switch ($proveedor->tipoPago)
                        {
                            case 1:
                                $credito = $credito."10";
                                $credito = $credito.str_pad( "BSCHVECA", 19, " ", STR_PAD_RIGHT);
                                break;

                            case 2:
                                $credito = $credito."00";
                                $credito = $credito.str_pad( substr( ( strcmp($proveedor->tipoBanco, "otro") == 0 ? "" : $proveedor->tipoBanco ) , 0, 8), 19, " ", STR_PAD_RIGHT);
                                break;

                            case 3:
                                $credito = $credito."20";
                                $credito = $credito.str_pad( "BSCHVECA", 19, " ", STR_PAD_RIGHT);
                                
                                break;

                            default:
                                break;
                        }
                        $credito = $credito.str_pad( substr(strtoupper($proveedor->email), 0, 50) , 50, " ", STR_PAD_RIGHT);

                        $total = $total + (double)$proveedor->montoCredito;

                        fwrite($archivo, $debito.PHP_EOL);
                        fwrite($archivo, $credito.PHP_EOL);
                    }
                    $total = "TOTAL   ".str_pad( number_format((double)substr($total, 0, 28), 2, ",", ""), 28, "0", STR_PAD_LEFT);
                    fwrite($archivo, $total);
                    fclose($archivo);
                    $return = ["success" => true];
                }
                else
                {
                    $return = ["success" => false, "message" => "Faltan datos."];
                }
            }
            catch (\yii\base\ErrorException $ex)
            {
                $return = ["success" => false, "message" => "No se pudo crear el archivo, no tiene permisos o el archivo no existe."];
            }
            catch(Exception $ex)
            {
                $return = ["success" => false, "message" => "No se pudo crear el archivo, notifique al administrador del sistema."];
            }
            echo json_encode($return);
            return;
        }
    }
    
    public function actionDescargarArchivo()
    {
        try
        {
            $filename = "temporal/archivo.txt";
            if(file_exists($filename))
            {
                $nombre = explode("/", $filename);
                header('Content-Type: '.  filetype($filename));
                header('Content-Disposition: attachment; filename='.$nombre[count($nombre)-1] );
                header('Content-Length: '.  filesize($filename));
                //readfile($filename);
                echo file_get_contents($filename);
            }
            else
            {
                throw new \yii\web\NotFoundHttpException();
            }
        }
        catch (Exception $ex) {
            throw new \yii\web\NotFoundHttpException("Error al abrir el archivo.");
        }
        
        return;
    }
}
