<?php 

    $con = mysqli_connect("localhost","root","","dashboard"); 
    if(mysqli_connect_errno($con)){
	    die("Fail to connect to database :".mysqli_connect_error() ); 
    }
