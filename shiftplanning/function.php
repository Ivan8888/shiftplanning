<?php
 require './shiftplanning/src/shiftplanning.php';
        

        $config = array('key'=>'b4c6352157357a2c10e590b55b1700e1c88db5f9');
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
            //all data about shifts
            
        } else{
            $eror_report = $response['status']['text'];
            echo 'API error: '.$eror_report;
        }
       
        foreach ($shifts as $shift)
        { 
            $emp_names_array = array();
            //Get and format employees names
            foreach($shift['employees'] as $employee){
                array_push($emp_names_array, $employee['name']);
            }
            
            $emp_names = implode(',', $emp_names_array);
            
           // multidimensional array with data for showing to the HTML table
           $table[] =  array(
                    ($shift['title'] != '' ? $shift['title'] : 'n/a'),
                    $shift['start_date']['formatted'],
                    $shift['start_time']['time'],
                    $shift['end_date']['formatted'],
                    $shift['end_time']['time'],
                    $shift['cost']['hours'],
                    $shift['cost']['dollars'],
                    $emp_names);
           
        }
           
        ?>


