<div class="card shadow mb-4" style="min-height: 450px;">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
      <?php 
      if(!empty($errorBanner))
      {
        echo '<font style="color:white;">'.$errorBanner."</font>";
      } 
      ?>
    </h6>
  </div>
  <div class="card-body">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group row">
      <label for="myFile" class="col-sm-2 col-form-label">Banner<sup>*</sup></label>
      <div class="col-sm-10">
      <div class="dropzone">
        <img src="img/photoAdd.png" style="width:80%;" />
        <input type="file" name="fileName[]" multiple="multiple" size="3" class="upload-input" id="myFile" oninput="myFunction();" />
      </div>
        <span id="error"><?php echo $photos; ?></span>
      </div>
    </div>
    <div class="form-group row">
      <label for="title" class="col-sm-2 col-form-label">Başlıq daxil et <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="title" class="form-control" id="title" placeholder="Bugün Öyrən , Sabah lider ol" maxlength="35">
      </div>
    </div>
    <div class="form-group row">
      <label for="Subtitle" class="col-sm-2 col-form-label">Balşıq-2 yazın <sup>*</sup></label>
      <div class="col-sm-10">
        <input type="text" name="Subtitle" class="form-control" id="Subtitle" placeholder="Müxtəlif Sahələr Üzrə Peşəkar Mentorlarımız Sizi Universitetinizdən Arzusunda Olduğunuz Şirkətlərdə İşləməyinizə Kömək Olacaq" maxlength="110">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-12">
        <button type="submit" name="bannerPlus" class="btn btn-success" style="position: relative;float: right;">Banner&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
      </div>
    </div>
  </form>          
  </div>
</div>