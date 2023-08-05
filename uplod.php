<?php 

if (isset($_POST['Create']) && isset($_FILES['event_image'])) {
     include "conn.php";

     echo "<pre>";
     print_r($_FILES['event_image']);
     echo "</pre>";

     $img_name = $_FILES['event_image']['name'];
     $img_size = $_FILES['event_image']['size'];
     $tmp_name = $_FILES['event_image']['tmp_name'];
     $error = $_FILES['event_image']['error'];

     if ($error === 0) {
          if ($img_size > 99999000) {
               $em = "Sorry, your file is too large.";
              header("Location: makeevent.php?error=$em");
          }else {
               $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
               $img_ex_lc = strtolower($img_ex);

               $allowed_exs = array("jpg", "jpeg", "png"); 

               if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Insert into Database
                    $sql = "INSERT INTO events(event_image) 
                            VALUES('$new_img_name')";
                    mysqli_query($connect, $sql);
                    header("Location: home.php");
               }else {
                    $em = "You can't upload files of this type";
                  header("Location: makeevent.php?error=$em");
               }
          }
     }else {
          $em = "unknown error occurred!";
          header("Location: index.php?error=$em");
     }

}else {
     header("Location: index.php");
}