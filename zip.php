<?php


//if(isset($_POST['submit']))
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $file=$_FILES['zip'];

   $file_name= $file['name'];
   $file_type= $file['type'];
   $file_tmp= $file['tmp_name'];
   $file_size= $file['size'];
   $file_error= $file['error'];


   $extensions=array('zip','rar');
   $file4=explode('.',$file_name);
   $file_extension=strtolower(end($file4));

   $errors = array();
   if($file_error == 4)
   {
       echo "<div style='color:red'> Not Upload file  </div>";
   }
   else{
    if(in_array($file_extension,$extensions)===false)
    {
      $errors[] = "<div style='color:red'>file extensions is Not Vaild</div>";
    }
 
    if(empty($errors))
    {
     move_uploaded_file($file_tmp ,"public/".$file_name);
     echo "file uploaded";
     echo "<h2 style='color: #1a0db1' id='zip'>".$file_name."</h2><p style='color: #87674d'> Click <a href='decompress.php' style='text-decoration:none ; font-weight:bold' > here </a> to decompress the file"." </p> <br>";
     unlink("public/public.zip");
    }
  else{
    foreach($errors as $error)
    {
      echo $error;
    }
  }
   
   }
  

}
?>


<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="zip"> <br><br>
<input type="submit" name="submit" value="Upload">
</form>