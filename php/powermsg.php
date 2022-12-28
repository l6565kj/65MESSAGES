<?php

// 获取 URL 中的锚点部分
$anchor = $_SERVER['QUERY_STRING'];
print "$anchor";
// 获取锚点中的文件名
$filename = "rooms/" . $anchor . ".txt";

// 更新文件
 // 读取原有的消息
$messages = file_get_contents('rooms/' . $anchor . '.txt');

// 把新消息添加到原有消息的末尾
$messages .= '------加强型通知消息------' . "\n";
    
// 把消息写入文件
file_put_contents('rooms/' . $anchor . '.txt', $messages);
header('Location: index.php');

?>