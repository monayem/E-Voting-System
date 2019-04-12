@extends('adminLayouts.master')
@section('content')

<div class="card">
	<div class="card-header">
		<h3 class="card-title">List of Selected Candidates</h3>
	</div>
	@if(Session::has('message'))
	<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{ Session::get('success') }}
	</div>
	@endif
	<p id="messageLable"></p>
	<!-- /.card-header -->
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Event Name</th>
					<th>Description</th>
					<th>Event Banner</th>
					<th>Event Date</th>
					@if(Session::get('role')=='Candidate')
					<th>Edit</th>
					<th>Delete</th>
					@endif
				</tr>
			</thead>
			<tbody>
				@foreach ($eventList as $list)
				<tr class="{{ $list->id.'_event' }}">
					<td class="{{$list->id.'_eventName'}}">{{ $list->eventName }}</td>
					<td class="{{$list->id.'_eventDescription'}}">{{ $list->eventDescription }}</td>
					<td><img src="{{ asset('eventImages/'. $list->eventBanner) }}" width="200px;"></td>

					<td>{{ $list->eventDate }}</td>
					@if(Session::get('role')=='Candidate')
					{{-- <td><a href="#" onclick="" class="btn btn-danger project_done">Edit</a>  --}}
						<td><a class="btn btn-sm btn-primary"  onclick="editEvent({{$list->id}})" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a></td>

						<td><a class="btn btn-sm btn-danger" onclick="deleteEvent({{$list->id}})" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a></td>

						@endif
					</tr>
					@endforeach


				</tbody>

			</table>

			<div class="col-md-12 text-center" style="margin-top: 2%;">
				{{ $eventList->links('pagination') }}
			</div>
		</div>
		<!-- /.card-body -->

	

	<div class="modal " id="editModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Edit Event</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form id="update" class="form-horizontal" action="#" method="POST">
						{{csrf_field()}}
						<input type="hidden" value="" id="edit_id" name="id">
						<div class="row">
							<div class="col-md-12">
								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="supplier_name" class="col-sm-2 control-label">Event Name</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="edit_event_name" name="categoryName" style="width:90%;">
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="address" class="col-sm-2 control-label ">Description</label>
												<div class="col-sm-10">
													<textarea name="description" class="form-control" id="edit_event_description" style="margin-left: 0%; width:90%;min-height: 150px;"></textarea>
												</div>
											</div>
										</div>
									</div>

									<div>
										<div class="col-md-6 col-md-offset-1">
											<!-- submit button -->
											<div class="modal-footer">
												<button type="submit" id="updateEvent" class="btn btn-info" style="margin-left: 20px;max-width: 40%;float: left;">Update</button>
												<button type="button" id="closeAfter" class="btn btn-default" data-dismiss="modal" style="margin-left: 10px;max-width: 40%;float: left;">Close</button>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>


				

			</div>
		</div>
	</div>


	{{--Delete Modal Start Here--}}
	<div class="modal fade" id="deleteModal" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Delete Event</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="eventId" id="eventId" value="">
					<p>Click the delete button to delete This Event</p>
				</div>
				<div class="modal-footer">
					<button type="button" id="deleteEvent" class="btn btn-danger" style="max-width: 30%; float: right;">Delete</button>
					<button type="button" class="btn btn-default" id="closeDelete" data-dismiss="modal" style="max-width: 30%; float: right; margin-right: 5px;">Close</button>
				</div>
			</div>
		</div>
	</div>
	{{--Delete Modal End Here--}}

</div>
<!-- /.card -->


@endsection