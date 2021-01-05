<?php
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='cvSend' && isset($_SESSION["id"]))
{
    ?>
<div class="container" style="margin-top: 100px;width:80%">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            
        </div>
        <div class="card-body">
        <?php  
        if(!empty($cv_error))
        {
            ?>
            <div class="btn-warning" style="color:white;padding:5px;margin-bottom:5px;border-radius:5px;"><?php echo $cv_error; ?></div>
            <?php
        }
        ?>
            <form action="" method="POST" id="cvSendForm" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="name" class="col-sm-5 col-form-label">Ad&Soyad <sup>*</sup></label>
                    <div class="col-sm-7">
                        <input type="text" name="name" class="form-control own-input" style="margin:0;" id="name" placeholder="Rahim Süleymanov" value="<?php if(!empty($name)){ echo $name; } ?>" maxlength="30" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-5 col-form-label">Email<sup>*</sup></label>
                    <div class="col-sm-7">
                        <input type="email" name="email" class="form-control own-input" style="margin:0;" id="emaill" placeholder="nümunə@gmail.com" value="<?php if(!empty($email)){ echo $email; } ?>" maxlength="100" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="myFile" class="col-sm-5 col-form-label">CV(doc,docx,pdf)<sup>*</sup></label>
                    <div class="col-sm-7">
                        <div class="dropzone">
                            <!-- <img src="./assets/icons/photoAdd.png" style="width:70%;" /> -->
                            <i class="fa fa-file" aria-hidden="true" style="font-size:10vh;padding-top:7px;color:darkgreen"></i>
                            <input type="file" name="fileName" class="upload-input" id="myCv" oninput="cvFile();"  accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                        </div>
                        <span id="error"></span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" name="cv_send" class="btn btn-success" style="position: relative;float: right;">CV göndər</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    
    <?php
}
else
{
	header("location:http://localhost/mentorum/");
}
?>