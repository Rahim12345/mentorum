<?php

if (isset($_GET['page']) && htmlspecialchars(trim($_GET['page'])) == 'blog') {

?>

	<!-- Start blog -->

	<div class="blog-box" style="margin-top:20px;">

		<div class="container">

			<div class="row">

				<?php

				$query = $conn->prepare('SELECT * FROM blog ORDER BY id DESC');

				$query->execute();

				$rows = $query->fetchall(PDO::FETCH_ASSOC);

				if (count($rows) != 0) {

					foreach ($rows as $row) {

						$query_editor = $conn->prepare('SELECT * FROM users WHERE id=?');

						$query_editor->execute([$row["editor_id"]]);

						$rows_editor = $query_editor->fetchall(PDO::FETCH_ASSOC);



						$time = explode(" ",$row['created_at']);

				?>

						<div class="col-lg-4 col-md-6 col-12">

							<div class="blog-box-inner">

								<div class="blog-img-box">

									<img class="img-fluid" src="<?= $domain ?>assets/blogMini/<?= $row['image_url'] ?>" alt="Blog şəkli">

								</div>

								<div class="blog-detail">

									<h4><?= $row['title'] ?></h4>

									<ul>

										<li><span>Post by <?= $rows_editor[0]["name"] ?></span></li>

										<li>|</li>

										<li><span><?= $time[0] ?></span></li>

									</ul>

									<?php

									if(mb_strlen($row['content'])<520)

									{

										echo $row['content'];

									}

									else

									{

										echo mb_substr($row['content'],0,520)."...";

									}

									?>

									<a style="color:blue;text-decoration:underline;" href="<?= $domain ?>pages/readMore/<?= $row['slug'] ?>">Ətraflı</a>

								</div>

							</div>

						</div>

				<?php

					}

				} else {

					include 'soon.php';

				}

				?>

			</div>

		</div>

	</div>

	<!-- End blog -->

<?php

} else {

	header("location:./");

}

?>