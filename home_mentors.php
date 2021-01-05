<?php
if($index_value == "true")
{
    ?>
    <!-- ======= Trainers Section ======= -->

    <section id="trainers" class="trainers">

        <div class="container" data-aos="fade-up">



            <div class="section-title">

                <h2>Bizim</h2>

                <p>Peşəkar mentorlar</p>

            </div>

            <div class="row" data-aos="zoom-in" data-aos-delay="100">

                <?php

                $query = $conn->prepare('SELECT * FROM users WHERE status=? ORDER BY id DESC');

                $query->execute([2]);

                $rows = $query->fetchall(PDO::FETCH_ASSOC);

                if (count($rows) != 0) {

                    foreach ($rows as $row) {

                ?>

                        <div class="col-lg-3 col-md-3 d-flex align-items-stretch">

                            <div class="member">

                                <?php if (!isset($_SESSION['id'])) {

                                ?>

                                    <a href="javascript:;" class="login2" id="<?php echo $row["id"];  ?>" data-target="#login2" data-toggle="modal">

                                        <img src="assets/profiles600/<?php if (mb_strlen($row["image"]) != 0) {

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

                                    <a href="./pages/profile/<?php echo $row["id"]; ?>"><img src="assets/profiles600/<?php if (mb_strlen($row["image"]) != 0) {

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

                }

                ?>

            </div>



        </div>

    </section><!-- End Trainers Section -->



    </main><!-- End #main -->
    <?php
}
else
{
    header("location:./");
}
?>