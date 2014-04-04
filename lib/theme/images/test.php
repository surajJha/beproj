<?php

$filename = array("pic2.jpg", "pic4.jpg");

$link = mysql_connect("localhost", "root", "root");
mysql_select_db("beproj");

/*
  $sql = sprintf("INSERT INTO user
  (id, img)
  VALUES
  ('%d', '%s')", 4, mysql_real_escape_string($imgData)
  );
 */

$c = 0;
for ($i = 4020; $i <= 4258; $i++)
{
    $imgData = file_get_contents($filename[$c]);
//$size = getimagesize($filename[$c]);
    $x = mysql_real_escape_string($imgData);
    $query = "UPDATE `user` SET `image`='{$x}' WHERE user_id='{$i}'";
    //echo $query."<br>";
    mysql_query($query, $link) or die(mysql_error());

    $c = ($c + 1) % 2;
}

//$query = "INSERT INTO photo () values ()";

