<?php
namespace App\Libraries;


class myFunctions {


  public function concatname($lname,$fname,$mname){
    if ($mname == null) {
      $data = $fname.' '.$lname;
    }else {
      $midInitial = substr($mname,0,1);
      $data = $fname.' '.$midInitial.'. '.$lname;
    }
    return $data;
  }

  public function userStats($stat){
    if ($stat==1) {
      $data =  "<span><i class='fa fa-circle fa-md' style='color:green;'></i></span>";
    }else {
      $data =  "<span><i class='fa fa-ban'  style='color:red;'></i></span>";
    }
    return $data;
  }
  public function converDate($date){
    $data = date('M d, Y', strtotime(explode(" ", $date)[0]));
    return $data;
  }
  public function convertDateM($date){
    $data = date('F d, Y', strtotime(explode(" ", $date)[0]));
    return $data;
  }
  public function convernumDate($date){
    $data = date('m/d/Y', strtotime(explode(" ", $date)[0]));
    return $data;
  }

}
