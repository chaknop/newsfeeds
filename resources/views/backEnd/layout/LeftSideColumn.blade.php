 <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('images/user/'.Auth::User()->image) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::User()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ URL::to('admin/dashboard ') }}"><i class="fa fa-dashboard"></i> <span>Dasdoard</span></a></li>
       
        <li class="treeview">
          <!--
          <a href="#"><i class="fa fa-files-o"></i> <span>Crud Pots</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          -->
          <ul class="treeview-menu">
            <!--
            <li><a href="{{route('post.index')}}"">MainController Pots</a></li>
            <li><a href="{{route('post.index') }}"">JSONController Pots</a></li>
            -->
          </ul>
        </li>
         <li ><a href="{{route('article.index') }}"><i class="glyphicon glyphicon-pencil"></i> <span>Articles </span></a></li>
         @can('posts.category',Auth::user())
         <li class="{{active_menu(Route::currentRouteName(),'category',0,8)}}"><a href="{{route('category.index') }}"><i class="glyphicon glyphicon-list"></i> <span>Categories</span></a></li>
         @endcan
         <li class="{{active_menu(Route::currentRouteName(),'sub_category',0,4)}}"><a href="{{route('sub_category.index') }}"><i class="glyphicon glyphicon-list-alt"></i> <span>Sub Categories</span></a></li>

         @can('posts.tag',Auth::user())
          <li><a href="{{route('tag.index') }}"><i class="glyphicon glyphicon-tag"></i> <span>Tags</span></a></li>
          @endcan

          @can('posts.user',Auth::user())
          <li><a href="{{route('user.index') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
          @endcan

          @can('posts.role',Auth::user())
          <li><a href="{{route('role.index') }}"><i class="glyphicon glyphicon-registration-mark"></i> <span>Roles</span></a></li>
          @endcan

          @can('posts.permission',Auth::user())
          <li><a href="{{route('permission.index') }}"><i class="glyphicon glyphicon-eye-open"></i> <span>Permissions</span></a></li>
          @endcan
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
