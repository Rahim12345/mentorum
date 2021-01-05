<div class="card shadow mb-4" style="min-height: 450px;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
            <?php
            if (!empty($errorBlog)) {
                echo '<font style="color:white;">' . $errorBlog . "</font>";
            }
            ?>
        </h6>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data" id="blogFrom">
            <div class="form-group row">
                <label for="nameEditor" class="col-sm-2 col-form-label">Paylaşan adam<sup>*</sup></label>
                <div class="col-sm-10">
                    <select name="who" id="nameEditor" class="names form-control">
<?php
$query = $conn->prepare('SELECT * FROM users WHERE status!=?');
$query->execute([3]);
$rows = $query->fetchall(PDO::FETCH_ASSOC);
if(count($rows)!=0)
{
    foreach($rows as $row)
    {
        if($who == "" && $row["status"] == 1)
        {
            ?>
                        <option value="<?= $row["id"] ?>" selected><?= $row["name"] ?></option>
            <?php
        }
        elseif($who == $row["id"])
        {
            ?>
                        <option value="<?= $row["id"] ?>" selected><?= $row["name"] ?></option>
            <?php
        }
        else
        {
            ?>
                        <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
            <?php
        }
        ?>
                        
        <?php
    }
}
?>
                    </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="blogPhoto" class="col-sm-2 col-form-label">Şəkil<sup>*</sup></label>
                <div class="col-sm-10">
                    <div class="dropzone">
                        <img src="img/photoAdd.png" style="width:80%;" />
                        <input type="file" name="fileName" class="upload-input" id="blogPhoto" accept="image/*" oninput="myBlog();"/>
                    </div>
                    <span id="error"><?php echo $photos; ?></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Blog başlığı <sup>*</sup></label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" maxlength="99" value="<?= $title ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="content" class="col-sm-2 col-form-label">Blogun mətni <sup>*</sup></label>
                <div class="col-sm-10">
                    <textarea name="content" class="form-control" id="content" cols="30" rows="10" required><?= $content ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" name="blogPlus" class="btn btn-primary" style="position: relative;float: right;">Blog&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
