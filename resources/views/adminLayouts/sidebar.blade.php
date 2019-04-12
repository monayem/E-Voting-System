<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    {{-- <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8"> --}}
    <span class="brand-text font-weight-light" style="margin-left: 8%;">{{ Session::get('role') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if(Session::get('role')=='Voter')
        <img src="{{ asset('voterImages/'. Session::get('profileImage')) }}" class="img-circle elevation-2" alt="User Image">
        @elseif(Session::get('role')=='Admin')
        <img src="{{ asset('adminImages/'. Session::get('profileImage')) }}" class="img-circle elevation-2" alt="User Image">
        @elseif(Session::get('role')=='Candidate')
        <img src="{{ asset('candidateImages/'. Session::get('profileImage')) }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Session::get('firstName') }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    {{-- admin --}}
    @if(Session::get('role')=='Admin')
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="{{ route('home') }}" class="nav-link">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Home
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>

        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Candidate
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('registeredCandidate') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Registered Candidates</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('filteredCandidate') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Filtered Candidates</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Voter
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('appliedVoter') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Applied Voter</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('disapproveVoter') }}" class="nav-link">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Verfied Voter</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Party
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('createParty') }}" class="nav-link active">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Create Party</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Vote Event
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('createVoteEvent') }}" class="nav-link active">
                <i class="fa fa-circle-o nav-icon"></i>
                <p>Create Vote Event</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{ route('logout',['type' => 'admin']) }}" class="nav-link">
            <i class="nav-icon fa fa-dashboard"></i>
            <p>
              Logout
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>

        </li>

      </ul>
    </nav>

    {{-- voter --}}
    @elseif(Session::get('role')=='Voter')
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

           <li class="nav-item has-treeview">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Home
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Profile
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('voterProfile') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('candidatesProfile') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Candidates Profile</p>
                </a>
              </li>
              
            </ul>


          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Events
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('eventList') }}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Events List</p>
                </a>
              </li>
              
            </ul>
          </li>

          

          @if($voteEvent!='' && $voteGiven=='')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Vote
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('votePage') }}" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Submit Vote</p>
                </a>
              </li>
            </ul>
          </li>
          @endif


          {{-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Result
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('createParty') }}" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Result List</p>
                </a>
              </li>
            </ul>
          </li> --}}


          <li class="nav-item has-treeview">
            <a href="{{ route('logout',['type' => 'voter']) }}" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Logout
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
          </li>

          
        </ul>
      </nav>
      {{-- voter ends --}}


      @elseif(Session::get('role')=='Candidate')
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item has-treeview">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Home
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
          </li>

           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Proflie
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('candidateProfile') }}" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
              
            </ul>
          </li>

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Events
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('createEvent') }}" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Create Eevnt</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('eventList') }}" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Eevnts List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('logout',['type' => 'candidate']) }}" class="nav-link">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Logout
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
          </li>  
          
        </ul>
      </nav>

      @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>