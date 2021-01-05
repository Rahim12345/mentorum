<?php
include '../include/config.php';
?>

<!doctype html>
<html lang="az">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="<?php
                                        $query = $conn->prepare('SELECT * FROM descriptions ORDER BY id DESC');
                                        $query->execute();
                                        $rows = $query->fetchall(PDO::FETCH_ASSOC);
                                        if (count($rows) != 0) {
                                            echo $rows[0]['description'];
                                        }
                                        ?>">
    <meta name="keywords" content="<?php
                                    $query = $conn->prepare('SELECT * FROM keywords ORDER BY id DESC');
                                    $query->execute();
                                    $rows = $query->fetchall(PDO::FETCH_ASSOC);
                                    if (count($rows) != 0) {
                                        echo $rows[0]['keywords'];
                                    }
                                    ?>">
    <meta property="og:locale" content="en_AZ">
    <meta property="og:type" content="website">
    <meta property="og:title" content="mentorum.az">
    <meta property="og:description" content="Təcrübən danışsın!">
    <meta property="og:url" content="https://mentorum.az">
    <meta property="og:site_name" content="mentorum.az">
    <title><?php
            $query = $conn->prepare("SELECT * FROM title ORDER BY id DESC");
            $query->execute();
            $rows = $query->fetchall(PDO::FETCH_ASSOC);
            if (count($rows) != 0) {
                echo $rows[0]['title'];
            }
            ?></title>
    <!-- Favicons -->
    <?php
    $query = $conn->prepare("SELECT * FROM shortcut_icon ORDER BY id DESC");
    $query->execute();
    $rows = $query->fetchall(PDO::FETCH_ASSOC);
    if (count($rows) != 0) {
    ?>
        <link rel="shortcut icon" href="../assets/logo/<?php echo $rows[0]['url'] ?>">
    <?php
    }
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

    <link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="image-container set-full-height" style="background-image: url('assets/img/Flame.png')">
        <a href="http://creative-tim.com">
            <div class="logo-container">
                <div class="brand" style="width: 100px;">
                    <a href="../" class="btn btn-info" style="color:white;">Əsas səhifə <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                </div>
            </div>
        </a>

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                    <div class="wizard-container" style="opacity: 0.9;color:black;">

                        <div class="card wizard-card" data-color="orange" id="wizardProfile">
                            <form action="" method="POST" id="registrForm" enctype="multipart/form-data">
                                <div class="wizard-header">
                                    <h3>
                                        <b>Hesab yarat</b><br>
                                        <small style="color: black;">Daxil etdiyiniz məlumatlar bizə mentor və menteelər arasında əlaqə yaratmaq üçün lazımdır.</small>
                                    </h3>
                                </div>

                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#about" data-toggle="tab">HAQQINDA</a></li>
                                        <li><a href="#total" data-toggle="tab">ÜMUMİ</a></li>
                                    </ul>

                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane" id="about">
                                        <div class="row">
                                            <h4 class="info-text"> Bu bölmədəki bütün xanaları doldurun</h4>
                                            <div class="col-sm-4 col-sm-offset-1">
                                                <div class="picture-container">
                                                    <div class="picture">
                                                        <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                        <input type="file" id="wizardPicture" name="wizardPicture">
                                                    </div>
                                                    <h6>ŞƏKİL SEÇİN</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Ad Soyad <small>*</small></label>
                                                    <input name="name" id="name" type="text" class="form-control" minlength="3"  maxlength="30" placeholder="Rahim Süleymanov" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email <small>*</small></label>
                                                    <input name="email" id="email" type="email" class="form-control" placeholder="nümunə@gmail.com" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label for="password"> Şifrə<small>*</small></label>
                                                    <input name="password" id="password" minlength="8" maxlength="50" type="password" class="form-control" placeholder="**********" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label for="status">Status<small>*</small></label><br>
                                                    <select name="status" id="status" class="form-control" required>
                                                        <option value=""> Birini seçin </option>
                                                        <option value="2"> Mentor </option>
                                                        <option value="3"> Mentee </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="total">
                                        <div class="row">
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label for="profision">İxtisas</label>
                                                    <input type="text" name="profision" id="profision" maxlength="50" class="form-control" placeholder="Mühəndis">
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label for="phone">Telefon</label><br>
                                                    <input type="text" class="form-control" id="phone" maxlength="10" placeholder="0555555555" name="phone">
                                                </div>
                                            </div>
                                            <div class="col-sm-10 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label for="address">Ünvan</label><br>
                                                    <input type="text" class="form-control" id="address" placeholder="AZƏRBAYCAN,Bakı" maxlength="50" name="address">
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label for="practice">İş təcrübəsi</label>
                                                    <textarea name="practice" id="practice" style="resize: none;" class="form-control" maxlength="200" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label for="aboutt">Haqqında</label>
                                                    <textarea name="aboutt" id="aboutt" style="resize: none;" class="form-control" cols="30" maxlength="200" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-footer height-wizard">
                                    <div class="pull-right">
                                        <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='İRƏLİ' />
                                        <input type='button' id="registrBtn" class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='registrBtn' value='Qeydİyyatdan keç' />

                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='ƏVVƏLKİ' />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
        </div> <!--  big container -->

    </div>

</body>

<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<script src="assets/js/gsdk-bootstrap-wizard.js"></script>

<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/messages_az.min.js"></script>
<script src="assets/js/registr.js"></script>

</html>