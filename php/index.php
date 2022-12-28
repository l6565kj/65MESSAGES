<?php

session_start();
if ($_POST) {
    $username = htmlspecialchars($_POST['username']);
    $_SESSION['username'] = $username;
    $roomid = htmlspecialchars($_POST['roomid']);
    $_SESSION['roomid'] = $roomid;
}
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $roomid = $_SESSION['roomid'];
} else {
    $username = '匿名用户';
    $roomid = 'Public-Channel';
}

// 如果收到了提交消息的请求
if (isset($_POST['message'])) {
// 获取消息内容
usleep(400000); // 单位是微秒，延时2秒
  $message = trim($_POST['message']);
//判断聊天房间是否已经存在 
    if(!file_exists('rooms/' . $roomid . '.txt')){
//聊天房间不存在-新建通信
        file_put_contents('rooms/' . $roomid . '.txt', "加密通信链接" . "\n");
    }else{
//聊天房间存在
    }

  // 如果消息不为空
  if ($message !== '') {
    // 读取原有的消息
    $messages = file_get_contents('rooms/' . $roomid . '.txt');

    // 把新消息添加到原有消息的末尾
    $messages .= date( "h:i "). $username . ': ' . $message . "\n";
    
    // 把消息写入文件
file_put_contents('rooms/' . $roomid . '.txt', $messages);
}
}


$ip = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://'; 
if ($ip = "https://") {
   $ip ="SSL已链接";
} else {
    $ip ="不可靠链接";
}


// 读取消息文件
$messages = file_get_contents('rooms/' . $roomid . '.txt');

// 把消息按行分割成数组
$messages = explode("\n", $messages);

// 从数组中取出最后 10 条消息
$messages = array_slice($messages, -16);

// 把消息数组转换成 HTML 列表
$messages = '<ul><li>' . implode('</li><li>', $messages) . '</li></ul>';

$br = '</br>';

?>

<!DOCTYPE html>
<html>
<head>
<title>65MESSAGES</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />


<!--适用APPLE浏览器兼容-->
<meta content="yes" name="apple-touch-fullscreen">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <link id="J_desktopIcon" sizes="114x114" rel="apple-touch-icon-precomposed" href="image.jpeg">
        <!--适用于 Retina 屏的 iPad-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-precomposed-144x144.png"/>
    <!--适用于 Retina 屏的 iPhone-->
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-precomposed-120x120.png"/>
    <!--适用于非 Retina 屏的 iPad-->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-precomposed-72x72.png"/>
    <!--适用于非 Retina 屏的 iPhone-->
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed-57x57.png"/>
<!--适用APPLE浏览器兼容-->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="App Loction Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script>
//-----------------------------------音频绑定行为驱动部分js脚本-----------------------------
  function sleep(delay) {
  var start = (new Date()).getTime();
  while ((new Date()).getTime() - start < delay) {
    continue;
  }
}
  
  function playAudio() {
    var audio = document.getElementById("sendAudio");
    audio.play();
  }
  
    function powermsg() {
    var audio = document.getElementById("powerAudio");
    audio.play();
    sleep(1000);
    window.location.href="powermsg.php?" + '<?php echo $roomid?>';
  }
  
  function delayURL(url, time) {
  setTimeout("top.location.href = '" + url + "'", time);
	}
  function delmsg() {
      var x;
	var r=confirm("销毁信息后通信内容将在所有相关设备删除且不可撤销，确定删除?");
	if (r==true){
	    //确认执行删除
	var audio = document.getElementById("delAudio");
    audio.play();
    sleep(1000);
    window.location.href="delete.php?" + '<?php echo $roomid?>';
	}
	else{
		 //撤销删除
	}

    
  }
  	
//-----------------------------------音频绑定行为驱动部分js脚本-----------------------------	
</script>
<style>

input[type="text1"] {
  background-color: #2a2c36;
  color: #9092a1;
}
input[type="msg1"] {
  background-color: #2a2c36;
  color: #9092a1;
  float:left;
}
</style>
<!--引用css格式-->
<link href='#css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--开始核心代码-->
</head>
<body>
<div class="app-location" style="padding-top: 0px;">
<h5 style="color: #080c22;">截图溯源水印<?php echo $username; ?>-<?php echo $ip; ?></h5>
<!--大logo按钮-->
<div align="center"><br><a onclick="powermsg()" href="#powermsg.php?<?php echo $roomid?>"><img src="logo.png" width=60% height=60% /></div></a></br>
<!--<div class="location"><img src="images/location.png" class="img-responsive" alt="" /></div>-->
<form method="post" action="">
<font style="color: #797b85;">您的加密聊天用户名</font></br>
<input type="text1" name="username" id="username" value="<?php echo $username; ?>" class="text1"></br>
<font style="color: #797b85;">Connect-ID</font></br>
<input type="text1" name="roomid" id="roomid" value="<?php echo $roomid; ?>" class="text1">
    </br>
  <!--  <h2>Welcome to 六五简讯</h2><div class="line"><span></span></div></br>-->
</br><div class="line"><span></span></div></br>
   <h5 text-align:left style="color: #f3fff6;" id="messages" ><?php echo $messages; ?></h5>

		
     </br><font style="color: #111528;">在下方输入您要发送的信息</font>
    <input type="text" name="message" id="message">
    <br>
    <input type="submit" value="发送/Send" onclick="playAudio()">

  </form>
  
<!--全部删除按钮-->
</br><a  style="color: #f05757;"  onclick="delmsg()" href="#" >销毁所有当前信息</a>
  
<!--音频模块--> 
<audio id="sendAudio">
<source src="send.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<audio id="delAudio">
<source src="delmsg.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<audio id="incomeAudio">
<source src="incomemsg.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<audio id="powerAudio">
<source src="powermsg.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>
<!--列表测试代码块------------------------------------------>





<!--列表测试代码块------------------------------------------>
<!--start-copyright-->
<div class="copy-right">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<a  style="color: #1b1d27;" href="https://6565kj.com/office/" onClick="return confirm('信息加密功能仅对内部成员开放，移动到办公中心？');">6565TECHNOLOGY.All rights reserved</a>
<div align="center"><br><a href="#"><img src="cyber.png" width=95% height=95% /></div></a></br>
		</div>
<!--//end-copyright-->
<script>



// 轮询消息列表，检查是否有新消息
setInterval(function() {
// 发送 AJAX 请求
var xhr = new XMLHttpRequest();
xhr.open('GET','rooms/' + '<?php echo $roomid?>' + '.txt?t=' + Date.now());
xhr.onload = function() {
    
// 如果消息列表发生了变化
   if (xhr.responseText !== getdata) {
   // 更新消息列表
   var getdata = xhr.responseText;
//判断区域---------------------------------------------------------------
if (document.getElementById('messages').innerText == getdata) {
  console.log('没有新消息');
} else {
  console.log('收到新消息'+getdata);
  document.getElementById('messages').innerText = getdata;
  var audio = document.getElementById("incomeAudio");
    audio.play();
  
}

 
//判断区域-----------------------------------------------------------------------------   -------
   //alert(document.getElementById('messages'));
   //alert(getdata)
   
   
    }
      };
      xhr.send();
    }, 1000);

  </script>
</body>
</html>
