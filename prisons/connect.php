<?php

$con = mysqli_connect("localhost","root","","prisons");

if(!$con){
    die("Connection Failed".mysqli_connect_error());
}

// else {
//     echo "Connection Successfully Connected";
// }

?>