<?php

$con=new mysqli('localhost','root', '', 'movie');

if($con){
    echo "";
}else{
    die(mysqli_error($con));
}
?>