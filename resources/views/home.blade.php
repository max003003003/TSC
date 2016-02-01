<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ระบบแจ้งซ่อม</title>
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
      /*body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        color: #B0BEC5;
        display: table;
        font-weight: 100;
        font-family: 'Lato';
      }*/

      /*.container {
        background: white;
      }
*/
      .content {
        background: white;
        
      }

      .title {
        position: absolute;
        top: 200px;
        font-size: 133px;
        margin-bottom: 50px;

        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        color: #B0BEC5;
        display: table;
        font-weight: 100;
        font-family: 'Lato';
        overflow: hidden;
        z-index: -1;
      
    </style>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">Technical Service Center</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">          
                    @if(Auth::check())
                   
                      @if(Auth::user()->hasRole('admin'))
                        <li><a href="{{ URL::route('department.index') }}">Department</a>
                        <li><a href="{{ URL::route('showrate.index') }}">ผลการประเมิน</a>
                        <li><a href="{{ URL::route('location.index') }}">Location</a>
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Roles/Permissions</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/role_permission') }}">Panel</a></li>
                                <li><a href="{{ URL::route('roles.index') }}">Roles</a></li>
                                <li><a href="{{ URL::route('permissions.index') }}">Permissions</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ URL::route('department.index') }}">Department</a></li>
                        <li><a href="{{ URL::route('users.index') }}">Users</a></li>
                        <li><a href="{{ URL::route('profile.index') }}">Profile</a></li>
                         @elseif(Auth::user()->hasRole('technician'))                            

                           @if(Auth::user()->hasRole('captain'))
                              <li><a href="{{ URL::route('jobdep.index') }}">งานในแผนก</a>
                            @else
                              <li><a href="{{ URL::route('job.index') }}">งานแจ้งซ่อม</a>
                              <li><a href="editJobStatus">จัดการใบแจ้งซ่อม</a>
                              <li><a href="{{ URL::route('showrate.index') }}">จัดการใบแจ้งซ่อม</a>                 
                            @endif
                        @elseif(Auth::user()->hasRole('user'))
                           <li><a href="{{ URL::route('notify.create') }}">สร้างใบแจ้งซ่อมใหม่</a>
                            <li><a href="{{ URL::route('notify.index') }}">งานแจ้งซ่อมคงค้าง</a> 
                            <li><a href="{{ URL::route('rating.index') }}">งานซ่อมรอการประเมิน</a> 
                         @endif
                          <li><a href="{{ URL::route('history.index') }}">History</a></li>
         @endif
        </ul>

        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
           <!--  <li><a href="{{ url('/auth/login') }}">Login</a></li> -->
            <a href="/auth/login" class="btn btn-success" role="button">login</a>
          @else
            <a href="/auth/logout" class="btn btn-danger" role="button">logout</a>
         
        </div>
            
            
              </ul>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <div class="title" >Technical Service Center</div>
  
    <div class="content" >
        @include('flash::message')
        @yield('content')
    </div>
    
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>