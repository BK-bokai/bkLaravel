
$(document).ready(function () {
  $(".msg-func").on('click', function () {
    // alert($(this).attr('data-id'));
    // alert($(this).attr('msgId'));

    // $(".reply-form").toggle(500);
    $("form[msgId=" + $(this).attr('msgId') + "]").toggle(500);
  })

  $('.msgDel').on('click', function () {

    let msgid = $(this).attr('msgId');
    let url = $(this).attr('url');

    swal({
      title: "Are you sure?",
      text: "你確定要刪除嗎?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, 確認刪除!",
      cancelButtonText: "No, 取消動作!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            // url: '{{url("admin/img")}}'+ '/' + $(this).attr('data-id'),
            url: url,
            data: {
              id: msgid,
            },
            dataType: 'html',
            success: function (data) {
              swal("確認刪除", "已刪除此留言版", "success")
              $("div[msg=message" + msgid + "]").slideUp(3000)
              console.log(data);
              console.log("ajax success");
            }
          })
        }
        else {
          swal("取消動作", "已取消剛剛請求！", "success")
        }
      });
  })


  $('.msgEdit').on('click', function () {

    let msgid = $(this).attr('msgId');
    let url = $(this).attr('url');
    let form = $('#edit').children();
    let contain = $("div[msgcontain=" + msgid + "]").html();
    let editarea = $("div[msgcontain=" + msgid + "]").html(form);

    $('#textarea1').val(contain.trim());
    $("#msgEdit").on('click', function () {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "PUT",
        url: url,
        data: {
          id: msgid,
          body: $('#textarea1').val()
        },
        dataType: 'html',
        success: function (data) {
          $("div[msgcontain=" + msgid + "]").html($('#textarea1').val())
          // $("div[msg=message" + msgid + "]").slideUp(3000)
          console.log(data);
          console.log("ajax success");
        }
      })
    })

  })



  $('.replyDel').on('click', function () {

    let replyid = $(this).attr('replyId');
    let url = $(this).attr('url');
    // alert(replyid);
    // alert(url);

    swal({
      title: "Are you sure?",
      text: "你確定要刪除嗎?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, 確認刪除!",
      cancelButtonText: "No, 取消動作!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
      function (isConfirm) {
        if (isConfirm) {
          $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            url: url,
            data: {
              id: replyid,
            },
            dataType: 'html',
            success: function (data) {
              swal("確認刪除", "已刪除此留言", "success")
              $("div[reply=reply" + replyid + "]").slideUp(3000)
              console.log(data);
              console.log("ajax success");
            }
          })
        }
        else {
          swal("取消動作", "已取消剛剛請求！", "success")
        }
      });
  })


  $('.replyEdit').on('click', function () {

    let replyid = $(this).attr('replyId');
    let url = $(this).attr('url');
    // alert(replyid);
    // alert(url);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "PUT",
      url: url,
      data: {
        id: replyid,
      },
      dataType: 'html',
      success: function (data) {
        console.log(data);
        console.log("ajax success");
      }
    })


  })

})