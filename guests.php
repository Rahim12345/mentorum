<?php

if (isset($_SESSION['id'])) {

    $query = $conn->prepare('SELECT * FROM guests WHERE host_id=? ORDER BY id DESC');

    $query->execute([$_SESSION["id"]]);

    $rows = $query->fetchall(PDO::FETCH_ASSOC);

    if (count($rows) != 0) {

?>

        <main id="main" data-aos="fade-in">



            <!-- ======= Breadcrumbs ======= -->

            <div class="breadcrumbs">

                <div class="container">

                    <h2>Qonaqlar</h2>

                    <p>Bu istifadəçilər sizin profilinizi ziyarət etdilər </p>

                </div>

            </div><!-- End Breadcrumbs -->



            <!-- ======= Trainers Section ======= -->

            <section id="trainers" class="trainers">

                <div class="container" data-aos="fade-up">

                    <div class="row" data-aos="zoom-in" data-aos-delay="100">

                        <?php

                        foreach ($rows as $row) {

                            $query_user_info = $conn->prepare('SELECT * FROM users WHERE id=?');

                            $query_user_info->execute([$row["guest_id"]]);

                            $rows_user_info = $query_user_info->fetchall(PDO::FETCH_ASSOC);

                            if ($row["looked"] == 0) {

                        ?>

                                <div class="col-lg-3 col-md-3 d-flex align-items-stretch">

                                    <div class="member">

                                        <a href="<?= $domain ?>pages/profileBrow/<?php echo $row["id"]; ?>"><img src="<?= $domain ?>assets/profiles600/<?php if (mb_strlen($rows_user_info[0]["image"]) != 0) {

                                                                                                                                                echo $rows_user_info[0]["image"];

                                                                                                                                            } else {

                                                                                                                                                echo 'user.png';

                                                                                                                                            } ?>" style="width: 50%;border-radius:50%;" class="img-fluid" alt="">

                                        </a>

                                        <div class="member-content">

                                            <h4 style="color:green;"><?php echo $rows_user_info[0]["name"]; ?></h4>

                                            <span><?php echo $rows_user_info[0]["profision"]; ?></span>

                                            <p>

                                                <?php echo $row["created_at"]; ?>

                                            </p>

                                            <div class="social">

                                                <span><i class="fa fa-eye-slash" aria-hidden="true"></i></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            <?php

                            } else {

                            ?>

                                <div class="col-lg-3 col-md-3 d-flex align-items-stretch">

                                    <div class="member">

                                        <a href="<?= $domain ?>pages/profileBrow/<?php echo $row["id"]; ?>"><img src="<?= $domain ?>assets/profiles600/<?php if (mb_strlen($rows_user_info[0]["image"]) != 0) {

                                                                                                                                            echo $rows_user_info[0]["image"];

                                                                                                                                        } else {

                                                                                                                                            echo 'user.png';

                                                                                                                                        } ?>" style="width: 50%;border-radius:50%;" class="img-fluid" alt="">

                                        </a>

                                        <div class="member-content">

                                            <h4 style="color:green;"><?php echo $rows_user_info[0]["name"]; ?></h4>

                                            <span><?php echo $rows_user_info[0]["profision"]; ?></span>

                                            <p>

                                                <?php echo $row["created_at"]; ?>

                                            </p>

                                            <div class="social">

                                                <span><i class="fa fa-eye" aria-hidden="true"></i></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                        <?php

                            }

                        }

                        ?>

                    </div>

                </div>



            </section><!-- End Trainers Section -->



        </main><!-- End #main -->

    <?php

    } else {

    ?>

        <button class="btn btn-danger" style="width:80%;height:40vw;margin-left:10%;font-size:4vw;margin-top:100px;">Heç bir ziyarətçiniz yoxdur</button>

<?php

    }

} else {

    header("location:./");

}

?>