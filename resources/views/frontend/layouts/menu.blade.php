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
            <li><a href="{{url('login')}}">首頁</a></li>
            <li><a href="{{url('admin/img')}}">照片</a></li>
            <li><a href="{{url('admin/work')}}">作品集</a></li>
            <li><a href="{{url('admin/member')}}">會員登入</a></li>
         </ul>
      </div>
      <ul class="sidenav" id="mobile-demo">
         <li><a href="{{url('login')}}">首頁</a></li>
         <li><a href="{{url('admin/img')}}">照片</a></li>
         <li><a href="{{url('admin/work')}}">作品集</a></li>
         <li><a href="{{url('admin/member')}}">會員登入</a></li>
      </ul>
   </nav>
</header>