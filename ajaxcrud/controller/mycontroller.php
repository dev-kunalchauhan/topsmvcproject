<?php
require_once('model/model.php');
class mycontroller extends model{
 function __construct(){
    parent::__construct();
    if (isset($_SERVER['PATH_INFO'])) {
        switch ($_SERVER['PATH_INFO']) {
            case '/home':
                //echo "welcome";
                include_once('views/prod_data.php');
                break;
             
                case '/getproddata':
                    //echo "welcome";
                    //echo "called";
                   $res = $this->select('products');
                   echo json_encode(array($res));
                    break;
                    
                case '/storeproddata':
                    // print_r($REQUEST);  
                    $this->insert('products',array('product_title'=>$_REQUEST['prod_ttl'],'product_price'=>$_REQUEST['prod_prc']));
                    $res = $this->select('products');
                    echo json_encode($res); 
            
            default:
                # code...
                break;
        }
    }else{
            header('location:home');       
    }
 }
}

$myController = new mycontroller;

?>