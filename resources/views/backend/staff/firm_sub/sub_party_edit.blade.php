@extends('backend/staff/staff_master')
@section('staff')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-wrapper">
<div class="page-content">
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
<div class="breadcrumb-title pe-3">Add Sub-Firm</div>
<div class="ps-3">
<nav aria-label="breadcrumb">
<ol class="breadcrumb mb-0 p-0">
<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
</li>
<li class="breadcrumb-item active" aria-current="page">Add Sub-Firm</li>
</ol>
</nav>
</div>

</div>
<!--end breadcrumb-->
<div class="container">
<div class="main-body">
<div class="row">
<div class="col-lg-8">
    <form method="post" action="{{route('subparty.update')}}">
        @csrf
<input type="hidden" name="id" value="{{ $subparty->id }}">
<div class="card">
<div class="card-body">
<div class="row mb-3">
<div class="col-sm-3">
    <h6 class="mb-0">Firm name</h6>
</div>
<div class="col-sm-9 text-secondary">
<select class="form-select mb-3" aria-label="Default select example" name="party_name">
<option selected="" >Select Firm</option>
@foreach($party as $party_item)
<option value="{{$party_item->party_name}}"{{$party_item->party_name == $subparty->party_name  ? 'selected' : 'empty'}}>{{$party_item->party_name}}
    
</option>
@endforeach
</select>
</div>
</div>
<div class="row mb-3">
<div class="col-sm-3">
    <h6 class="mb-0">Sub-Firm name</h6>
</div>
<div class="col-sm-9 text-secondary">
    <input type="text" name="subparty_name" class="form-control" value="{{ $subparty->subparty_name }}"/>
    @error('subparty_name')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
</div>



<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-9 text-secondary">
<input type="submit" class="btn btn-primary px-4" value="Update Sub-Firm"/>
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