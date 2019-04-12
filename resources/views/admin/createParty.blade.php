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
            <h3 class="card-title">Add Party</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="{{ route('storeParty') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
              <div class="form-group">
                <label for="partyName">Party Name</label>
                <input type="text" class="form-control" name="partyName" placeholder="Enter Party Name">
                @if ($errors->any())
                <span class="text-danger">
                  {{ $errors->first('partyName') }}
                </span>
                @endif
              </div>

              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email">
                @if ($errors->any())
                <span class="text-danger">
                  {{ $errors->first('email') }}
                </span>
                @endif
              </div>
              
              <div class="form-group">
                <label for="coverPhoto">Party Logo</label>
                <input type="file" class="form-control" id="partyLogo" name="partyLogo" accept="image/*">
                @if ($errors->any())
                <span class="text-danger">
                  {{ $errors->first('coverPicture') }}
                </span>
                @endif
              </div>

              <div class="form-group">
                <label for="logoPreview" hidden id="logoPreviewLabel">Preview of your Party Logo</label>
                <div id="logoPreview" class="form-group" hidden>
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

