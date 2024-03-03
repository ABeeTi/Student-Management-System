<?php include 'connection_to_login&signupdb.php';
$id=$_GET['id'];
$querry="DELETE FROM students WHERE id='$id'";
$data=mysqli_query($con,$query);
if ($data){
    ?>
    <script type ="text/javascript">
        alert("Data Deleted Successfully");
        window.open("dashboard.php");
        </script>
        <?php
}
else{
    ?>
    <script type ="text/javascript">
        alert("PLz try again ");
        </script>
    <?php

}
?>




