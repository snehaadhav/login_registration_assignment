<?php
    session_start();
include('database.php');
 include('layouts/app.php'); 

$username = $_SESSION['username'];
?>
<a href="Logout.php" >
Sign out</a>
<h1>Hello,<?php echo $username; ?></h1>
<form action="" method="post" name="signin-form" enctype="multipart/form-data">
  <div class="form-element">
  <h1>Select image to upload:
</h1>

  <input type="file" name="uploadfile" id="uploadfile">
  <button type="submit" value="Upload Image" name="submit">Upload</button>
</div>
</form>
<?php
if(!isset($_FILES))
{


   echo "<b>File to be uploaded: </b>" . $_FILES["uploadfile"]["name"] . "<br>";
   echo "<b>Type: </b>" . $_FILES["uploadfile"]["type"] . "<br>";
   echo "<b>File Size: </b>" . $_FILES["uploadfile"]["size"]/1024 . "<br>";
   echo "<b>Store in: </b>" . $_FILES["uploadfile"]["tmp_name"] . "<br>";

   if (file_exists($_FILES["uploadfile"]["name"])){
      echo "<h3>The file already exists</h3>";
   } else {
      move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $_FILES["uploadfile"]["name"]);
      echo "<h3>File Successfully Uploaded</h3>";
   }
}
?>
