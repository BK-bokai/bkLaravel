$(document).ready(function () {


  $("input[name=name]").on('keyup', function () {

    let url = $(this).attr('url');
    let name = $(this).val()

    // alert($(this).attr('url'));
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: url,
      data: {
        name: name,
      },
      dataType: 'json',
      success: function (data) {
        console.log(data);
        console.log("ajax success");

        if (data['repeat'] > 0 || data['change'] == 0 || name.length == 0) {
          $("button[type=submit]").addClass('disabled');

          if (data['repeat'] > 0) {
            $("#name").parent().addClass('errorun');
            alert('使用者名稱已註冊');
          }
          else
          {
            $("#name").parent().removeClass('errorun');
          }
        }
        else {
          $("#name").parent().removeClass('errorun');
          $("button[type=submit]").removeClass('disabled');
        }
      },
      error: function (data) {
        console.log("ajax fail");
      }
    })
  });

  $("input[name=username]").on('keyup', function () {
    $("button[type=submit]").addClass('disabled');
    let url = $(this).attr('url');
    // alert($(this).attr('url'));
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: url,
      data: {
        username: $(this).val(),
      },
      dataType: 'json',
      success: function (data) {
        console.log(data);
        console.log("ajax success");
        if (data['repeat'] > 0 || data['change'] == 0) {
          $("button[type=submit]").addClass('disabled');

          if (data['repeat'] > 0) {
            $("#username").parent().addClass('errorun');
            alert('帳號已註冊');
          }
          else
          {
            $("#username").parent().removeClass('errorun');
          }
        }
        else {
          $("#username").parent().removeClass('errorun');
          $("button[type=submit]").removeClass('disabled');
        }
      },
      error: function (data) {
        console.log("ajax fail");
      }
    })
  });

  $("input[name=email]").on('keyup', function () {
    $("button[type=submit]").addClass('disabled');
    let url = $(this).attr('url');
    // alert($(this).attr('url'));
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: url,
      data: {
        email: $(this).val(),
      },
      dataType: 'json',
      success: function (data) {
        console.log(data);
        console.log("ajax success");
        if (data['repeat'] > 0 || data['change'] == 0) {
          $("button[type=submit]").addClass('disabled');

          if (data['repeat'] > 0) {
            $("#email").parent().addClass('errorun');
            alert('使用者名稱已註冊');
          }
          else
          {
            $("#email").parent().removeClass('errorun');
          }
        }
        else {
          $("#email").parent().removeClass('errorun');
          $("button[type=submit]").removeClass('disabled');
        }
      },
      error: function (data) {
        console.log("ajax fail");
      }
    })
  });

  // if( name && username && email)
  // {
  //   $("button[type=submit]").removeClass('disabled');
  // }



})