<?php
 include_once("../include/database.php")
  ?>
  <?php
  session_start();
  $center_id= $_SESSION['id'];
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 	 if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0)
 	 {
 	 	$name = $_POST['name'];
 	 	$birth = $_POST['birth'];
 	 	$gender = $_POST['gender'];
 	 	$religion = $_POST['religion'];
        $image = uniqid().$_FILES["image"]["name"];
        $t_dir = "../image/";
        $t_file = $t_dir. basename($_FILES["image"]["name"]);
        $FileType = strtolower(pathinfo($t_file,PATHINFO_EXTENSION));
        $ext = array("jpg","jpeg","png");
         if(in_array($FileType, $ext))
             {
        		$sql = "INSERT INTO child (name, birth, religion, gender, image, center_id) VALUES ('$name', '$birth', '$religion', '$gender', '$image', '$center_id');";
        		mysqli_query($connect, $sql);
        		move_uploaded_file($_FILES['image']['tmp_name'], $t_dir.$image);
        		$alert= "Done succesfully";
                 echo "<script type='text/javascript'>
              alert('$alert');
              window.location = '../add.php';
              </script>";
             }
          else
        	  {
               $alert= "There is some error please try again";
                 echo "<script type='text/javascript'>
              alert('$alert');
              window.location = '../add.php';
              </script>";
               }
     }
  }
 ?>