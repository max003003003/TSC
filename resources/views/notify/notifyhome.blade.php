@extends('notify.notifymaster')
@section('content2')
			
		 
    <div class="container-fluid">
      <div class="row">
       
        <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main">
        <!-- <h1 class="page-header">ผลการแจ้งซ่อม</h1> -->

              @if(  $notify->status =='รอดำเนินการ') 
               
                  <div class="panel panel-primary"> <!-- panel-primary -->
                      <div class="panel-heading"> 
                        <h3 class="panel-title">รหัสการแจ้งซ่อม:  {{$notify->id}}</h3>
                         <p class="navbar-right center" >                  
                          <button type="button" class="btn btn-warning">แก้ไข</button> 
                          <button type="button" class="btn btn-danger">ยกเลิก</button>
                       </p>   
                      </div>
                      <div class="panel-body">
                     <h3>  รหัสผู้ใช้ : {{$notify->infomer_id}}</h3>
                     <h3>  ช่างผู้รับงาน : </h3>
                     <h3>  รายละเอียด : {{$notify->describe}}</h3>
                     <h3>  สถานะ : {{$notify->status}}</h3>
                      </div>
                  </div>                   
                
                    
              


              @endif



          </div>
        </div>
      </div>
    </div>

@endsection