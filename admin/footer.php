<?php
if (isset($_SESSION["id"])) {
?>
  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; Rahim Süleymanov <?php
                                                $year = date("Y");
                                                if ($year == 2020) {
                                                  echo $year;
                                                } else {
                                                  echo "2020 - " . $year;
                                                }
                                                ?></span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Çıxmaq istiyirsən?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Çıxmaq üçün Çıxış düyməsinə vurun.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Ləğv et</button>
          <a class="btn btn-primary" href="index.php?page=exit">Çıxış</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script src="js/jquery.tagsinput.js"></script>
  <script src="js/ckeditor/ckeditor.js"></script>

  <script src="js/shortcut_icon.js"></script>
  <script src="js/upload.js"></script>
  <script src="js/uploadBook.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/messages_az.min.js"></script>
  <script src="js/showMessage.js"></script>
  <script src="js/notification.js"></script>
  <script src="js/formContactLang.js"></script>
  <script src="js/notification.js"></script>
  <script src="js/showMessage.js"></script>
  <script src="js/cv.js"></script>
  <script src="js/select2.min.js"></script>
  <script src="js/blogImage.js"></script>
  <script src="js/practiceImage.js"></script>
  <script>
    $(document).ready(function() {
      $('.names').select2();
    });
  </script>
  <script>
    $("form#blogFrom").validate({
      lang: 'az'
    });
  </script>

<script>
    $("form#practiceFrom").validate({
      lang: 'az'
    });
  </script>

  <?php include './show_notification_modal.php'; ?>
  </body>

  </html>
<?php
} else {
  header("location:../");
}
?>