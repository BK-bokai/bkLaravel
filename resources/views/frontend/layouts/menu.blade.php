<header>

   <nav class="nav-extended menu">
      <div class="nav-wrapper">
         <a href="#" class="center brand-logo">
            <div>
               <i class="large material-icons">account_circle</i>
               BK-home
            </div>
         </a>
         <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
         <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{url('login')}}">前台首頁</a></li>
            <li><a href="{{url('admin/')}}">編輯首頁</a></li>
            <li><a href="{{url('admin/img')}}">編輯照片</a></li>
            <li><a href="{{url('admin/work')}}">編輯作品集</a></li>
            <li><a href="{{url('admin/member')}}">會員管理</a></li>
            <li><a href="../php/logout.php">登出</a></li>
         </ul>
      </div>
      <ul class="sidenav" id="mobile-demo">
         <li><a href="index.php">首頁</a></li>
         <li><a href="images.php">照片清單</a></li>
         <li><a href="work.php">作品集</a></li>
         <li><a href="login.php">會員登入</a></li>
         <li><a href="member.php">會員申請</a></li>
      </ul>
   </nav>
</header>