<?php
//
namespace App\Modules;
//
use App\Primitives\BigQueryConnection as Connection;
//
class Bseg extends Connection{
  
  private static $instance;

  public static function instanciate($bigquery){

    if (!self::$instance instanceof self){

      self::$instance = new self($bigquery);

    }

      return self::$instance;

    }

    public function index(){
      
      $index=$this->bigquery->query(
      "SELECT
        idConcepto,
        sociedad,
        cuenta,
        idSuperConcepto,
        superConcepto,
        concepto,
        fecha,
        ceco,
        monto,
        texto,
        CAST(SUBSTR(fecha,6,2) AS INT64) AS mes
      FROM
        `pit-analytics-2019.MULTIVA.bsegaiolte`
      ORDER BY 
      idConcepto"
      );

      $response=[];

      $i=0;
      foreach ($index as $row) {

        $i++;
        $line=$row;
        $line['_id']=$i;
        unset($row);

        $response[]=$line;

      }

      unset($index);

      return $response;

    }

  public function fecha(){

    $fecha=$this->bigquery->query("SELECT DISTINCT(fecha) FROM `pit-analytics-2019.MULTIVA.bsegaiolte` ORDER BY fecha");
    return $fecha;

  }

  public function concepto(){

    $concepto=$this->bigquery->query("SELECT DISTINCT(concepto) FROM `pit-analytics-2019.MULTIVA.bsegaiolte` ORDER BY concepto");
    return $concepto;

  }

  public function superConcepto(){

    $superConcepto=$this->bigquery->query(
      "SELECT DISTINCT(idSuperConcepto) FROM `pit-analytics-2019.MULTIVA.bsegaiolte` ORDER BY idSuperConcepto"
    );
    return $superConcepto;

  }

  public function ceco(){

    $ceco=$this->bigquery->query("SELECT DISTINCT(ceco) FROM `pit-analytics-2019.MULTIVA.bsegaiolte` ORDER BY ceco");
    return $ceco;

  }

  public function sociedad(){

    $sociedad=$this->bigquery->query("SELECT DISTINCT(sociedad) FROM `pit-analytics-2019.MULTIVA.bsegaiolte` ORDER BY sociedad");
    return $sociedad;

  }

  public function cuenta(){

    $cuenta=$this->bigquery->query("SELECT DISTINCT(cuenta) FROM `pit-analytics-2019.MULTIVA.bsegaiolte` ORDER BY cuenta");
    return $cuenta;

  }

  public function mes(){

    $mes=$this->bigquery->query("SELECT DISTINCT(CAST(SUBSTR(fecha,6,2) AS INT64)) AS mes FROM `pit-analytics-2019.MULTIVA.bsegaiolte` ORDER BY mes");
    return $mes;

  }

}
?>