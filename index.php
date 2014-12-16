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
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        
        <?php require '/backend/shifts.php'; ?>
             
  <table>
  <tr>
    <th>Title</th>
    <th>Start Date</th> 
    <th>Start Time</th> 
    <th>End Date</th>
    <th>End Time</th>
    <th>Work hours</th>
    <th>Dollars</th>
    <th>Employees</th>
  </tr>
        
         <?php foreach ($shifts as $shift) { 
         $emp_names_array = array();
            //Get and format employees names
            foreach($shift['employees'] as $employee){
                array_push($emp_names_array, $employee['name']);
            }
            $emp_names = implode(',', $emp_names_array);    
             
         ?>
                <tr>
                    <td> <?php echo $shift['title'] != '' ? $shift['title'] : 'n/a' ?> </td>
                    <td> <?php echo $shift['start_date']['formatted'] ?> </td>
                    <td> <?php echo $shift['start_time']['time'] ?> </td>
                    <td> <?php echo $shift['end_date']['formatted'] ?> </td>
                    <td> <?php echo $shift['end_time']['time'] ?> </td>
                    <td> <?php echo $shift['cost']['hours'] ?> </td>
                    <td> <?php echo "$ " .$shift['cost']['dollars'] ?> </td>
                    <td> <?php echo $emp_names ?> </td>
                </tr>
         <?php } ?>
                
  </table>
                                        
</body>
</html>
