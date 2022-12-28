
<?php

// 获取 URL 中的锚点部分
$anchor = $_SERVER['QUERY_STRING'];
print "$anchor";
// 获取锚点中的文件名
$filename = "rooms/" . $anchor . ".txt";

// 删除文件
unlink($filename);
file_put_contents($filename, "加密通信链接已激活" . "\n");
//usleep(2000000);
header('Location: index.php');

?>

<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
 </head>
 <body>
<embed height="100" width="100" src="send.mp3" />
  </body>
</html>
