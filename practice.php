<?php

if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='practice')

{

    $query = $conn->prepare('SELECT * FROM practice ORDER BY id DESC');

    $query->execute();

    $rows = $query->fetchall(PDO::FETCH_ASSOC);

    if(count($rows) != 0)

    {

        ?>

<div class="container" style="margin-top: 63px;">

    <nav aria-label="breadcrumb fixed-top">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?= $domain ?>pages/progress">Şəxsi inkişaf</a></li>

            <li class="breadcrumb-item active" aria-current="page">Təcrübə proqramları</li>

        </ol>

    </nav>

    <br><br>

    <div class="row">

<?php

foreach($rows as $row)

{

    ?>

        <!-- Card -->

        <div class="col-sm-3">



            <!-- Card image -->

            <img class="card-img-top" src="<?= $domain ?>assets/practiceMini/<?= $row['image_url'] ?>" alt="Card image cap">



            <!-- Card content -->

            <div class="card-body">



                <!-- Title -->

                <h4 class="card-title"><a>Təcrübə proqramı</a></h4>

                <!-- Text -->

                <p class="card-text" title="<?= $row['title'] ?>"><?php if(mb_strlen($row['title'])>55){ echo mb_substr($row['title'],0,54).'...'; }else{ echo $row['title']; } ?></p>

                <!-- Button -->

                <a href="<?= $domain ?>pages/practiceMore/<?= $row['slug'] ?>" class="badge badge-primary" style="padding: 8px;padding-left:0px;">Ətraflı <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>



            </div>



        </div>

        <!-- Card -->

    <?php

}



?>

    </div>

</div>    

        <?php

    }

    else

    {

        ?>

        <div class="container" style="width: 90%;">

            <?php include 'soon.php'; ?>

        </div>

        <?php

        

    }

}

else

{

	header("location:./");

}

?>

