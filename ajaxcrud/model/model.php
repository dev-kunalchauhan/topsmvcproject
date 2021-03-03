<?php

class model{
    public $connection = '';
    function __construct()
    {
        $this->connection  = new mysqli('localhost',"root","","ajaxdb");
        // echo "<pre>";
        // print_r($this->connection);
    }

    function select($tbl,$where=""){
        $SQL = "SELECT * FROM $tbl";
        $ExSQL = $this->connection->query($SQL);

        // echo "<pre>";
        // print_r($ExSQL);
        if ($ExSQL->num_rows>0) {
            while ($data = $ExSQL->fetch_object()) {
                $FetchData[] = $data;
            }
            $ResData['Data'] = $FetchData;
            $ResData['Code'] = 1;
            $ResData['Msg'] = 'success';
        } else {
            $ResData['Data'] = 0;
            $ResData['Code'] = 0;
            $ResData['Msg'] = 'no-data';
        }
        return $ResData;
    }

    function insert($tbl,$data){
        $clms = implode(",",array_keys($data));
        $vals = implode("','",$data);

        $SQL = "INSERT INTO $tbl ($clms) VALUES ('$vals')";
        $ExSQL = $this->connection->query($SQL);
        
        if ($ExSQL>0) {
            $ResData['Data'] = 1;
            $ResData['Code'] = 1;
            $ResData['Msg'] = 'success';
        } else {
            $ResData['Data'] = 0;
            $ResData['Code'] = 0;
            $ResData['Msg'] = 'no-data';
        }
        return $ResData;
    }
}
?>