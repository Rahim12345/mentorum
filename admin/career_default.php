<?php
if (isset($_SESSION["id"]) && isset($_GET['page'])) {
    $page = htmlspecialchars(trim($_GET['page']));
    if ($page == 'career') {
?>
        <div class="card shadow mb-4" style="min-height: 450px;width:80%;margin:auto;">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
                    <?php
                    if (!empty($error_career)) {
                        echo '<font style="color:white;">' . $error_career . "</font>";
                    }
                    ?>
                </h6>
            </div>
            <div class="card-body">
                <form id="formCareer" data-parsley-validate class="form-horizontal form-label-left" action="" method="POST">

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="career_input">Xaricdə Mən üçün youtube video linki daxil edin </label>
                        <div class="col-md-12 col-sm-12 ">
                            <input type="text" id="career_input" name="career_input" placeholder="https://www.youtube.com/watch?v=kwh9M4uqtrc" class="form-control" value="<?php if (!empty($career_input)) {
                                                                                                                        echo $career_input;
                                                                                                                    } ?>">
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-sm-12">
                            <button type="submit" name="career" class="btn btn-dark" style="position: relative;float: right;">Xaricdə Mən&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </form>
                <div class="item form-group">
                    <label class="col-form-label col-md-12 col-sm-12 label-align" for=""><span style="color: green;font-weight: bold">Mövcud Xaricdə Mən:</span>
                        <?php
                        $query = $conn->prepare("SELECT * FROM career ORDER BY id DESC");
                        $query->execute();
                        $rows = $query->fetchall(PDO::FETCH_ASSOC);
                        if (count($rows) != 0) {
                            ?>
                            <div class="row">
                            <?php
                            foreach ($rows as $row) {
                        ?>
                                <div class="col-sm-4" style="margin-top: 5px;margin-bottom:5px;">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="<?php echo $row['link'] ?>" allowfullscreen></iframe>
                                    </div>
                                    <a href="./index.php?page=removeCareer&id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="color:red" aria-hidden="true"></i></a>
                                </div>
                                <?php
                            }
                            ?>
                            </div>
                            <?php
                        } else {
                            echo "Hələ də 'Xaricdə Mən alt menusunda' element daxil etməmisiniz";
                        }
                        ?>
                    </label>
                </div>
            </div>
        </div>
<?php
    } else {
        header("location:../");
    }
} else {
    header("location:../");
}
?>