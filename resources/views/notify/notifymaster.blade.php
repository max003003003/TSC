@extends('master')
@section('title')
	home
@endsection
@section('content')
<link href="/css/notify/notify.css"  rel="stylesheet" >
<div class="container">
 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

      
          <a class="navbar-brand" HREF="/notify">ระบบแจ้งซ่อม</a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="notify/create">แจ้งซ่อม</a></li>
        
                <li><a  href="/history">ประวัติ</a></li>
            
            <li><a href="auth/logout">Logout</a> </li>
          </ul>         
        </div>
      </div>
    </nav>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
  
 @yield('content2')


  </div>

@endsection
