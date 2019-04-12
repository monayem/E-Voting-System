@extends('adminLayouts.master')
@section('content')

<div class="card">
	<div class="card-header">
		<h3 class="card-title">List of Selected Candidates</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>NID</th>
					<th>Gender</th>
					<th>Date Of Birth</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($candidates as $candidate)
				<tr class="{{ $candidate->id.'_approveCandidate' }}">
					<td>{{ $candidate->firstName }}  {{ $candidate->lastName }}</td>
					<td>{{ $candidate->email }}</td>
					<td>{{ $candidate->nid }}</td>
					<td>{{ $candidate->gender }}</td>
					<td>{{ $candidate->dateOfBirth }}</td>
					<td><a href="#" onclick="disapproveCandidate({{$candidate->id}})" class="btn btn-danger project_done">Disapprove</a></td>
					
				</tr>
				@endforeach
				

			</tbody>
			
		</table>
		{{-- <div class="col-md-12 text-center">
			{{ $candidates->links() }}
		</div> --}}
	</div>
	<!-- /.card-body -->
</div>
<!-- /.card -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

@endsection