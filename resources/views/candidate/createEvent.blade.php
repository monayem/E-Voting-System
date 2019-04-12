@extends('adminLayouts.master')
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6" style="margin-top: 1%;">

        @if(Session::has('message'))
        <p id="successMessage" class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}</p>
        @endif
        
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Event</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{ route('storeEvent') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group">
                <label for="eventName">Event Name</label>
                <input type="text" class="form-control" name="eventName" placeholder="Enter Event Name">
                @if ($errors->any())
                <span class="text-danger">
                  {{ $errors->first('eventName') }}
                </span>
                @endif
              </div>

              <div class="form-group">
                <label for="description">Event Description</label>
                {{-- <input type="email" class="form-control" name="email" placeholder="Enter email"> --}}
                <textarea class="form-control" name="eventDescription" placeholder="Enter Description" required></textarea>
                @if ($errors->any())
                <span class="text-danger">
                  {{ $errors->first('eventDescription') }}
                </span>
                @endif
              </div>

              <div class="form-group">
                <label for="eventdate">Event Date</label>
                <input type="date" class="form-control" name="eventDate" placeholder="Enter Date">
                @if ($errors->any())
                <span class="text-danger">
                  {{ $errors->first('eventDate') }}
                </span>
                @endif
              </div>
              
              <div class="form-group">
                <label for="eventBanner">Event Banner</label>
                <input type="file" class="form-control" id="eventBanner" name="eventBanner" accept="image/*">
                @if ($errors->any())
                <span class="text-danger">
                  {{ $errors->first('eventBanner') }}
                </span>
                @endif
              </div>

              <div class="form-group">
                <label for="eventBannerPreview" hidden id="eventBannerPreviewLabel">Preview of your Party Logo</label>
                <div id="eventBannerPreview" class="form-group" hidden>
                  <img id="image" width="200" height="200px" />
                </div>
              </div>
              
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>




@endsection

