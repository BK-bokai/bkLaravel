$(document).ready(function () {
 
  $('button.edit_mem').on('click',function(){
    let url = $(this).attr('url');
    // alert($(this).attr('url'));
    // window.location.replace(url);  
    window.open(url)
  });

  //刪除使用者
  $('button.del_mem').on('click', function () {


    let user_id = $(this).attr('user-id');
    let url = $(this).attr('url');
    // alert(user_id);
    
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
              id: user_id,
            },
            dataType: 'json',
            success: function (data) {
              swal("確認刪除", "已刪除此留言版", "success")
              $("tbody[user=" + user_id + "]").slideUp()
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



})