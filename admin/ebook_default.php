<div class="card shadow mb-4" style="min-height: 450px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
            <?php
            if (!empty($errorEbook)) {
                echo '<font style="color:white;">' . $errorEbook . "</font>";
            }
            ?>
        </h6>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="myFile" class="col-sm-2 col-form-label">Kitabın şəkili</label>
                <div class="col-sm-10">
                    <div class="dropzone">
                        <img src="img/photoAdd.png" style="width:80%;" />
                        <input type="file" name="fileName[]" multiple="multiple" size="1" class="upload-input" id="myFile" oninput="myFunction();" />
                    </div>
                    <span id="error"><?php echo $photos; ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="myFileBook" class="col-sm-2 col-form-label">Kitab (doc,docx,pdf)</label>
                <div class="col-sm-10">
                    <div class="dropzone">
                        <i class="fa fa-book" style="font-size:75px;color:black;" aria-hidden="true"></i>
                        <input type="file" name="fileNameBook[]" multiple="multiple" size="1" class="upload-input" id="myFileBook" oninput="myFunctionBook();" />
                    </div>
                    <span id="errorBook" style="float: left;position: relative;color: white;background-color: orange;line-height: 30px;min-width: 100%;margin-top: 10px;padding-left: 20px;border-radius: 5px;"><?php echo $books; ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Başlıq daxil et</label>
                <div class="col-sm-10">
                    <input type="text" style="color:black;" name="title" class="form-control" id="title" placeholder="The Da Vinci Code" value="<?php if(isset($title) && $title!=''){ echo $title; } ?>" maxlength="95">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" name="book" class="btn btn-success" style="position: relative;float: right;">Kitab&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>