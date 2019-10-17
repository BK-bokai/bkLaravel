$(document).ready(function () {

  $('button#index_submit').on('click', function () {
    let index_content_one = $("textarea[name='index_content_one']").val();
    let index_content_two = $("textarea[name='index_content_two']").val();
    let student_content = $("textarea[name='student_content']").val();
    let worker_content = $("textarea[name='worker_content']").val();
    let url = $(this).attr('url');
    // alert(url);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "PUT",
      url: url,
      data: {
        index_content_one: index_content_one,
        index_content_two: index_content_two,
        student_content: student_content,
        worker_content: worker_content,
      },
      dataType: 'json',
      success: function (data) {
        console.log(data);
        console.log("ajax success");
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.responseText);
      }
    })

  })
})