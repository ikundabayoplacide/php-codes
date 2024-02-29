<?php
include('config_Database/database_connection.php');

$select='SELECT * FROM book';
// make query for getting result

$result= mysqli_query($conn,$select);

// featch resulting as array

$output= mysqli_fetch_all($result,MYSQLI_ASSOC);

// free result from memory

mysqli_free_result($result);
mysqli_close($conn);


?>
<!DOCTYPE html>
<?php include('template/header.php');?>
<h4 class="center grey-text"> Books</h4>
<div class="container">

<div class="row">
<?php foreach($output as $know):?>
<div class="col s6 md3">
<div class="cerd z-depth-0">
<div class="card-content center" id="containerr">
<img src="image/reading.jpg" class='imageread'/>
<h6><?php echo htmlspecialchars($know ['title']);?></h6>
<!-- <div><?php echo htmlspecialchars($know['authors']);?></div> -->
<ul>
    <?php foreach(explode(',',$know['authors']) as $ing):?>  
        <!-- here authors will be displayed each and everyone -->
    <li>
        <?php echo htmlspecialchars( $ing)?>
    </li>
        <?php endforeach; ?>
</ul>
<div class="card-action right-align">
    <a href="details.php?id=<?php echo $know['id'];?>" class="brand-text"> More info</a>
</div>
</div>

</div>
</div>
<?php endforeach; ?>
</div>

<!-- <?php if(count($output)<3):?>
 <p> there are more know</p> 
<?php else: ?>
    <p>thereare less book</p>
<?php endif ?>
</div>
<?php include('template/footer.php');?> -->
</html>