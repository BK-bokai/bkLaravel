
$(document).ready(function () {
  $('.sidenav').sidenav();

  // $("form.del_img").on("submit", function() {
  //   return confirm("Are you sure?");
  // });



  $("input[name=index_img]").on('change', function () {
    let image = $(this).val();
    let url = $(this).attr('url');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      // url: '{{url("admin/img")}}'+ '/' + $(this).attr('data-id'),
      url: url,
      dataType: 'json',
      success: function(data) {
        if(data['change']==1)
        {
          $("button[type=submit]").removeClass('disabled');
        }
        else
        {
          $("button[type=submit]").addClass('disabled');
        }
        console.log(data);
        console.log("ajax success");
      }
    })
  })



})