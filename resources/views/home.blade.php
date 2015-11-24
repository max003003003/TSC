<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>




    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>
                     @if (Auth::guest())
                         <li><a href="{{ url('/auth/login') }}">Login</a></li>
                     @endif    
                      @if(Auth::check())
                        @if($user->hasRole('admin'))
                                Hello Admin
                          <th colspan="2"><a href="dashboard" class="btn btn-primary btn-block">ผู้ดูแลระบบ</a></th>

                        @elseif($user->hasRole('technician'))
                          
                            <th colspan="2"><a href="job/" class="btn btn-primary btn-block">งานซ่อมรอดำเนินการ</a></th>
                             <th colspan="2"><a href="notify/create" class="btn btn-primary btn-block">งานซ่อมกำลังดำเนินการ</a></th>
                              <th colspan="2"><a href="history/" class="btn btn-primary btn-block">ประวัติการแจ้งซ่อม</a></th>



                        @elseif($user->hasRole('user'))
                          <div class="panel-body">                        
                          <th colspan="2"><a href="notify/create" class="btn btn-primary btn-block">สร้างรายการแจ้งซ่อมใหม่</a></th>
                                                
                          <th colspan="2"><a href="notify/" class="btn btn-primary btn-block">รายการแจ้งซ่อมคงค้าง</a></th>
                          <th colspan="2"><a href="rating/" class="btn btn-primary btn-block">รายการแจ้งซ่อมรอการประเมิน</a></th>
                            <th colspan="2"><a href="history/" class="btn btn-primary btn-block">ประวัติการแจ้งซ่อม</a></th>
                             
                     @endif
                     @endif
                          <th colspan="2"><a href="auth/logout" class="btn btn-primary btn-block">Logout</a></th>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

