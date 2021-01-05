<?php

if (isset($_GET['page']) && htmlspecialchars(trim($_GET['page'])) == 'about') {

    $query = $conn->prepare('SELECT * FROM about ORDER BY id DESC');

    $query->execute();

    $rows = $query->fetchall(PDO::FETCH_ASSOC);

    if (count($rows) != 0) {

?>

        <main id="main">

            <!-- ======= Breadcrumbs ======= -->

            <div class="breadcrumbs" data-aos="fade-in">

                <div class="container">

                    <h2>Haqqımızda</h2>

                    <p><?php echo $rows[0]['about_short'] ?></p>

                </div>

            </div><!-- End Breadcrumbs -->



            <!-- ======= About Section ======= -->

            <section id="about" class="about">

                <div class="container" data-aos="fade-up">



                    <div class="row">

                        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">

                            <img src="<?= $domain ?>assets/img/about.jpg" class="img-fluid" alt="">

                        </div>

                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">

                            <h3><?php echo $rows[0]['about_title']; ?></h3>

                            <?php echo $rows[0]['about_content']; ?>

                        </div>

                    </div>



                </div>

            </section><!-- End About Section -->



            <!-- ======= Testimonials Section ======= -->

            <section id="testimonials" class="testimonials">

                <div class="container" data-aos="fade-up">



                    <div class="section-title">

                        <h2>BİZİM</h2>

                        <p>Haqqımızda Onlar Nə deyir</p>

                    </div>



                    <div class="owl-carousel testimonials-carousel" data-aos="zoom-in" data-aos-delay="100">

                        <?php

                        $query = $conn->prepare('SELECT * FROM think ORDER BY id DESC');

                        $query->execute();

                        $rows = $query->fetchall(PDO::FETCH_ASSOC);

                        if (count($rows) != 0) {

                            foreach ($rows as $row) {

                        ?>

                                <div class="testimonial-wrap">

                                    <div class="testimonial-item">

                                        <img src="<?= $domain ?>assets/thinkers/<?php echo $row['imageUrl']; ?>" class="testimonial-img" alt="">

                                        <h3><?php echo $row['name']; ?></h3>

                                        <h4><?php echo $row['area']; ?></h4>

                                        <p>

                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>

                                            <?php echo $row['thinkcontent']; ?>

                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>

                                        </p>

                                    </div>

                                </div>

                        <?php

                            }

                        } else {

                            echo "Təsüratlar paylaşılmayıb";

                        }

                        ?>



                    </div>



                </div>

            </section><!-- End Testimonials Section -->



        </main><!-- End #main -->

<?php

    } else {

        echo "Haqqızda heç bir məlumat daxil etməmisiniz";

    }

} else {

    header("location:./");

}

?>