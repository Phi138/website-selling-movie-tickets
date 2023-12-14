<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<?php
   require('connect.php');
   if(isset($_FILES['Hinh'])!=NULL){
      $errors= array();
      $file_name = $_FILES['Hinh']['name'];
      $file_size =$_FILES['Hinh']['size'];
      $file_tmp =$_FILES['Hinh']['tmp_name'];
      $file_type=$_FILES['Hinh']['type'];
      $file_ext=@strtolower(end(explode('.',$_FILES['Hinh']['name'])));
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="Don't accept image files with this extension, please choose JPEG or PNG.";
      }
      if($file_size > 2097152){
         $errors[]='File size should be 2MB';
		}
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"C:\\xampp\\img\\".$file_name);
         echo "Upload File successfully!!!";
      }
      else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="Hinh" />
         <input type="submit"/>
			
         <ul>
            <li>File name: <?php echo $_FILES['Hinh']['name'];  ?>
            <li>File size   : <?php echo $_FILES['Hinh']['size'];  ?>
            <li>File type    : <?php echo $_FILES['Hinh']['type'] ?>
         </ul>
			
      </form>
      
   </body>
</html>