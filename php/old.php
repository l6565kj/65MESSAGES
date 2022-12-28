<?php

session_start();
if ($_POST) {
    $username = htmlspecialchars($_POST['username']);
    $_SESSION['username'] = $username;
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = '';
}

// 如果收到了提交消息的请求
if (isset($_POST['message'])) {
  // 获取消息内容
  $message = trim($_POST['message']);

  // 如果消息不为空
  if ($message !== '') {
    // 设置用户名 cookie


    // 读取原有的消息
    $messages = file_get_contents('msg.txt');

    // 把新消息添加到原有消息的末尾
    $messages .= $username . ': ' . $message . "\n";
    
    // 把消息写入文件
file_put_contents('msg.txt', $messages);
}
}





if (isset($_POST['删除通信记录'])) {
  file_put_contents('msg.txt', '');
  print '这是另一条信息';
}

// 读取消息文件
$messages = file_get_contents('msg.txt');

// 把消息按行分割成数组
$messages = explode("\n", $messages);

// 从数组中取出最后 10 条消息
$messages = array_slice($messages, -20);

// 把消息数组转换成 HTML 列表
$messages = '<ul><li>' . implode('</li><li>', $messages) . '</li></ul>';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>六五简讯</title>
</head>
<body>
  <h1>六五简讯V0.5</h1>
  <form method="post" action="">
    <label for="username">用户名:</label>
    <input type="text" name="username" id="username" value="<?php echo $username; ?>">
    <br>
    <label for="message">消息:</label>
    <input type="text" name="message" id="message">
    <br>
    <input type="submit" value="发送">
  </form>
  
<a href="delete.php"><button>删除通信记录</button></a>

  <h2>消息列表</h2>
  <h5><?php echo $messages; ?></h5>
<h2>数据缓冲区</h2>
  <div id="messages"><?php echo $messages; ?></div>
<h2>信息缓冲区</h2>
<h5><?php echo $message; ?></h5>
  <script>
    // 轮询消息列表，检查是否有新消息
    setInterval(function() {
      // 发送 AJAX 请求
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'msg.txt?t=' + Date.now());
      
      xhr.onload = function() {
        // 如果消息列表发生了变化
        if (xhr.responseText !== document.getElementById('messages').innerHTML) {
          // 更新消息列表
          
          document.getElementById('messages').innerHTML = xhr.responseText;
          
          
          
        }
      };
      xhr.send();
    }, 1000);
  </script>
</body>
</html>