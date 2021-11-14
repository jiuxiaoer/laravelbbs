 $(document).ready(function() {
  $('.huifu').click(function() {
    $('#reply_'+$(this).attr("id")).show()
    if ($(this).attr("name")!==undefined){
      $('#reply_'+$(this).attr("id")+'_content').attr('value','@'+$(this).attr("name")+" ")
    }else {
      $('#reply_'+$(this).attr("id")+'_content').attr('value','')
    }
  })
  $('.form-control').atwho({
  at: "@",
  callbacks: {
  remoteFilter: function(query, callback) {
  $.getJSON("/usersjson", {q: query}, function(data) {
  callback(data)
});
}
}
});
});
