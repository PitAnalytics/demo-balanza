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
        Cuenta.id AS idConcepto,
        Bseg.BUKRS AS sociedad,
        Cuenta.cuenta AS cuenta,
        Cuenta.superConcepto AS superConcepto,
        Cuenta.concepto AS concepto,
        CONCAT(SUBSTR(BUDAT,0,4),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,7,2)) AS fecha,
        Bseg.KOSTL AS ceco,
        ROUND(CAST(Bseg.DMBTR AS FLOAT64),2) AS monto,
        Bseg.SGTXT AS texto
      FROM
        `pit-analytics-2019.MULTIVA.cuenta` AS Cuenta
      INNER JOIN
        `pit-analytics-2019.MULTIVA.bsegaio` AS Bseg
      ON
        Cuenta.cuenta = Bseg.HKONT
        
      ORDER BY idConcepto,sociedad,cuenta");

      return $index;

    }

  public function date(){

    $date=$this->bigquery->query(
      "SELECT DISTINCT(CONCAT(SUBSTR(BUDAT,0,4),'-',SUBSTR(BUDAT,5,2),'-',SUBSTR(BUDAT,7,2))) AS fecha"
    );

    return $date;

  }

  public function month(){

    $month=$this->bigquery->query("");

    return $month;

  }

}
?>