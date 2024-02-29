<?php


include('config_Database/database_connection.php');
$title=$email=$authors='';
$errors=array('email'=>'','title'=>'','authors'=>'');
if(isset($_POST['submit'])){
//     echo  htmlspecialchars($_POST['email']);          // here we use htlmspecialscharacter for the security purpose.
//     echo htmlspecialchars($_POST['title']);
//     echo htmlspecialchars($_POST['authors']);
// 


// Validation for email
if(empty($_POST['email'])){
    $errors['email']=' Email is required <br/>';
}
else{
   $email=$_POST['email'];
   if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email']=' The Email should be validate<br/>';
   }
}
//    check validation of title
if(empty($_POST['title'])){
   $errors['title']=' title is required <br/>';
}
else{
  $title=$_POST['title'];
  if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
    $errors['title']=' Title must be latters and spaces only';
  }
}

// validatiom for authors
if(empty($_POST['authors'])){
$errors['authors']=' authors is required<br/>';
}
else{
    if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
        $errors['authors']='authors must be separated by comma';
      }
}
if(array_filter($errors)){
// when error happen.
}
else{   // this will help us to send data from homescreen to database.
 $email=mysqli_real_escape_string($conn,$_POST['email']);
 $title=mysqli_real_escape_string($conn,$_POST['title']);
 $authors=mysqli_real_escape_string($conn,$_POST["authors"]);

 // create sql
 $insert="INSERT INTO book( title,email,authorss) VALUES ('$title','$email','$authorss')";

if(mysqli_query($conn,$insert)){
// Success

header('Location:index.php');
}else{

  //error
  echo'query-erro:'.mysqli_error($conn);
}

}
}
?>

<!DOCTYPE html>
<?php include('template/header.php');?>
<section class="container grey-text">
    <h4 class="center"> Add book</h4>
    <form action="Add.php" method="POST" class="white">
        <label> Your Email</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text"><?php echo $errors ['email'];?></div>
        .
        <label> book title</label>
        <input type="text" name="title"value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text"><?php echo $errors ['title'];?></div>
        <label>authorss (comma separated):</label>
        <input type="text" name="authorss"value="<?php echo htmlspecialchars($authors) ?>">
        <div class="red-text"><?php echo $errors ['authors'];?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit"class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php include('template/footer.php');?>
</html>