/* 

DATABSE---------
CREATE TABLE `pageview` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `page` text NOT NULL,
 `userip` text NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1


// totalview

CREATE TABLE `totalview` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `page` text NOT NULL,
 `totalvisit` text NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1
*/



<?php
  $host="localhost";
  $username="root";
  $password="";
  $databasename="my_db";

  $connect=mysql_connect($host,$username,$password);
  $db=mysql_select_db($databasename);

  // gets the user IP Address
  $user_ip=$_SERVER['REMOTE_ADDR'];

  $check_ip = mysql_query("select userip from pageview where page='yourpage' and userip='$user_ip'");
  if(mysql_num_rows($check_ip)>=1)
  {
	
  }
  else
  {
    $insertview = mysql_query("insert into pageview values('','yourpage','$user_ip')");
	$updateview = mysql_query("update totalview set totalvisit = totalvisit+1 where page='yourpage' ");
  }
?>

<html>
<head>
</head>

<body>
  <?php
    $stmt = mysql_query("select totalvisit from totalview where page='yourpage' ");
  ?>

  <p>This page is viewed <?php echo mysql_num_rows($stmt);?> times.</p>

</body>
</html>