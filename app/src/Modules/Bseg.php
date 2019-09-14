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
        superConcepto,
        concepto,
        fecha,
        ceco,
        monto,
        texto
      FROM
        `pit-analytics-2019.MULTIVA.bsegaiolte`
      ORDER BY 
      idConcepto");

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