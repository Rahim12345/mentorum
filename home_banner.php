<?php
if($index_value == "true")
{
    $query=$conn->prepare('SELECT * FROM banner ORDER BY id DESC');

    $query->execute();

    $rows=$query->fetchall(PDO::FETCH_ASSOC);

    if(count($rows)!=0)

    {

        ?>

    <!-- ======= Hero Section ======= -->

    <section id="hero" style="background: url('./assets/banners/<?php echo $rows[0]['image']; ?>') top center;" class="d-flex justify-content-center align-items-center">

        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">

            <h1><?php echo $rows[0]['title']; ?></h1>

            <h2><?php echo $rows[0]['content']; ?></h2>

        </div>

    </section><!-- End Hero -->

        <?php

    }
}
else
{
    header("location:./");
}
?>