<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    </head>
    <body>
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
        
        //echo 'RESPONSE IS:' .  var_dump($response);
       
        

        if($response['status']['code'] == 1){
            $shifts = $response['data'];
            
        } else{
            $eror_report = $response['status']['text'];
            echo 'testiramo da li je ovuda proslo';
            echo 'API error: '.$eror_report;
            //return false;
        }
        
  $table = '<table class="table">
  <tr>
    <th>Title</th>
    <th>Start Date</th> 
    <th>Start Time</th> 
    <th>End Date</th>
    <th>End Time</th>
    <th>Work hours</th>
    <th>Dollars</th>
    <th>Employees</th></tr>';
        
        foreach ($shifts as $shift)
        {
            
            $emp_names_array = array();
            //Get and format employees names
            foreach($shift['employees'] as $employee){
                array_push($emp_names_array, $employee['name']);
            }
            
            $emp_names = implode(',', $emp_names_array);
            
           $table .= "<tr>
                    <td>" .($shift['title'] != '' ? $shift['title'] : 'n/a'). "</td>
                    <td>" .$shift['start_date']['formatted']. "</td>
                    <td>" .$shift['start_time']['time']. "</td>
                    <td>" .$shift['end_date']['formatted']. "</td>
                    <td>" .$shift['end_time']['time']. "</td>
                    <td>" .$shift['cost']['hours']. "</td>
                    <td>$" .$shift['cost']['dollars']. "</td>
                    <td>".$emp_names."</td>";                  
            $table .= "</tr>";
        }
        
        echo $table;
        ?>
    </body>
</html>
