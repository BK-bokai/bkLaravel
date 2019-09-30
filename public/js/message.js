
$(document).ready(function () {
  $(".msg-func").on('click', function () {
    // alert($(this).attr('data-id'));
    // alert($(this).attr('msgId'));

    // $(".reply-form").toggle(500);
    $("form[msgId="+$(this).attr('msgId')+"]").toggle(500);
  })
})