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
        
  <?php require './shiftplanning/function.php';?>
              
 <table class="table">
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
  
                 <?php foreach ($table as $data) { ?>
               
                 <tr>
                    <td> <?php echo $data[0] ?> </td>
                    <td> <?php echo $data[1] ?> </td>
                    <td> <?php echo $data[2] ?> </td>
                    <td> <?php echo $data[3] ?> </td>
                    <td> <?php echo $data[4] ?> </td>
                    <td> <?php echo $data[5] ?> </td>
                    <td>"$" <?php echo $data[6] ?> </td>
                    <td> <?php echo $data[7] ?> </td>               
                 </tr>
                 <?php } ?>
        
       </table>
        
</body>
</html>
