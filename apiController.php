<?php

namespace App\Controllers;
use Hleb\Constructor\Handlers\Request;


$test = new ApiController();
echo $test->gettime(array($_GET['date1'],$_GET['date2']));


Class ApiController extends \MainController
{


    public function gettime($params){


        $t = microtime(true);
        $d = date('Y-m-d H:i:s.', $t);

     if ($params[0] == 'sql'){
          $sqlDate = $d;
     }


     if($params[1] == 'unix'){
         $unixDate = round(microtime(true) * 1000);
     }

     $method = Request::get("controller").'.'.Request::get("method");
     $arr1 = array('sql'=>$sqlDate,'unix'=>$unixDate);

        $arr = array('api' => '1.03' , 'method' => $method,'params'=>$arr1);
    
        exit(json_encode($arr));


    }

}
