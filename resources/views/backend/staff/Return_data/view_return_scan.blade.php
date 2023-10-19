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
<table class="table align-middle mb-0">
<thead class="table-light">
<tr>
<th>Sl</th>
<th>AWB</th>
<th>2nd AWB</th>
<th>Date</th>
<th>Courier</th>
<th>Firm</th>
<th>Status</th>

</tr>
</thead>
<tbody>
    @php($i = 1)
    @foreach($returnscan as $item)
<tr>

<td>
{{ $i++ }}
</td> 
<td>{{ $item->AWB }}</td>
<td>{{ $item->AWB_2 }}</td>
<td>{{ \Carbon\Carbon::parse($item->Date)->format('d-m-Y') }}</td>
<td>{{ $item->Courier }}</td>
<td>{{ $item->Firm }}</td>
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