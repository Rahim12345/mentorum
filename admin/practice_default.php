<div class="card shadow mb-4" style="min-height: 450px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
            <?php
            if (!empty($errorPractice)) {
                echo '<font style="color:white;">' . $errorPractice . "</font>";
            }
            ?>
        </h6>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data" id="practiceFrom">
            <div class="form-group row">
                <label for="practicePhoto" class="col-sm-2 col-form-label">Şəkil<sup>*</sup></label>
                <div class="col-sm-10">
                    <div class="dropzone">
                        <img src="img/photoAdd.png" style="width:80%;" />
                        <input type="file" name="fileName" class="upload-input" id="practicePhoto" accept="image/*" oninput="myPractice();"/>
                    </div>
                    <span id="error"><?php echo $photos; ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Proqramın başlığı <sup>*</sup></label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" maxlength="99" value="<?= $title ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">Proqramın mətni <sup>*</sup></label>
                <div class="col-sm-10">
                    <textarea name="content" class="form-control ckeditor" id="content" cols="30" rows="10" required><?= $content ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" name="practicePlus" class="btn btn-primary" style="position: relative;float: right;">Təcrübə proqramı&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
