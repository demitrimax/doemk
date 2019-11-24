<div class="header-right">

  <form action="pages-search-results.html" class="search nav-form">
    <div class="input-group input-search">
      <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </form>

  <span class="separator"></span>

  <ul class="notifications">
    <li>
      <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
        <i class="fa fa-tasks"></i>
        <span class="badge">{{$vartareas->count()}}</span>
      </a>

      <div class="dropdown-menu notification-menu large">
        <div class="notification-title">
          <span class="pull-right label label-default">{{$vartareas->count()}}</span>
          Tareas
        </div>

        <div class="content">
          <ul>
            @foreach($vartareas as $tarea)
            <li>
              <p class="clearfix mb-xs">
                <span class="message pull-left">{{$tarea->nombre}}</span>
                <span class="message pull-right text-dark">{{$tarea->avance_porc}}%</span>
              </p>
              <div class="progress progress-xs light">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{$tarea->avance_porc}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$tarea->avance_porc}}%;"></div>
              </div>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </li>


    <!-- <li>
      <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
        <i class="fa fa-bell"></i>
        <span class="badge">3</span>
      </a>

      <div class="dropdown-menu notification-menu">
        <div class="notification-title">
          <span class="pull-right label label-default">3</span>
          Alerts
        </div>

        <div class="content">
          <ul>
            <li>
              <a href="#" class="clearfix">
                <div class="image">
                  <i class="fa fa-thumbs-down bg-danger"></i>
                </div>
                <span class="title">Server is Down!</span>
                <span class="message">Just now</span>
              </a>
            </li>
            <li>
              <a href="#" class="clearfix">
                <div class="image">
                  <i class="fa fa-lock bg-warning"></i>
                </div>
                <span class="title">User Locked</span>
                <span class="message">15 minutes ago</span>
              </a>
            </li>
            <li>
              <a href="#" class="clearfix">
                <div class="image">
                  <i class="fa fa-signal bg-success"></i>
                </div>
                <span class="title">Connection Restaured</span>
                <span class="message">10/10/2014</span>
              </a>
            </li>
          </ul>

          <hr />

          <div class="text-right">
            <a href="#" class="view-more">View All</a>
          </div>
        </div>
      </div>
    </li> -->
  </ul>

  <span class="separator"></span>

  <div id="userbox" class="userbox">
    <a href="{{url('/profile')}}" data-toggle="dropdown">
      <figure class="profile-picture">
        <img src="{{asset(Auth::user()->uavatar)}}" alt="{{Auth::user()->name}}" class="img-circle" data-lock-picture="{{asset(Auth::user()->uavatar)}}" />
      </figure>
      <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
        <span class="name">{{Auth::user()->name}}</span>
        <span class="role">{{Auth::user()->cargo}}</span>
      </div>

      <i class="fa custom-caret"></i>
    </a>

    <div class="dropdown-menu">
      <ul class="list-unstyled">
        <li class="divider"></li>
        <li>
          <a role="menuitem" tabindex="-1" href="{{url('/profile')}}"><i class="fa fa-user"></i> Mi Perfil</a>
        </li>
        <li>
          <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
        </li>
        <li>
          <a role="menuitem" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
        </li>
      </ul>
    </div>
  </div>
</div>
