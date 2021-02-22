<?php
class trialmodel{

public $Connect = "";    

public function __construct(){
    $this->Connect = new mysqli("localhost","root","","collegemgmtsystem");
    if(!$this->Connect)  
           {  
                echo 'Database Connection Error ' . mysqli_connect_error($this->Connect);  
           }  
}

public function insert($tbl,$data){

    $colms = implode(",",array_keys($data));
    //echo $colms;
    $valus = implode("','",$data);
    //echo $valus;
    $sqlquery = "INSERT INTO $tbl ($colms)VALUES('$valus')";
    $exe = $this->Connect->query($sqlquery);
    echo $sqlquery;

    if($exe>0){
        $Resolution['Data'] = '1';
        $Resolution['Code'] = '1';
        $Resolution['Msg'] = 'Success';
    }else {
        $Resolution['Data'] = '0';
        $Resolution['Code'] = '0';
        $Resolution['Msg'] = 'Failure';
    }
    return $Resolution;
}

public function selectlogindata($uname,$pass){
    $sqlquery = "SELECT * FROM tbl_login WHERE login_password='$pass' AND (login_email='$uname' OR login_phoneno='$uname')";
    $exe=$this->Connect->query($sqlquery);
    if($exe->num_rows>0) {
        $fetchobj = $exe->fetch_object();
        $Resolution['Data'] = $fetchobj;
        $Resolution['Code'] = '1';
        $Resolution['Msg'] = 'Success';
    }else {
        $Resolution['Data'] = '0';
        $Resolution['Code'] = '0';
        $Resolution['Msg'] = 'Failure';
    }
    return $Resolution;
}


public function select($tbl,$data=''){
    $sqlquery = "SELECT * FROM $tbl";
    if($data!='') {
        $sqlquery.= " WHERE";
        foreach ($data as $key => $value) {
            $sqlquery.= " $key = '$value' AND";
        }
        $sqlquery = rtrim($sqlquery,"AND");
    }
//    echo $sqlquery;
// exit;
    $exe=$this->Connect->query($sqlquery);
    if($exe->num_rows>0) {
       
        while($fetchobj = $exe->fetch_object()) {
            $resolutiondata[] = $fetchobj;
        }
        $Resolution['Data'] = $resolutiondata;
        $Resolution['Code'] = '1';
        $Resolution['Msg'] = 'Success';
    }else {
        $Resolution['Data'] = '0';
        $Resolution['Code'] = '0';
        $Resolution['Msg'] = 'Failure';
    }
    return $Resolution;
}

}
?>