@extends('backend/staff/staff_master')
@section('staff')

<div class="page-wrapper">
<div class="page-content">
<div class="card radius-10">
<div class="card-body">
<div class="d-flex align-items-center">
<div>
<h5 class="mb-0">All Firm</h5>
</div>
<div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
</div>
</div>
<hr>
<div class="table-responsive">
<table id="example" class="table table-striped" style="width:100%">
<!-- <table class="table align-middle mb-0"> -->
<thead>
<tr>
<th>Sl</th>
<th>Portal</th>
<th>Courier</th>
<th>Date</th>
<th>Firm</th>
<th>Order Id</th>
<th>Awb</th>
<th>Portal Sku</th>
<th>Qty</th>
<th>Status</th>

</tr>
</thead>
<tbody>
    @php($i = 1)
    @foreach($scan as $item)
<tr>

<td>
{{ $i++ }}
</td>

<td>{{ $item->Portal }}</td>
<td>{{ $item->Courier }}</td>
<td>{{ \Carbon\Carbon::parse($item->Date)->format('d-m-Y') }}</td>
<td>{{ $item->Firm }}</td>
<td>{{ $item->Order_ID }}</td>
<td>{{ $item->AWB }}</td>
<td>{{ $item->Portal_SKU }}</td>
<td>{{ $item->Qty }}</td>
<td>{{ $item->Action }}</td>

</tr>
@endforeach

</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

@endsection