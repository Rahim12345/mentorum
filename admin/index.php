<?php
ob_start();
session_start();
include '../include/config.php';
include 'IPfunction.php';
$saveVisitors = $conn->prepare("INSERT INTO admin_vistors(ip) VALUES (?)");
$saveVisitors->execute([$adresseip]);
if (isset($_SESSION["id"]) && isset($_SESSION["status"]) && $_SESSION["status"]==1) {
	include 'header.php';
	if (isset($_GET['page'])) {
		$page = htmlspecialchars(trim($_GET['page']));
		if ($page == 'exit') {
			include 'exit.php';
		} elseif ($page == 'shortcut_icon') {
			include 'shortcut_icon.php';
		} elseif ($page == 'title') {
			include 'title.php';
		} elseif ($page == 'description') {
			include 'description.php';
		} elseif ($page == 'keywords') {
			include 'keywords.php';
		} elseif ($page == 'bannerPlus') {
			include 'bannerPlus.php';
		} elseif ($page == 'existBanner') {
			include 'existBanner.php';
		} elseif ($page == 'removeBanner') {
			include 'removeBanner.php';
		} elseif ($page == 'about') {
			include 'about.php';
		} elseif ($page == 'think') {
			include 'think.php';
		} elseif ($page == 'career') {
			include 'career.php';
		} elseif ($page == 'interview') {
			include 'interview.php';
		} elseif ($page == 'tutorial') {
			include 'tutorial.php';
		} elseif ($page == 'removeCareer') {
			include 'remove_career.php';
		} elseif ($page == 'removeInterview') {
			include 'remove_interview.php';
		} elseif ($page == 'removeTutorial') {
			include 'remove_tutorial.php';
		} elseif ($page == 'ebook') {
			include 'ebook.php';
		} elseif ($page == 'practice') {
			include 'practice.php';
		} elseif ($page == 'contact') {
			include 'contact.php';
		} elseif ($page == 'blog') {
			include 'blog.php';
		} else {
			include '404.php';
		}
	} else {
?>
		<p class="btn btn-info" style="min-height: 450px;line-height: 450px;margin-left: 10%;min-width: 80%;font-size: 3vw">
			Burda statistika olacaq
		</p>
<?php
	}
	include 'footer.php';
} else {
	header("location:../");
}
?>