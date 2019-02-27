<html>
   
   <head>
      <title>Delete a Record from MySQL Database</title>
   </head>
   
   <body>
      <?php
         if(isset($_POST['delete'])) {
            $con=mysqli_connect("localhost","root","","new_db");
            
            if(! $con ) {
               die('Could not connect: ' . mysql_error());
            }
        
            $email = $_POST['email'];
            
            $sql = "DELETE FROM db_test WHERE email = $email" ;
           
            $retval = mysql_query( $sql, $con );
            
            if(! $retval ) {
               die('Could not delete data: ' . mysql_error());
            }
            
            echo "Deleted data successfully\n";
            // record will be deleted 
            
            mysql_close($con);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border = "0" cellspacing = "1" 
                     cellpadding = "2">
                     <tr>
                        <td width = "100">Email ID</td>
                        <td><input name = "email" type = "text" 
                           id = "email"></td>
                     </tr>   
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "delete" type = "submit" 
                              id = "delete" value = "Delete">
                        </td>
                     </tr>            
                  </table>
               </form>
            <?php
         }
      ?>  
   </body>
</html>