$(document).ready(function () {

  $("input[name=name]").on('keyup', function () {
    let url = $(this).attr('url');
    // alert($(this).attr('url'));
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: url,
      data: {
        name: $(this).val(),
      },
      dataType: 'json',
      success: function (data) {
        console.log(data);
        console.log("ajax success");
      },
      error: function (data) {
        console.log("ajax fail");
      }
    })
  });

  $("input[name=username]").on('keyup', function () {
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
      },
      error: function (data) {
        console.log("ajax fail");
      }
    })
  });

  $("input[name=email]").on('keyup', function () {
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
      },
      error: function (data) {
        console.log("ajax fail");
      }
    })
  });



})