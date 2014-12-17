<?php
require '/src/shiftplanning.php';

        $config = 'b4c6352157357a2c10e590b55b1700e1c88db5f9';
        $login_credentials = array(
            'username'=>'ivan.milutinovic3@gmail.com',
            'password'=>'ivanovasifra'
        );

        $sp = new shiftplanning($config);
        
        $session = $sp->getSession();
        
        if(!$session){
            $sp->doLogin($login_credentials);
        }
        
        $sp->setRequest(array(
            'module'=>'schedule.shifts',
            'method'=>'GET',
            'start_date'=>'Nov 25, 2014',
            'end_date'=>'Nov 28, 2014',
            'mode'=>'overview'
            )
        );
        
        $response = $sp->getResponse();
        
        
        if($response['status']['code'] == 1){
            $shifts = $response['data'];
            
        } else{
            $eror_report = $response['status']['text'];
            echo 'API error: '.$eror_report;
        }
       



