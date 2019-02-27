<?php 

$con=mysqli_connect("localhost","root","","new_db");
$check="SELECT * FROM db_test WHERE email = '$_POST[email]'";
$rs = mysqli_query($con,$check);
// $data = mysqli_fetch_array($rs, MYSQLI_NUM);
// if($data[0] > 1) {
if (mysql_num_rows($result)!=0) {
    # code...
    // $_SESSION['msg'] = "User Already in Exists<br/>";
    echo "User Already in Exists<br/>";
}else{
    $newUser="INSERT INTO db_test (name,email) values ('$_POST[name]','$_POST[email]')";
// For testing enter only name and email

    if (mysqli_query($con,$newUser))
    {
        // $_SESSION['msg'] = "Now You're in Database<br/>";
        echo "Now You're in Database<br/>";
    }
    else
    {
         // $_SESSION['msg'] = "Error adding user in database<br/>";
         echo "Error adding user in database<br/>";
    }
}
?>


