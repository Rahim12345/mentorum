<?php

if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='ebook')

{

    ?>

<div class="container" style="margin-top: 63px;">

    <nav aria-label="breadcrumb fixed-top">

        <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="<?= $domain ?>pages/progress">Şəxsi inkişaf</a></li>

            <li class="breadcrumb-item active" aria-current="page">E-kitabxana</li>

        </ol>

    </nav>

    <br><br>

    <div class="row" id="bookContent">

<?php

$query = $conn->prepare('SELECT * FROM library ORDER BY id DESC');

$query->execute();

$rows = $query->fetchall(PDO::FETCH_ASSOC);

if(count($rows)!=0)

{

    foreach($rows as $row)

    {

        ?>

        <!-- Card -->

        <div class="col-sm-3">

            <!-- Card image -->

            <img class="card-img-top" src="assets/ebooks/<?php echo $row['image']; ?>" title="<?php echo $row['title'] ?>" alt="Card image cap">

            <p style="height:60px;color:green;font-weight:bold;margin-top:10px;"><?php echo $row['title']; ?></p>

            <span><a href="<?= $domain ?>assets/ebooks/<?php echo $row['booklink']; ?>" data-id="<?php echo $row['id']; ?>" class="badge badge-primary download" onclick="download();return false;" style="padding: 8px;margin-top: 10px;margin-bottom:10px;">Endir <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a></span>

            <i class="fa fa-arrow-circle-down btn" style="float: right;background-color:red;line-height:10px;color:white;margin-top:10px;border-top-left-radius: 0;border-bottom-left-radius: 0;"></i> <span id="<?php echo $row['id'] ?>" class="counter btn" style="float: right;background-color:blue;line-height:10px;color:white;margin-top:10px;border-top-right-radius: 0;border-bottom-right-radius: 0;"><?php echo $row['download']; ?></span>

        </div>

        <!-- Card -->

        <?php

    }

}

else

{

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

