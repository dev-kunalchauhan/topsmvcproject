<?php
    session_start();
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
//    exit;

    require_once('model/model.php');

    class controller extends trialmodel{
    //public base_url_static_fixed = "http://localhost/MVC/";
    public $base_url = "";
    public function __construct()
    {
        parent:: __construct();

        //  echo "<pre>";
        //  print_r($_SERVER);
        //  echo $this->base_url;
        //  echo "<br>";
         $pathArray = explode("/",$_SERVER['PHP_SELF']);
        //  echo "<pre>";
        //    print_r($pathArray);
        $this->base_url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/" .$pathArray[1]."/" .$pathArray[2]."/"."/assets/";
        // exit;

        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                     include_once('views/header.php');
                     include_once('views/mainpage.php');
                     include_once('views/footer.php');
                    break;

                case '/login':
                    include_once('views/login.php');
                    if (isset($_REQUEST['btn-login'])) {
                        array_pop($_REQUEST);
                        $data = $_REQUEST;
                        $regreg = $this->selectlogindata($_REQUEST['username'],$_REQUEST['password']);
                        // echo "<pre>";
                        // print_r($regreg);
                        // echo "</pre>";
                        
                        if($regreg['Code']==1)
                        {
                            $_SESSION['UserData']=$regreg['Data'];
                            
                            if($regreg['Data']->Role_Id==1)
                            {
                               header("location:admin");
                            }else{
                                header("location:home");

                            }
                        }else {
                            header("location:login");
                        }
                    }
                    break;

                case '/logout':
                     include_once('views/logout.php');
                    //       session_start();
                    //       session_destroy();
                            header('location:home');
                    break;    

                case '/register':
                    include_once('views/register.php');
                    if(isset($_REQUEST['btn-regist'])){
                        array_pop($_REQUEST);
                        $data = $_REQUEST;
                        $regreg = $this->insert("tbl_login",$data);
                    }
                    break;

                case '/admin':
                    include_once('views/admin/headers.php');
                    include_once('views/admin/mainpage.php');
                    include_once('views/admin/footers.php');
                    break;

                // case '/edituser':
                //     include_once('views/admin/headers.php');
                //     include_once('views/admin/edituser.php');
                //     include_once('views/admin/footers.php');

                case '/ajaxload':
                    include_once('views/header.php');
                    include_once('views/ajaxload.php');
                    include_once('views/footer.php');
                    

                // default:
                //     include_once('views/header.php');
                //     echo "<br><h1>404 Page Not Found</h1>";
                //     include_once('views/footer.php');
                //     break;
            }
        }else {
            header("location:home");
        }

    }
}

$controllerObj = new controller;

?>