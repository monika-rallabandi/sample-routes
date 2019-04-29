<?php

namespace Drupal\mbtaroutes\Controller;

class MbtaroutesController {

  public function page() {

    $url = 'https://api-v3.mbta.com/routes';
    $result=CallAPI('GET', $url);
    $result=json_decode($result);
    $res=$result->data;
    $resbytypes=array();

    foreach ($res as $key => $value) {
      $resbytypes[$value->attributes->type][]=$value;
    }

    //echo'<pre>';
    //print_r($resbytypes);exit();
    ksort($resbytypes);
  //  print_r($resbytypes);

//$items=new stdClass();
    $items->html=$html;
    return array(
      '#theme' => 'mbta_routes',
      '#items' => $resbytypes,
      '#title' => 'MBTA Routes',
      '#attached' => array(
        'library' => array(
          'mbtaroutes/mbtaroutes',
        ),
      )
    );
  }

}
