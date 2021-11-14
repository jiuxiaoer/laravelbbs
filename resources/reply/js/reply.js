$(document).ready(function() {
  $('.huifu').click(function() {
    $('#reply_'+$(this).attr("id")).show()
    if ($(this).attr("name")!==undefined){
      $('#reply_'+$(this).attr("id")+'_content').html('<a style="color: #0d8ddb" href="/users/'+$(this).attr("user_id")+'" target="_blank">'+'@'+$(this).attr("name")+'</a>'+"&nbsp;")
    }else {
      $('#reply_'+$(this).attr("id")+'_content').html('')
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
function check(form) {
  $('#'+$(form).attr("id")+'_textarea').html($('#'+$(form).attr("id")+'_content').html())
}
