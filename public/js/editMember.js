$(document).ready(function () {


  $("input[name=name],input[name=username],input[name=email],select[name=level]").on('keyup change', function () {

    let url = $(this).attr('url');
    let name = $("input[name=name]").val();
    let username = $("input[name=username]").val();
    let email = $("input[name=email]").val();
    let level = $("select[name=level]").val();

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: url,
      data: {
        name: name,
        username:username,
        email: email,
        level: level,
      },
      dataType: 'json',
      success: function (data) {
        console.log(data);
        console.log("ajax success");

        if (data['repeat'] > 0 || data['change'] == 0 || name.length == 0) {
          $("button[type=submit]").addClass('disabled');
        }
        else {
          $("button[type=submit]").removeClass('disabled');
        }
        
        if(data['repeat_name'] > 0)
        {
          $(".js_name_error").html('使用者名稱已註冊');
          $("#name").parent().addClass('errorun');
        }
        else
        {
          $(".js_name_error").html('');
          $("#name").parent().removeClass('errorun');
        }

        if(data['repeat_username'] > 0)
        {
          $(".js_username_error").html('帳號已註冊');
          $("#username").parent().addClass('errorun');
        }
        else
        {
          $(".js_username_error").html('');
          $("#username").parent().removeClass('errorun');
        }

        if(data['repeat_email'] > 0)
        {
          $(".js_email_error").html('信箱已註冊');
          $("#email").parent().addClass('errorun');
        }
        else
        {
          $(".js_email_error").html('');
          $("#email").parent().removeClass('errorun');
        }

      },
      error: function (data) {
        console.log("ajax fail");
      }
    })
  });

})