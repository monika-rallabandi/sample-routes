<?php

namespace Drupal\mbtaroutes\Controller;

class MbtaschedulesController {
  
  public function page($routeid) {

    $url = 'https://api-v3.mbta.com/schedules?filter%5Broute%5D='.$routeid;
    $result=CallAPI('GET', $url);
    $result=json_decode($result);
    $res=$result->data;

    return array(
      '#theme' => 'mbta_schedules',
      '#items' => $res,
      '#title' => 'MBTA Schedules'
    );


  }
}
