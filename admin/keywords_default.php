<?php  
if(isset($_SESSION["id"]) && isset($_GET['page']))
{
	$page=htmlspecialchars(trim($_GET['page']));
	if($page=='keywords')
	{
		?>
<div class="card shadow mb-4" style="min-height: 450px;width:80%;margin:auto;">
	<div class="card-header py-3">
	    <h6 class="m-0 font-weight-bold text-primary" id="alert" style="background-color: orange;padding-left: 15px;border-radius: 10px;line-height: 40px;">
	      <?php 
	      if(!empty($error_keywords))
	      {
	        echo '<font style="color:white;">'.$error_keywords."</font>";
	      } 
	      ?>
	    </h6>
	</div>
	<div class="card-body">
		<form id="formKeywords" data-parsley-validate class="form-horizontal form-label-left" action="" method="POST">

			<div class="item form-group">
				<label class="col-form-label col-md-12 col-sm-12 label-align" for=""><span style="color: green;font-weight: bold">Mövcud keywords:</span>
<?php  
$query=$conn->prepare("SELECT * FROM keywords ORDER BY id DESC");
$query->execute();
$rows=$query->fetchall(PDO::FETCH_ASSOC);
if(count($rows)!=0)
{
	echo $rows[0]['keywords'];
}
else
{
	echo "Hələ də keywords daxil etməmisiniz";
}
?>
				</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align" for="keywords_input">Keywords daxil edin </label>
				<div class="col-md-12 col-sm-12 ">
					<input type="text" id="keywords_input" name="keywords_input" class="form-control" value="<?php if(!empty($keywords_input)){ echo $keywords_input; } ?>">
				</div>
			</div>
			<div class="item form-group">
		      <div class="col-sm-12">
		        <button type="submit" name="keywords" class="btn btn-dark" style="position: relative;float: right;">Keywords&nbsp<i class="fa fa-plus" aria-hidden="true"></i></button>
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