<?php

    if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='profile' && !empty($_GET['page']) && is_numeric($_GET["id"]) && ceil($_GET["id"])-$_GET["id"]==0 && $_GET["id"]>0 && isset($_SESSION["id"]))

    {

        $page=htmlspecialchars(trim($_GET['page']));

        $id=htmlspecialchars(trim($_GET["id"]));



        $save=$conn->prepare("INSERT INTO guests(host_id,guest_id,created_at,updated_at) VALUES (?,?,?,?)");

        $save->execute([$id,$_SESSION["id"],date('d.m.Y H:i:s'),date('d.m.Y H:i:s')]);



        $query=$conn->prepare("SELECT * FROM users WHERE id=?");

        $query->execute([$id]);

        $rows=$query->fetchall(PDO::FETCH_ASSOC);

        $count=count($rows);

        if($count!=0)

        {

          ?>

<style>

    /* ==========================================================================

   Author's custom styles

   ========================================================================== */





    .fb-profile img.fb-image-lg {

        z-index: 0;

        width: 100%;

        margin-bottom: 10px;

    }



    .fb-image-profile {

        margin: -90px 10px 0px 50px;

        z-index: 9;

        width: 20%;

    }



    @media (max-width:768px) {



        .fb-profile-text>h2 {

            font-weight: 700;

            font-size: 16px;

        }



        .fb-image-profile {

            margin: -45px 10px 0px 25px;

            z-index: 9;

            width: 20%;

        }

    }

</style>

<div class="container" style="margin-top:76px">

    <?php

    $query = $conn->prepare('SELECT * FROM users WHERE status=? AND id=? ORDER BY id DESC');

    $query->execute([2,$id]);

    $rows = $query->fetchall(PDO::FETCH_ASSOC);

    if (count($rows) != 0) {

    ?>

        <div class="fb-profile">

            <img align="left" class="fb-image-lg" src="<?= $domain ?>assets/profileBanner/cover.svg" style="height: 20vw" alt="Profile image" />

            <img align="left" style="border-radius: 50%;" class="fb-image-profile thumbnail" src="<?= $domain ?>assets/profiles/<?php if(mb_strlen($rows[0]["image"])!=0){ echo $rows[0]["image"]; }else{ echo 'user.png'; } ?>" alt="Profile image" />

            <div class="fb-profile-text">

                <h2><?php echo $rows[0]["name"]; ?></h2>

                <p><?php echo $rows[0]["profision"]; ?></p>

            </div>

        </div>

        <div class="row" style="margin-top:100px">

            <div style="width: 25%;">

                <!--left col-->

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="v-pills-about-tab" data-toggle="pill" href="#v-pills-about" role="tab" aria-controls="v-pills-about" aria-selected="true">Haqqında</a>

                    <a class="nav-link" id="v-pills-practice-tab" data-toggle="pill" href="#v-pills-practice" role="tab" aria-controls="v-pills-practice" aria-selected="false">İş təcrübəsi</a>

                    <a class="nav-link" id="v-pills-phone-tab" data-toggle="pill" href="#v-pills-phone" role="tab" aria-controls="v-pills-phone" aria-selected="false">Telefonlar</a>

                    <a class="nav-link" id="v-pills-address-tab" data-toggle="pill" href="#v-pills-address" role="tab" aria-controls="v-pills-address" aria-selected="false">Ünvan</a>

                    <a class="nav-link" id="v-pills-email-tab" data-toggle="pill" href="#v-pills-email" role="tab" aria-controls="v-pills-email" aria-selected="false">Email</a>

                    <a class="nav-link" id="v-pills-sosial-tab" data-toggle="pill" href="#v-pills-sosial" role="tab" aria-controls="v-pills-sosial" aria-selected="false">Sosial Media</a>

                </div>

            </div>

            <div style="width:70%;">

                <!-- Tab panes -->

                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" style="margin-left:25px;" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-about-tab">

                        <h2>Haqqında</h2>

                        <br>

                        <span class="btn btn-info" style="width: 100%;min-height:11vw;text-align:left;"><?php if(mb_strlen($rows[0]["aboutt"])!=0){ echo $rows[0]["aboutt"]; }else{ echo "Məlumat daxil edilməyib"; }; ?></span>

                    </div>

                    <div class="tab-pane fade" style="margin-left:25px;" id="v-pills-practice" role="tabpanel" aria-labelledby="v-pills-practice-tab">

                        <h2>İş təcrübəsi</h2>

                        <br>

                        <span class="btn btn-info" style="width: 100%;min-height:11vw;text-align:left;"><?php if(mb_strlen($rows[0]["practice"])!=0){ echo $rows[0]["practice"]; }else{ echo "Məlumat daxil edilməyib"; }; ?></span>

                    </div>

                    <div class="tab-pane fade" style="margin-left:25px;" id="v-pills-phone" role="tabpanel" aria-labelledby="v-pills-phone-tab">

                        <h2>Telefonlar</h2>

                        <br>

                        <span class="btn btn-info" style="width: 100%;min-height:11vw;text-align:left;"><?php if(mb_strlen($rows[0]["phone"])!=0){ echo $rows[0]["phone"]; }else{ echo "Məlumat daxil edilməyib"; }; ?></span>

                    </div>

                    <div class="tab-pane fade" style="margin-left:25px;" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab">

                        <h2>Ünvan</h2>

                        <br>

                        <span class="btn btn-info" style="width: 100%;min-height:11vw;text-align:left;"><?php if(mb_strlen($rows[0]["address"])!=0){ echo $rows[0]["address"]; }else{ echo "Məlumat daxil edilməyib"; }; ?></span>

                    </div>

                    <div class="tab-pane fade" style="margin-left:25px;" id="v-pills-email" role="tabpanel" aria-labelledby="v-pills-email-tab">

                        <h2>Email</h2>

                        <br>

                        <span class="btn btn-info" style="width: 100%;min-height:11vw;text-align:left;"><?php if(mb_strlen($rows[0]["email"])!=0){ echo $rows[0]["email"]; }else{ echo "Məlumat daxil edilməyib"; }; ?></span>

                    </div>

                    <div class="tab-pane fade" style="margin-left:25px;" id="v-pills-sosial" role="tabpanel" aria-labelledby="v-pills-sosial-tab">

                        <h2>Sosial Media</h2>

                        <br>

                        <span class="btn btn-info" style="width: 100%;border-radius:0;border-top-left-radius:5px;border-top-right-radius:5px;"><?php if(mb_strlen($rows[0]["twitter"])!=0){ echo '<a href="'.$rows[0]["twitter"].'" target="_blank" style="color:white;">Twitter hesabı</a>'; }else{ echo "Twitter hesabı daxil edilməyib"; }; ?></span>

                        <span class="btn btn-info" style="width: 100%;border-radius:0;"><?php if(mb_strlen($rows[0]["facebook"])!=0){ echo '<a href="'.$rows[0]["facebook"].'" target="_blank" style="color:white;">Facebook hesabı</a>'; }else{ echo "Facebook hesabı daxil edilməyib"; }; ?></span>

                        <span class="btn btn-info" style="width: 100%;border-radius:0;"><?php if(mb_strlen($rows[0]["instagram"])!=0){ echo '<a href="'.$rows[0]["instagram"].'" target="_blank" style="color:white;">İnstagram hesabı</a>'; }else{ echo "İnstagram hesabı daxil edilməyib"; }; ?></span>

                        <span class="btn btn-info" style="width: 100%;border-radius:0;border-bottom-left-radius:5px;border-bottom-right-radius:5px;"><?php if(mb_strlen($rows[0]["linkedin"])!=0){ echo '<a href="'.$rows[0]["linkedin"].'" target="_blank" style="color:white;">Linkedin hesabı</a>'; }else{ echo "Linkedin hesabı daxil edilməyib"; }; ?></span>

                    </div>

                </div>

            </div>

            <div id="push"></div>

        </div>

    <?php

    }

    ?>

</div>

          <?php

        }

    }

    else

    {

        header("location:http://localhost/mentorum/");

    }

?>

