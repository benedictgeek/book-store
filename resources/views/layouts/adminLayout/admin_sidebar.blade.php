<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>

  <?php $url = url()->current(); ?>
    
    <li @if(preg_match("/dashboard/", $url)) class="active" @endif><a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li  class="submenu"><a href="#"><i class="icon icon-home"></i> <span>Profile</span><span class="label label-important"></span></a>
        <ul @if(preg_match("/profile/", $url)) style="display: block;" @endif>
          <li @if(preg_match("/view-profile/", $url)) class="active" @endif><a href="{{url('/author/view-profile')}}">View Profile</a></li>
          <li @if(preg_match("/edit-profile/", $url)) class="active" @endif><a href="{{url('/author/edit-profile')}}">Edit Profile</a></li>
        </ul>
    </li>
    @if(Auth::guard('admin')->user()->type == 'author')
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Books</span> <span class="label label-important"></span></a>
      <ul @if(preg_match("/book/", $url)) style="display: block;" @endif>
        <li @if(preg_match("/add-book/", $url)) class="active" @endif><a href="{{url('/author/add-book')}}">List a book</a></li>
        <li @if(preg_match("/my-books/", $url)) class="active" @endif><a href="{{url('/author/my-books')}}">My Books</a></li>
      </ul>
    </li>
    @endif
    @if(Auth::guard('admin')->user()->type == 'admin')
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important"></span></a>
      <ul @if(preg_match("/category/", $url)) style="display: block;" @endif>
        <li @if(preg_match("/add-category/", $url)) class="active" @endif><a href="{{url('/admin/add-category')}}">Add Category</a></li>
        <li @if(preg_match("/view-categories/", $url)) class="active" @endif><a href="{{url('/admin/view-categories')}}">View Categories</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Store</span> <span class="label label-important"></span></a>
      <ul @if(preg_match("/library/", $url)) style="display: block;" @endif>
        <li @if(preg_match("/view-library/", $url)) class="active" @endif><a href="{{url('/admin/view-library')}}">All Books</a></li>
        <li @if(preg_match("/pending-library/", $url)) class="active" @endif><a href="{{url('/admin/pending-library')}}">Pending Books</a></li>
        <li @if(preg_match("/rejected-library/", $url)) class="active" @endif><a href="{{url('/admin/rejected-library')}}">Rejected</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span> <span class="label label-important"></span></a>
      <ul @if(preg_match("/coupon/", $url)) style="display: block;" @endif>
        <li @if(preg_match("/add-coupon/", $url)) class="active" @endif><a href="{{url('/admin/add-coupon')}}">Add Coupon</a></li>
        <li @if(preg_match("/view-coupons/", $url)) class="active" @endif><a href="{{url('/admin/view-coupons')}}">View Coupons</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span> <span class="label label-important"></span></a>
      <ul @if(preg_match("/orders/", $url)) style="display: block;" @endif>
        <li @if(preg_match("/view-orders/", $url)) class="active" @endif><a href="{{url('/admin/view-orders')}}">View Orders</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important"></span></a>
      <ul @if(preg_match("/users/", $url)) style="display: block;" @endif>
        <li @if(preg_match("/view-users/", $url)) class="active" @endif><a href="{{url('/admin/view-users')}}">View Users</a></li>
      </ul>
    </li>
    <!-- <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Banners</span> <span class="label label-important"></span></a>
      <ul @if(preg_match("/banner/", $url)) style="display: block;" @endif>
        <li @if(preg_match("/add-banner/", $url)) class="active" @endif><a href="{{url('/admin/add-banner')}}">Add Banner</a></li>
        <li @if(preg_match("/view-banners/", $url)) class="active" @endif><a href="{{url('/admin/view-banners')}}">View Banners</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Cms Pages</span> <span class="label label-important"></span></a>
      <ul @if(preg_match("/cms/", $url)) style="display: block;" @endif>
        <li @if(preg_match("/add-cms/", $url)) class="active" @endif><a href="{{url('/admin/add-cms')}}">Add Cms</a></li>
        <li @if(preg_match("/view-cms/", $url)) class="active" @endif><a href="{{url('/admin/view-cms')}}">View Cms Pages</a></li>
      </ul>
    </li> -->
    @endif
  </ul>
</div>
<!--sidebar-menu-->