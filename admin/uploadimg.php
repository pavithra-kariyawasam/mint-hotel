<?php session_start();
    include 'check.php'; $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'gallery/'; // upload directory
 
if( $_FILES['image'])
{
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
 
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
 
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
 
// check's valid format
if(in_array($ext, $valid_extensions)) 
{
$path = $path.strtolower($final_image); 
 
if(move_uploaded_file($tmp,$path)) 
{

//include database configuration file
include_once  'dbCon.php';
 
//insert form data in the database
$insert = $conn->query("INSERT images (image_path) VALUES ('".$path."')");?>
	
<?php 
}
}
else 
{?>
	<script>alert("Image upload failed !!!!!");</script><?php header("Locationindex2.php");
}
}?>
 <script language="javascript" type="text/javascript">
        
        alert('Image Upload sucsessfull....');
    
                      window.location='index2.php';

</script>