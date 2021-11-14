//定义加载区域
$(document).pjax('a[target!=_blank]', '#yield');
//定义pjax有效时间，超过这个时间会整页刷新
$.pjax.defaults.timeout = 1200;
//显示加载动画
$(document).on('pjax:click', function () {
  $("#loading").show();
});
//隐藏加载动画
$(document).on('pjax:end', function () {
  $("#loading").hide();
  loadJs()
});

function loadJs() {
  if (window.location.pathname.indexOf('/topics') != -1) {
    $.getScript("/js/jquery.caret.min.js");
    $.getScript("/js/jquery.atwho.min.js");
    $.getScript("/js/reply.js");
  }
}
