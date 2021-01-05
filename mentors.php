<?php
if($index_value == "true")
{
    $query = $conn->prepare('SELECT * FROM users WHERE status=? ORDER BY id DESC');

    $query->execute([2]);

    $rows = $query->fetchall(PDO::FETCH_ASSOC);

    if (count($rows) != 0) {

    ?>

        <main id="main" data-aos="fade-in">



            <!-- ======= Breadcrumbs ======= -->

            <div class="breadcrumbs">

                <div class="container">

                    <h2>Mentorlar</h2>

                    <p>Peşəkar Mentorlar Sizə Könüllü olaraq,kömək etməyə hazırdırlar </p>

                </div>

            </div><!-- End Breadcrumbs -->



            <!-- ======= Trainers Section ======= -->

            <section id="trainers" class="trainers">

                <div class="container" data-aos="fade-up">

                    <div class="row" data-aos="zoom-in" data-aos-delay="100">

                        <?php

                        foreach ($rows as $row) {

                        ?>

                            <div class="col-lg-3 col-md-3 d-flex align-items-stretch">

                                <div class="member">

                                    <?php if (!isset($_SESSION['id'])) {

                                    ?>

                                        <a href="javascript:;" class="login2" id="<?php echo $row["id"];  ?>" data-target="#login2" data-toggle="modal">

                                            <img src="<?= $domain ?>assets/profiles600/<?php if (mb_strlen($row["image"]) != 0) {

                                                                                echo $row["image"];

                                                                            } else {

                                                                                echo 'user.png';

                                                                            } ?>" style="width: 50%;border-radius:50%;" class="img-fluid" alt="">

                                            <div class="member-content">

                                                <h4 style="color:green;"><?php echo $row["name"]; ?></h4>

                                                <span style="color: grey;"><?php echo $row["profision"]; ?></span>

                                            </div>

                                        </a>

                                    <?php

                                    } else {

                                    ?>

                                        <a href="<?= $domain ?>pages/profile/<?php echo $row["id"]; ?>"><img src="<?= $domain ?>assets/profiles600/<?php if (mb_strlen($row["image"]) != 0) {

                                                                                                                                            echo $row["image"];

                                                                                                                                        } else {

                                                                                                                                            echo 'user.png';

                                                                                                                                        } ?>" style="width: 50%;border-radius:50%;" class="img-fluid" alt="">



                                            <div class="member-content">

                                                <h4 style="color:green;"><?php echo $row["name"]; ?></h4>

                                                <span style="color: grey;"><?php echo $row["profision"]; ?></span>

                                            </div>

                                        </a>

                                    <?php

                                    }

                                    ?>

                                </div>

                            </div>

                        <?php

                        }

                        ?>

                    </div>

                </div>



            </section><!-- End Trainers Section -->



        </main><!-- End #main -->

    <?php

    } else {

        include 'soon.php';

    }
}
else
{
    header("location:./");
}
?>