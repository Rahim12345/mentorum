<?php
if($index_value == "true")
{
    ?>
<main id="main">

<!-- ======= About Section ======= -->

<section id="about" class="about">

    <div class="container" data-aos="fade-up">



        <div class="section-title">

            <h2>Bizim</h2>

            <p>Haqqımızda</p>

        </div>

<?php

$query = $conn->prepare('SELECT * FROM about ORDER BY id DESC');

$query->execute();

$rows = $query->fetchall(PDO::FETCH_ASSOC);

if (count($rows) != 0) {

?>

    <div class="row">

        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">

            <img src="./assets/img/about.jpg" class="img-fluid" alt="">

        </div>

        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">

            <h3><?php echo $rows[0]['about_title']; ?></h3>

            <?php echo $rows[0]['about_content']; ?>

        </div>

    </div>



<?php

}else{

echo "Haqqızda heç bir məlumat daxil etməmisiniz";

}

?>

    </div>

</section><!-- End About Section -->
    <?php
}
else
{
    header("location:./");
}
?>