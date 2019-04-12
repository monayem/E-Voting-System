@extends('adminLayouts.master')
@section('content')

<div class="card">
	<div class="card-header">
		<h3 class="card-title">List of Applied Candidates</h3>
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
				@foreach ($voters as $voter)
				<tr class="{{ $voter->id.'_unverifyVoter' }}">
					<td>{{ $voter->firstName }}  {{ $voter->lastName }}</td>
					<td>{{ $voter->email }}</td>
					<td>{{ $voter->nid }}</td>
					<td>{{ $voter->gender }}</td>
					<td>{{ $voter->dateOfBirth }}</td>
					{{-- <td><button class="btn btn-primary">Approve</button>  <button class="btn btn-danger">Disapprove</button></td> --}}
					<td><a href="#" onclick="unverifyVoter({{$voter->id}})" class="btn btn-danger project_done">Unverify</a></td>
					
				</tr>
				@endforeach
				

			</tbody>
			
		</table>
		
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