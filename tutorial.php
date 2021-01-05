<?php

if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='tutorial')

{

    ?>

<div class="container" style="margin-top: 63px;">

    <nav aria-label="breadcrumb fixed-top">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?= $domain ?>pages/progress">Şəxsi inkişaf</a></li>

            <li class="breadcrumb-item active" aria-current="page">Onlayn dərslər</li>

        </ol>

    </nav>

    <br><br>

    <div class="row">

        <?php

        $query = $conn->prepare('SELECT * FROM tutorial ORDER BY id DESC');

        $query->execute();

        $rows = $query->fetchall(PDO::FETCH_ASSOC);

        if (count($rows) != 0) {

            foreach ($rows as $row) {

        ?>

                <!-- Card -->

                <div class="col-sm-3">



                    <!-- Card image -->

                    <div class="embed-responsive embed-responsive-16by9">

                        <iframe class="embed-responsive-item" src="<?php echo $row['link'] ?>" allowfullscreen></iframe>

                    </div>



                    <!-- Card content -->

                    <div class="card-body bg-info" style="margin-bottom: 10px;">

                        <span style="color:white;font-weight:1000;">Paylaş:</span>

                        <a href="#" style="color:white" onclick="share_fb('<?php echo $row['link']; ?>');return false;" rel="nofollow" share_url="<?php echo $row['link']; ?>" target="_blank">

                            <img src="./assets/icons/facebook.png" style="width: 54px;" alt="">

                        </a>

                        <a class="btn btn-default icon" href="javascript:void(0)" onclick="window.open( 'http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $row['link']; ?>', 'sharer', 'toolbar=0, status=0, width=626, height=436');return false;" target="_blank" title="Linkedin">

                            <img src="./assets/icons/linkedin.png" style="width: 35px;" alt="">

                        </a>

                    </div>

                </div>

                <!-- Card -->

        <?php

            }

        } else {

            include 'soon.php';

        }

        ?>



    </div>

</div>    

    <?php

}

else

{

	header("location:./");

}

?>

