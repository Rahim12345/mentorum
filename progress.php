<?php
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='progress')
{
  ?>
<div class="container" style="margin-top: 80px;">
  <div class="row">
    <div class="col-sm-4">
      <div class="card text-white bg-success mb-4" style="max-width: 90%;min-height:280px;">
        <div class="card-header" style="text-align: center;"><img src="./assets/icons/meeting.png" style="width: 13%" alt=""></div>
        <div class="card-body">
          <h5 class="card-title" style="text-align: center;">Xaricdə Mən</h5>
          <p class="card-text">Karyeranıza yeni addım atarkən ehtiyacınız olacaq bütün gərəkli informasiyaları buradan əldə edə bilərsiniz. <br><br><br><br><a href="./pages/career" class="badge badge-primary" style="padding: 8px;">Ətraflı <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card text-white bg-success mb-4" style="max-width: 90%;min-height:280px;">
        <div class="card-header" style="text-align: center;"><i class="fa fa-group" style="font-size: 30px;color:#030b05;" aria-hidden="true"></i></div>
        <div class="card-body">
          <h5 class="card-title" style="text-align: center;">Müsahibələr</h5>
          <p class="card-text">Ölkəmizdə daxili və ya xaricində olan həmvətənlilərimizin şəxsi və peşəkar həyat təcrübələri ilə buradan tanış ola bilərsiniz.<br><br><br><br><a href="./pages/interview" class="badge badge-primary" style="padding: 8px;">Ətraflı <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card text-white bg-success mb-4" style="max-width: 90%;min-height:280px;">
        <div class="card-header" style="text-align: center;"><i class="fa fa-play-circle" style="font-size: 30px;color:#030b05;" aria-hidden="true"></i></div>
        <div class="card-body">
          <h5 class="card-title" style="text-align: center;">Onlayn dərslər</h5>
          <p class="card-text">İngilis, rus dili və Microsoft Office proqramları üzrə peşəkar müəllimlər tərəfindən hazırlanmış dərslərdən yararlana bilərsiniz. <br><br><br><a href="./pages/tutorial" class="badge badge-primary" style="padding: 8px;">Ətraflı <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></p>
        </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card text-white bg-success mb-4" style="max-width: 90%;min-height:280px;">
      <div class="card-header" style="text-align: center;"><i class="fa fa-book" style="font-size: 30px;color:#030b05;" aria-hidden="true"></i></div>
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;">E-kitabxana</h5>
        <p class="card-text">Azərbaycan, türk, ingilis və rus dilində olan kitablardan ödənişsiz şəkildə istifadə edə bilərsiniz. <br><br><br><br><a href="./pages/ebook" class="badge badge-primary" style="padding: 8px;">Ətraflı <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></p>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card text-white bg-success mb-4" style="max-width: 90%;min-height:280px;">
      <div class="card-header" style="text-align: center;"><i class="fa fa-lightbulb-o" style="font-size: 30px;color:#030b05;" aria-hidden="true"></i></div>
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;">Təcrübə proqramları</h5>
        <p class="card-text">Müxtəlif şirkətlər tərəfindən elan edilmiş təcrübə proqramlarını kəşf edə bilərsiniz. <br><br><br><br><br><a href="./pages/practice" class="badge badge-primary" style="padding: 8px;">Ətraflı <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></p>
      </div>
    </div>
  </div>
</div>
</div>  
  <?php
}
else
{
	header("location:./");
}
?>
