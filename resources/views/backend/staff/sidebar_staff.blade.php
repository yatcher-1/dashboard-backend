<div class="sidebar-wrapper" data-simplebar="true">
<div class="sidebar-header">
<div>
<img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
</div>
<div>
<h4 class="logo-text">Staff Dashboard</h4>
</div>
<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
</div>
</div>
<!--navigation-->
<ul class="metismenu" id="menu">
<li>
<a href="{{route('staff.dash')}}">
<div class="parent-icon"><i class='bx bx-home-circle'></i>
</div>
<div class="menu-title">Dashboard</div>
</a>
</li>

<li class="menu-label">Portal Management</li>
<li>
<a href="javascript:;" class="has-arrow">
<div class="parent-icon"><i class='bx bx-cart'></i>
</div>

<div class="menu-title">Portals</div>
</a>
<ul>

<li> <a href="{{route('all.portal')}}"><i class="bx bx-right-arrow-alt"></i>All Portal</a>
</li>

<li> <a href="{{route('add.portal')}}"><i class="bx bx-right-arrow-alt"></i>Add Portal</a>
</li>

</ul>
</li>

<li class="menu-label">Party Management</li>
<li>
<a href="javascript:;" class="has-arrow">
<div class="parent-icon"><i class='bx bx-cart'></i>
</div>

<div class="menu-title">Firm</div>
</a>
<ul>

<li> <a href="{{route('all.party')}}"><i class="bx bx-right-arrow-alt"></i>All Firm</a>
</li>

<li> <a href="{{route('add.party')}}"><i class="bx bx-right-arrow-alt"></i>Add Firm</a>
</li>

</ul>
</li>

<li>
<a href="javascript:;" class="has-arrow">
<div class="parent-icon"><i class='bx bx-cart'></i>
</div>

<div class="menu-title">Sub-Firm</div>
</a>
<ul>

<li> <a href="{{route('all.subparty')}}"><i class="bx bx-right-arrow-alt"></i>All Sub-Firm</a>
</li>

<li> <a href="{{route('add.subparty')}}"><i class="bx bx-right-arrow-alt"></i>Add Sub-Firm</a>
</li>

</ul>
</li>

<li class="menu-label">Scanning Management</li>
<li>
<a href="javascript:;" class="has-arrow">
<div class="parent-icon"><i class='bx bx-cart'></i>
</div>

<div class="menu-title">Order</div>
</a>
<ul>

<li> <a href="{{route('view.scan')}}"><i class="bx bx-right-arrow-alt"></i>Order Scanning Data</a>
</li>

<li> <a href="{{route('order.scan')}}"><i class="bx bx-right-arrow-alt"></i>Add Order Data</a>
</li>

</ul>
</li>

<li>
<a href="javascript:;" class="has-arrow">
<div class="parent-icon"><i class='bx bx-cart'></i>
</div>

<div class="menu-title">Return</div>
</a>
<ul>

<li> <a href="{{route('view.return.scan')}}"><i class="bx bx-right-arrow-alt"></i>Return Scanning Data</a>
</li>

<li> <a href="{{route('return.scan')}}"><i class="bx bx-right-arrow-alt"></i>Add Return Data</a>
</li>

</ul>
</li>

<li class="menu-label">Review & Rating</li>
<li>
<a href="/">
<div class="parent-icon"><i class='bx bx-donate-blood'></i>
</div>
<div class="menu-title">NQD</div>
</a>
</li>

<li>
<a href="/">
<div class="parent-icon"><i class='bx bx-donate-blood'></i>
</div>
<div class="menu-title">Visibility</div>
</a>
</li>

<li>
<a href="/">
<div class="parent-icon"><i class='bx bx-donate-blood'></i>
</div>
<div class="menu-title">Data-set</div>
</a>
</li>




<li class="menu-label">Reports Party Wise</li>
<li>
<a href="/">
<div class="parent-icon"><i class='bx bx-donate-blood'></i>
</div>
<div class="menu-title">Inventory</div>
</a>
</li>

<li>
<a href="/">
<div class="parent-icon"><i class='bx bx-donate-blood'></i>
</div>
<div class="menu-title">GSTR</div>
</a>
</li>

<li>
<a href="/">
<div class="parent-icon"><i class='bx bx-donate-blood'></i>
</div>
<div class="menu-title">Summary Reports</div>
</a>
</li>

<!--end navigation-->
</div>