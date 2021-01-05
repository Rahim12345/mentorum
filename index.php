<?php

ob_start();

session_start();

include 'include/config.php';

include 'include/IPfunction.php';

$saveVisitors = $conn->prepare("INSERT INTO visitors(ip,user_agent,realTime) VALUES (?,?,?)");

$saveVisitors->execute([$adresseip,$_SERVER['HTTP_USER_AGENT'],date("d.m.Y H:i:s")]);

$domain         = './';
$style          = 'border-bottom: 3px solid green';

$style_index    = '';

$style_about    = '';

$style_progress = '';

$style_mentors  = '';

$style_contact  = '';

$style_blog     = '';

$index          = '';

$about          = '';

$progress       = '';

$mentors        = '';

$contact        = '';

$blog           = '';

$guestsPage     = '';

$editPage       = '';

$cvSendPage     = '';

if (isset($_GET['page'])) {

    $page             = htmlspecialchars(trim($_GET['page']));

    if ($page == 'about') {

        $about          = 'active';

        $style_about    = $style;

    } elseif ($page == 'progress' || $page == 'career' || $page == 'interview' || $page == 'tutorial' || $page == 'ebook' || $page == 'practice') {

        $progress       = 'active';

        $style_progress = $style;

    } elseif ($page == 'mentors') {

        $mentors        = 'active';

        $style_mentors  = $style;

    } elseif ($page == 'contact') {

        $contact        = 'active';

        $style_contact  = $style;

    } elseif ($page == 'blog') {

        $blog           = 'active';

        $style_blog     = $style;

    } elseif ($page == 'readMore') {

        $blog           = 'active';

        $style_blog     = $style;

    } elseif ($page == 'guests') {

        $guestsPage     = 'active';

    } elseif ($page == 'edit') {

        $editPage       = 'active';

    } elseif ($page == 'cvSend') {

        $cvSendPage     = 'active';

    } else {

        $index          = 'active';

        $style_index    = $style;

    }

} else {

    $index              = 'active';

    $style_index        = $style;

}



$index_value = "true";





include 'header.php';

if (isset($_GET['page'])) {

    $page             = htmlspecialchars(trim($_GET['page']));

    if ($page == 'exit') {

        include 'exit.php';

    } elseif ($page == 'about') {

        include 'about.php';

    } elseif ($page == 'progress') {

        include 'progress.php';

    } elseif ($page == 'career') {

        include 'career.php';

    } elseif ($page == 'interview') {

        include 'interview.php';

    } elseif ($page == 'tutorial') {

        include 'tutorial.php';

    } elseif ($page == 'ebook') {

        include 'ebook.php';

    } elseif ($page == 'practice') {

        include 'practice.php';

    } elseif ($page == 'registration') {

        include 'registration.php';

    } elseif ($page == 'mentors') {

        include 'mentors.php';

    } elseif ($page == 'profile') {

        include 'profile.php';

    } elseif ($page == 'guests') {

        include 'guests.php';

    } elseif ($page == 'profileBrow') {

        include 'profile_brow.php';

    } elseif ($page == 'edit') {

        include 'edit.php';

    } elseif ($page == 'contact') {

        include 'contact.php';

    } elseif ($page == 'blog') {

        include 'blog.php';

    } elseif ($page == 'cvSend') {

        include 'cv_send.php';

    } elseif ($page == 'readMore') {

        include 'blog_more.php';

    } elseif ($page == 'practiceMore') {

        include 'practice_more.php';

    } else {

        include '404.php';

    }

} else {

    include 'home_banner.php';

    include 'home_about_us.php';

    include 'home_mentors.php';

}



include 'footer.php';

