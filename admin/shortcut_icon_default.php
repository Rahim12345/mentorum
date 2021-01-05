<?php  
if(isset($_SESSION["id"]) && isset($_GET['page']))
{
  $page=htmlspecialchars(trim($_GET['page']));
  if($page=='shortcut_icon')
  {
    ?>
<div class="card shadow mb-4" style="min-height: 450px;width:80%;margin:auto;">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorShortcut_icon))
      {
        echo '<font style="color:white;">'.$errorShortcut_icon."</font>";
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Mövcud shortcut icon<sup>*</sup></label>
      <div class="col-sm-10">
        <div class="dropzone">
<?php  
$query=$conn->prepare("SELECT * FROM shortcut_icon ORDER BY id DESC");
$query->execute();
$rows=$query->fetchall(PDO::FETCH_ASSOC);
if(count($rows)!=0)
{
  ?>
  <img src="../assets/logo/<?php echo $rows[0]['url'] ?>" style="width:78%;" />
  <?php
}
?>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <label for="myFile" class="col-sm-2 col-form-label">Shortcut icon<sup>*</sup></label>
      <div class="col-sm-10">
      <div class="dropzone">
        <img src="img/photoAdd.png" style="width:78%;" />
        <input type="file" name="fileName[]" multiple="multiple" size="1" class="upload-input" id="myFile" oninput="myLogoFunction();" />
      </div>
        <span id="error"><?php echo $photos; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12">
        <button type="submit" name="shortcut_icon" class="btn btn-success" style="position: relative;float: right;">Shortcut icon&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>          
  </div>
</div>
    <?php
  }
  else
  {
    header("location:../");
  }
}
else
{
  header("location:../");
}
?>