<?php
if($index_value=="true")
{
  ?>
<!DOCTYPE html>
<html lang="az">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="description" content="<?php
                                    $query = $conn->prepare('SELECT * FROM descriptions ORDER BY id DESC');
                                    $query->execute();
                                    $rows = $query->fetchall(PDO::FETCH_ASSOC);
                                    if (count($rows) != 0) {
                                      echo $rows[0]['description'];
                                    }
                                    ?>">
  <meta name="keywords" content="<?php
                                  $query = $conn->prepare('SELECT * FROM keywords ORDER BY id DESC');
                                  $query->execute();
                                  $rows = $query->fetchall(PDO::FETCH_ASSOC);
                                  if (count($rows) != 0) {
                                    echo $rows[0]['keywords'];
                                  }
                                  ?>">
  <meta property="og:locale" content="en_AZ">
  <meta property="og:type" content="website">
  <meta property="og:title" content="mentorum.az">
  <meta property="og:description" content="Təcrübən danışsın!">
  <meta property="og:url" content="<?= $domain ?>">
  <meta property="og:site_name" content="<?= $domain ?>">
  <title><?php
          $query = $conn->prepare("SELECT * FROM title ORDER BY id DESC");
          $query->execute();
          $rows = $query->fetchall(PDO::FETCH_ASSOC);
          if (count($rows) != 0) {
            echo $rows[0]['title'];
          }
          ?></title>
  <!-- Favicons -->
  <?php
  $query = $conn->prepare("SELECT * FROM shortcut_icon ORDER BY id DESC");
  $query->execute();
  $rows = $query->fetchall(PDO::FETCH_ASSOC);
  if (count($rows) != 0) {
  ?>
    <link rel="shortcut icon" href="<?= $domain ?>assets/logo/<?php echo $rows[0]['url'] ?>">
  <?php
  }
  ?>
  <base href="/mentorum/" />
  <link href="<?= $domain ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= $domain ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= $domain ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= $domain ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= $domain ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= $domain ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="./assets/css/fontawesome.min.css" rel="stylesheet">
  <link href="<?= $domain ?>assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= $domain ?>assets/soon/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= $domain ?>assets/soon/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= $domain ?>assets/soon/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= $domain ?>assets/soon/css/main.css">


  <!-- Main CSS File -->
  <link href="<?= $domain ?>assets/css/main.css" rel="stylesheet">

  <link href="<?= $domain ?>assets/css/blog/style.css" rel="stylesheet">
  <link href="<?= $domain ?>assets/css/blog/custom.css" rel="stylesheet">
  <link href="<?= $domain ?>assets/css/blog/responsive.css" rel="stylesheet">
  <link href="<?= $domain ?>assets/css/blog/animate.css" rel="stylesheet">
  <link href="./assets/css/blog/font-awesome.min.css" rel="stylesheet">
  <link href="<?= $domain ?>assets/css/blog/superslides.css" rel="stylesheet">
  <link href="<?= $domain ?>assets/css/blog/baguetteBox.min.css" rel="stylesheet">
  

  <script src="https://cdn.jsdelivr.net/sharer.js/latest/sharer.min.js"></script>
  
  <!-- =======================================================
  * Müəllif: Rahim Süleymanov
  ======================================================== -->

</head>

<body>

  <!-- ======= Header ======= -->

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="./">Mentorum</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?php echo $index;     ?>" ><a href="<?= $domain ?>" style="<?= $style_index ?>">Əsas səhifə</a></li>
          <li class="<?php echo $about;     ?>" ><a href="<?= $domain ?>pages/about" style="<?= $style_about ?>">Haqqımızda</a></li>
          <li class="<?php echo $progress;  ?>" ><a href="<?= $domain ?>pages/progress" style="<?= $style_progress ?>">Şəxsi inkişaf</a></li>
          <li class="<?php echo $mentors;   ?>" ><a href="<?= $domain ?>pages/mentors" style="<?= $style_mentors ?>">Mentorlar</a></li>
          <li class="<?php echo $contact;   ?>" ><a href="<?= $domain ?>pages/contact" style="<?= $style_contact ?>">Əlaqə</a></li>
          <li class="<?php echo $blog;   ?>" ><a href="<?= $domain ?>pages/blog" style="<?= $style_blog ?>">Blog</a></li>
          <?php if (isset($_SESSION['id'])) {
            $query = $conn->prepare("SELECT * FROM users WHERE id=?");
            $query->execute([$_SESSION['id']]);
            $rows = $query->fetchall(PDO::FETCH_ASSOC);
            if (count($rows) != 0) {
          ?>
              <li class="drop-down">
                <a href="javascript:;">
                  <?php
                  $ad=$rows[0]['name'];
                  $ad=explode(" ",$ad);
                  $ad=$ad[0];
                  if(strlen($rows[0]['image'])==0)
                  {
                    echo '<img src="'.$domain.'assets/profiles/user.png" style="width:25px;border-radius:50%;" alt=""> '.$ad;
                  }
                  else
                  {
                    echo '<img src="'.$domain.'assets/profiles/'.$rows[0]['image'].'" style="width:25px;border-radius:50%;" alt=""> '.$ad;
                  }
                  ?>
                </a>
                <ul>
                  <li>
                    <a href="<?= $domain ?>pages/guests">
                      <?php
                      $query_guests = $conn->prepare('SELECT count(id) FROM guests WHERE host_id=? AND looked=?');
                      $query_guests->execute([$_SESSION['id'],0]);
                      $a = $query_guests->fetchColumn();
                      if($a==0)
                      {
                        ?>
                          <a href="<?= $domain ?>pages/guests" class="btn btn-success <?= $guestsPage ?>" style="border-radius:0;color:white;border-top-right-radius:5px;border-top-left-radius:5px;text-align:left">Qonaq yoxdur</a>
                        <?php
                      }
                      else
                      {
                        ?>
                          <a href="<?= $domain ?>pages/guests" class="btn btn-success <?= $guestsPage ?>" style="border-radius:0;color:white;border-top-right-radius:5px;border-top-left-radius:5px;text-align:left">Qonaq sayı  <span class="badge badge-light float-right" style="padding: 3px;"><?php echo $a; ?></span></a>
                        <?php
                      }
                      ?> 
                    </a>
                  </li>
                  <li><a href="<?= $domain ?>pages/edit" class="btn btn-success <?= $editPage ?>" style="border-radius:0;color:white;text-align:left">Ayarlar <i class="fa fa-edit float-right"></i></a></li>
                  <li><a href="<?= $domain ?>pages/cvSend" class="btn btn-success <?= $cvSendPage ?>" style="border-radius:0;color:white;text-align:left">CV yoxla <i class="fa fa-file float-right" aria-hidden="true"></i></i></a></li>
                  <li><a href="<?= $domain ?>pages/exit" class="btn btn-success" style="border-radius:0;color:white;border-bottom-right-radius:5px;border-bottom-left-radius:5px;text-align:left">Hesabdan çıx <i class="fa fa-sign-out float-right"></i></a></li>
                </ul>
              </li>
          <?php
            }
          }
          ?>
        </ul>
      </nav><!-- .nav-menu -->
      <?php
      if (count($rows) == 0) {
        echo '<a href="javascript:;" class="get-started-btn" data-target="#login" data-toggle="modal">Daxil ol</a>';
      }
      ?>
      <?php if (!isset($_SESSION['id'])) {
        echo '<a href="javascript:;" class="get-started-btn" data-target="#login" data-toggle="modal">Daxil ol</a>';
      }
      ?>
    </div>
  </header>

  <!-- End Header -->

  <?php
}
else
{
  header("location:./");
}

?>