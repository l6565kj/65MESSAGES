$(document).ready(function() {
  // 获取聊天记录
  function getMessages() {
    $.ajax({
      url: 'chat.php',
      success: function(data) {
        // 将消息数组转换为字符串
        var messages = data.join('');
        // 更新聊天记录
        $('#messages').html(messages);
      }
    });
  }

  // 轮询获取聊天记录
  setInterval(getMessages, 1000);

  // 处
