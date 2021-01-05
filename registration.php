<?php
if($index_value == "true")
{
    $link = $domain.'registration/';
    header("location: $link");
}
else
{
    header("location:./");
}
?>