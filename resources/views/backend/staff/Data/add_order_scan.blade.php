@extends('backend/staff/staff_master')
@section('staff')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-wrapper">
<div class="page-content">
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
<div class="breadcrumb-title pe-3">Add Scan Data</div>
<div class="ps-3">
<nav aria-label="breadcrumb">
<ol class="breadcrumb mb-0 p-0">
<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
</li>
<li class="breadcrumb-item active" aria-current="page">Add Scan Data</li>
</ol>
</nav>
</div>

</div>
<!--end breadcrumb-->
<div class="container">
<div class="main-body">
<div class="row">



<div class="col-lg-8">
    <form method="post" action="{{route('order.store')}}" enctype="multipart/form-data">
        @csrf
<div class="card">
<div class="card-body">
<div class="row mb-3">
<div class="col-sm-3">
<h6 class="mb-0">Add File</h6>
</div>

<div class="mb-3">
<label for="formFile" class="form-label">Add Data</label>

<input class="form-control" name="scan" type="file" id="image">
</div>

<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-9 text-secondary">
<input type="submit" class="btn btn-primary px-4" value="Add Data"/>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection