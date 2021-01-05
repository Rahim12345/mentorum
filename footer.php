<?php

if($index_value == "true")

{

  ?>

<!-- ======= Footer ======= -->

<footer id="footer">

<?php

$query = $conn->prepare('SELECT * FROM users WHERE status=?');

$query->execute([1]);

$rows = $query->fetchall(PDO::FETCH_ASSOC);



$query4Contact = $conn->prepare('SELECT * FROM contact ORDER BY id DESC');

$query4Contact->execute();

$rows4Contact = $query4Contact->fetchall(PDO::FETCH_ASSOC);

?>

  <div class="footer-top">

    <div class="container">

      <div class="row">



        <div class="col-lg-4 col-md-6 footer-contact">

          <h3>mentorum.az</h3>

          <p>

            <?= $rows[0]["address"] ?><br><br>

            <strong>Telefon : </strong>+994 <?= substr($rows4Contact[0]["phone"],0,2)." ".substr($rows4Contact[0]["phone"],2,8)  ?><br>

            <strong>Email : </strong><?= $rows4Contact[0]["email"] ?><br>

          </p>

        </div>



        <div class="col-lg-4 col-md-6 footer-links">

          <h4>Faydalı linklər</h4>

          <ul>

            <li><i class="bx bx-chevron-right"></i> <a href="<?= $domain ?>pages/about">Haqqımızda</a></li>

            <li><i class="bx bx-chevron-right"></i> <a href="<?= $domain ?>pages/progress">Şəxsi inkişaf</a></li>

            <li><i class="bx bx-chevron-right"></i> <a href="<?= $domain ?>pages/mentors">Mentorlar</a></li>

            <li><i class="bx bx-chevron-right"></i> <a href="<?= $domain ?>pages/contact">Əlaqə</a></li>

            <li><i class="bx bx-chevron-right"></i> <a href="<?= $domain ?>pages/blog">Blog</a></li>

          </ul>

        </div>



        <div class="col-lg-4 col-md-6 footer-links">

          <h4>Şəxsi İnkişaf</h4>

          <ul>

            <li><i class="bx bx-chevron-right"></i> <a href="<?= $domain ?>pages/career">Xaricdə Mən</a></li>

            <li><i class="bx bx-chevron-right"></i> <a href="<?= $domain ?>pages/interview">Müsahibələr</a></li>

            <li><i class="bx bx-chevron-right"></i> <a href="<?= $domain ?>pages/tutorial">Onlayn dərslər</a></li>

            <li><i class="bx bx-chevron-right"></i> <a href="<?= $domain ?>pages/ebook">E-kitabxana</a></li>

            <li><i class="bx bx-chevron-right"></i> <a href="<?= $domain ?>pages/practice">Təcrübə proqamları</a></li>

          </ul>

        </div>



      </div>

    </div>

  </div>



  <div class="container d-md-flex py-4">



    <div class="mr-md-auto text-center text-md-left">

      <div class="copyright">

        &copy; Copyright <strong><span>mentorum</span></strong>.az Bütün hüquqlar qorunur

      </div>

      <div class="credits">

        Designed by <a href="javascript:;">Rahim Süleymanov</a>

      </div>

    </div>

    <div class="social-links text-center text-md-right pt-3 pt-md-0">

      <a href="<?=  $rows[0]["twitter"] ?>" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>

      <a href="<?=  $rows[0]["facebook"] ?>" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>

      <a href="<?=  $rows[0]["instagram"] ?>" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>

      <a href="<?=  $rows[0]["linkedin"] ?>" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>

    </div>

  </div>

</footer><!-- End Footer -->



<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

<div id="preloader"></div>



<!-- Vendor JS Files -->

<script src="<?= $domain ?>assets/vendor/jquery/jquery.min.js"></script>

<script src="<?= $domain ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= $domain ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>

<script src="<?= $domain ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>

<script src="<?= $domain ?>assets/vendor/counterup/counterup.min.js"></script>

<script src="<?= $domain ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>

<script src="<?= $domain ?>assets/vendor/aos/aos.js"></script>



<!--========================================== 4 SOON =============================================-->

<script src="<?= $domain ?>assets/soon/vendor/countdowntime/moment.min.js"></script>

<script src="<?= $domain ?>assets/soon/vendor/countdowntime/countdowntime.js"></script>

<script src="<?= $domain ?>assets/soon/js/seconder.js"></script>



<script src="<?= $domain ?>assets/soon/vendor/tilt/tilt.jquery.min.js"></script>

<script>

  $('.js-tilt').tilt({

    scale: 1.1

  })

</script>

<script src="<?= $domain ?>assets/soon/js/main.js"></script>

<!--===============================================================================================-->



<!-- Template Main JS File -->

<script src="<?= $domain ?>assets/js/main.js"></script>

<script src="<?= $domain ?>assets/js/login.js"></script>

<script src="<?= $domain ?>assets/js/login2.js"></script>

<script src="<?= $domain ?>assets/js/login_2_registr.js"></script>

<script src="<?= $domain ?>assets/js/registration.js"></script>

<script src="<?= $domain ?>assets/js/fb.js"></script>

<script src="<?= $domain ?>assets/js/sosial.js"></script>

<script src="<?= $domain ?>assets/js/counter.js"></script>

<script src="<?= $domain ?>assets/js/download.js"></script>

<script src="<?= $domain ?>assets/js/hiddenID.js"></script>

<script src="<?= $domain ?>assets/js/editMyProfile.js"></script>

<script src="<?= $domain ?>assets/js/cv.js"></script>

<script src="<?= $domain ?>assets/js/jquery.validate.min.js"></script>

<script src="<?= $domain ?>assets/js/messages_az.min.js"></script>

<script>

  $("form#contactForm").validate({

    lang: 'az'

  });

</script>



<script>

  $("form#cvSendForm").validate({

    lang: 'az'

  });

</script>



<?php include 'login-modal.php'; ?>

<?php include 'login-modal2.php'; ?>

<?php include 'profile_edit_modal.php'; ?>

</body>



</html>



<?php

}

else

{

  header("location:./");

}

?>