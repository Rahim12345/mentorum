<?php  
if(isset($_SESSION["id"]) && isset($_GET['page']))
{
	$page=htmlspecialchars(trim($_GET['page']));
	if($page=='about')
	{
		?>
<div class="card shadow mb-4" style="min-height: 450px;width:80%;margin:auto;">
	<div class="card-header py-3">
	    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
	      <?php 
	      if(!empty($error_about))
	      {
	        echo '<font style="color:white;">'.$error_about."</font>";
	      } 
	      ?>
	    </h6>
	</div>
	<div class="card-body">
		<form id="formDescription" data-parsley-validate class="form-horizontal form-label-left" action="" method="POST">

			<div class="item form-group">
				<label class="col-form-label col-md-12 col-sm-12 label-align" for=""><span style="color: green;font-weight: bold">Haqqımda:</span>
<?php  
$query=$conn->prepare("SELECT * FROM about ORDER BY id DESC");
$query->execute();
$rows=$query->fetchall(PDO::FETCH_ASSOC);
if(count($rows)!=0)
{
	echo "<br><pre>".$rows[0]['about_short']."</pre><br><hr><pre>".$rows[0]['about_title']."</pre><br><hr>".$rows[0]['about_content']."<hr>";
}
else
{
	echo "Hələ də haqqınızda heç bir məlumat daxil etməmisiniz";
}
?>
				</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="about_short">Haqqınızda qısa məlumat: <b>Maksimum 245 simvol</b></label>
				<div class="col-md-12 col-sm-12 ">
					<input type="text" id="about_short" name="about_short" maxlength="245" class="form-control" placeholder="Mentorum.az olaraq ilk dəfə 2020-ci il 1 yanvarda kiçik bir könüllü qrupla tələbələri gələcəkdə işləmək istədikləri sahələr haqqında bilkilərimi paylaşmağı qərara alıdıq" value="<?php if(!empty($about_short)){ echo $about_short; } ?>">
				</div>
            </div>
            
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="about_title">Haqqınızda əsəs mətn üçün başlıq: <br> <b>Maksimum 79 simvol</b></label>
				<div class="col-md-12 col-sm-12 ">
					<input type="text" id="about_title" name="about_title" maxlength="79" class="form-control" placeholder="Mentorum.az SİZİ susdurub,təcrübənizi danışdırmağa yönəlmiş könüllülər qrupdur" value="<?php if(!empty($about_title)){ echo $about_title; } ?>">
				</div>
            </div>
            
            <div class="item form-group">
		      <label for="about_content" class="col-sm-2 col-form-label">Haqqınızda əsəs mətn <br> <b>Maksimum 1490 simvol</b></label>
		      <div class="col-md-12 col-sm-12">
                    <textarea name="about_content" id="about_content" style="width:100%;" rows="5"><?php if(!empty($about_content)){ echo $about_content; } ?></textarea>
                </div>
		    </div>

			<div class="item form-group">
		      <div class="col-sm-12">
		        <button type="submit" name="about" class="btn btn-dark" style="position: relative;float: right;">Haqqımda&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
		      </div>
		    </div>
		</form>
	</div>
</div>
		<?php
	}
	else
	{
		header("location:../");
	}
}
else
{
	header("location:../");
}
?>