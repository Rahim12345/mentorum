<div class="card shadow mb-4" style="min-height: 450px;">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorThink))
      {
        echo '<font style="color:white;">'.$errorThink."</font>";
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group row">
      <label for="myFile" class="col-sm-2 col-form-label">Profil şəkili</label>
      <div class="col-sm-10">
      <div class="dropzone">
        <img src="img/photoAdd.png" style="width:80%;" />
        <input type="file" name="fileName[]" multiple="multiple" size="1" class="upload-input" id="myFile" oninput="myFunction();" />
      </div>
        <span id="error"><?php echo $photos; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Təsüratçının adı </label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control" id="name" value="<?php if(!empty($name)){ echo $name; } ?>" placeholder="Rahim Süleymanov" maxlength="30">
      </div>
    </div>
    <div class="form-group row">
      <label for="area" class="col-sm-2 col-form-label">Təsüratçının peşəsi </label>
      <div class="col-sm-10">
        <input type="text" name="area" class="form-control" id="area" value="<?php if(!empty($area)){ echo $area; } ?>" placeholder="Web developer" maxlength="25">
      </div>
    </div>
    <div class="form-group row">
      <label for="thinkcontent" class="col-sm-2 col-form-label">Təsüratı yazın </label>
      <div class="col-sm-10">
        <input type="text" name="thinkcontent" class="form-control" id="thinkcontent" value="<?php if(!empty($thinkcontent)){ echo $thinkcontent; } ?>" placeholder="Müxtəlif Sahələr Üzrə Peşəkarları bir araya gətirməyiniz həqiqətən ..." maxlength="190">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12">
        <button type="submit" name="think" class="btn btn-success" style="position: relative;float: right;">Təsürat&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>          
  </div>
</div>