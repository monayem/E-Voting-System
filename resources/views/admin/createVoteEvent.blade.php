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
            <h3 class="card-title">Add Vote Date</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{ route('storeVoteEvent') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group">
                <label for="electionName">Election Name</label>
                <input type="text" class="form-control" name="electionName" placeholder="Enter Election Name">
                @if ($errors->any())
                <span class="text-danger">
                  {{ $errors->first('electionName') }}
                </span>
                @endif
              </div>

              <div class="form-group">
                <label for="electionName">Election Date</label>
                <input type="date" class="form-control" name="electionDate">
                @if ($errors->any())
                <span class="text-danger">
                  {{ $errors->first('electionDate') }}
                </span>
                @endif
              </div>
              
              <div class="form-group">
                <label for="coverPhoto">Event Banner</label>
                <input type="file" class="form-control" id="eventBanner" name="eventBanner" accept="image/*">
                @if ($errors->any())
                <span class="text-danger">
                  {{ $errors->first('eventBanner') }}
                </span>
                @endif
              </div>

              <div class="form-group">
                <label for="logoPreview" hidden id="logoPreviewLabel">Preview of your Event Banner</label>
                <div id="logoPreview" class="form-group" hidden>
                  <img id="image" width="200" height="200px" />
                </div>
              </div>
              
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">ADD</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>




@endsection

