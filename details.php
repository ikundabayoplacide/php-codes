<?php
include('config_Database/database_connection.php');

if(isset($_POST['delete']))
{
$id_to_delete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);
$sql="DELETE FROM book WHERE id= $id_to_delete";

if(mysqli_query($conn,$sql)){
    //success
    header('Location: index.php');
}
else{
    echo 'query error:'.mysqli_error($conn);
}

}




// cheching get request
if(isset($_GET['id'])){
$id=mysqli_escape_string($conn,$_GET['id']);

// query for selecting data

$result=" SELECT * FROM book WHERE id=$id";
// geting query result

$sql= mysqli_query($conn,$result);

// fetching data

$data=mysqli_fetch_assoc($sql);

mysqli_free_result($sql);

mysqli_close($conn);


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>DETAILS ON BOOK</title>
</head>
<body>
<?php include('template/header.php');?>
   <div class="container center">
   <img src="image/reading.jpg" class='imageread'/>
    <?php if($data):?>
<h3><?php echo htmlspecialchars($data['title']);?></h3>
<p> This is created by :<?php echo htmlspecialchars($data['email']);?></p>
<p> The date of creation is : <?php echo htmlspecialchars($data['created_at']);?></p>
 <h4> <u>The authors are </u>:</h4>
 <h4><?php echo htmlspecialchars($data['authors'] )?><br/></h4>
  <!-- to delete details -->
  <form action="details.php" method="POST">
<input type="hidden" name=" id_to_delete" value="<?php echo $data['id']?>"/>
<input type ="submit" name="delete" value="delete" class="btn brand z-depth-0"/>
  </form>
  <?php else:?>
       
        <h4> no such Book  exists</h4>
        <?php endif?>
   </div>
</body>
<?php include('template/footer.php');?>
</html>