<?php

if (isset($_GET['page']) && htmlspecialchars(trim($_GET['page'])) == 'practiceMore' && !empty($_GET['page']) && isset($_GET["id"])) {

	$slug	 	= htmlspecialchars(trim($_GET['id']));

	$query 		= $conn->prepare('SELECT * FROM practice WHERE slug=?');

	$query->execute([$slug]);

	$rows 		= $query->fetchall(PDO::FETCH_ASSOC);

	if (count($rows) != 0) {

		$time 		= explode(" ", $rows[0]["created_at"]);

		$time 		= $time[0];

		$hour 		= explode(" ", $rows[0]["created_at"])[1];

?>

		<!-- Start blog details -->

		<div class="blog-box" style="margin-top:20px;">

			<div class="container">

				<div class="row">

					<div class="col-xl-8 col-lg-8 col-12">

						<div class="blog-inner-details-page">

							<div class="blog-inner-box">

								<div class="side-blog-img">

									<img class="img-fluid" src="<?= $domain ?>assets/practiceSingle/<?= $rows[0]['image_url'] ?>" alt="">

									<div class="date-blog-up">

										<?= $time ?>

									</div>

								</div>

								<div class="inner-blog-detail details-page">

									<h2><?= $rows[0]['title'] ?></h2><br>

									<ul>

										<li><i class="zmdi zmdi-account"></i>Posted By : <span> Admin</span></li>

										<li>|</li>

										<li><i class="zmdi zmdi-time"></i> <i class="fa fa-clock-o" aria-hidden="true"></i> <span><?= $hour ?></span></li>

									</ul>

									<?= $rows[0]['content'] ?>

								</div>

							</div>



						</div>

					</div>



					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 col-12 blog-sidebar">

						<div class="right-side-blog">



							<h3>Ən son Postlar</h3>

							<div class="post-box-blog">

								<div class="recent-post-box">

									<?php

									$query = $conn->prepare('SELECT * FROM practice ORDER BY id DESC');

									$query->execute();

									$rows = $query->fetchall(PDO::FETCH_ASSOC);

									$n = 1;

									foreach($rows as $row)

									{

										$time = explode(" ",$row["created_at"])[0];

										if($n<8)

										{

											?>

									<a href="<?= $domain ?>pages/practiceMore/<?= $row['slug'] ?>">

									<div class="recent-box-blog">

										<div class="recent-img">

											<img style="width: 77px;" class="img-fluid" src="<?= $domain ?>assets/practiceMini/<?= $row["image_url"] ?>" alt="">

										</div>

										<div class="recent-info">

											<ul>

												<li><i class="zmdi zmdi-account"></i>Posted By : <span>Admin</span></li>

												<li>|</li>

												<li><i class="zmdi zmdi-time"></i> <i class="fa fa-clock-o" aria-hidden="true"></i> <span><?= $time ?></span></li>

											</ul>

											<h4><?= $row["title"] ?></h4>

										</div>

									</div>

									</a>

											<?php

											$n++;

										}

										else

										{

											break;

										}

									}

									?>

								</div>

							</div>

						</div>

					</div>



				</div>

			</div>

		</div>

		<!-- End details -->

<?php

	} else {

		?>

        <div class="container" style="width: 90%;">

            <?php include 'soon.php'; ?>

        </div>

        <?php

	}

} else {

	?>

	<div class="container" style="width: 90%;">

		<?php include 'soon.php'; ?>

	</div>

	<?php

}

?>