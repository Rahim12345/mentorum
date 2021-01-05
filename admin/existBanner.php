<?php  
if(isset($_GET['page']) && htmlspecialchars(trim($_GET['page']))=='existBanner')
{
	$query4Banner=$conn->prepare("SELECT * FROM banner ORDER BY id DESC");
	$query4Banner->execute();
	$rows4Banner=$query4Banner->fetchall(PDO::FETCH_ASSOC);
	$count4Banner=count($rows4Banner);
	if($count4Banner!=0)
	{
	?>
<div class="card shadow mb-4" style="min-height: 450px;">
    <div class="card-body">
	   <table class="table table-dark" style="width: 100%;">
		  <thead style="background-color: #1c4b79;">
		    <tr>
		      <th scope="col">№</th>
		      <th scope="col">Bannerin başlığı</th>
		      <th scope="col">Şəkil</th>
		      <th scope="col">Sil</th>
		    </tr>
		  </thead>
		  <tbody style="background-color: #1c4b79;">
		  	<?php  
		  	$n=0;
		  	foreach($rows4Banner as $row4Banner)
		  	{
				  $images=$row4Banner["image"];
				  $imagesArray=explode(",",$images);
		  		$n++;
		  		?>
				<tr>
			      <th scope="row"><?php echo $n; ?></th>
			      <td><?php echo $row4Banner["title"]; ?></td>
			      <td style="width: 25%"><img style="width:100%" src="../assets/banners/<?php echo $imagesArray[0]; ?>" alt=""></td>
			      <td><a href="index.php?page=removeBanner&id=<?php echo $row4Banner['id']; ?>"><i class="fa fa-trash" style="color: white;" aria-hidden="true"></i></a></td>
			    </tr>
		  		<?php
		  	}
		  	?>
		  </tbody>
		</table>      
    </div>
</div>
	<?php
	}
	else
	{
		?>
<div class="card shadow mb-4" style="min-height: 450px;">
    <div class="card-body">
	<p class="btn btn-danger" style="line-height: 300px;min-width: 80%;font-size: 3vw">Hələ də banner yükləməmisiniz!</p>
    </div>
</div>
		<?php
	}
}
else
{
	header("location:../");
}
?>