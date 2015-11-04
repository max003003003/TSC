@extends('notify.notifymaster')
@section('linkcreate')
      <li><a href="../job">ภาระงาน</a></li>  
@endsection
@section('content2')
			
		 
    <div class="container-fluid">
      <div class="row">       
        <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main"> 
        <h1 class="page-header">ภาระงาน {{$jobl}} งาน</h1>  
       @if($notifies)
        @foreach( $notifies as$notify )    
              @if( $notify->status =='กำลังดำเนินการ')                
                  <div class="panel panel-primary">               
                      <div class="panel-heading">
                       <h3 class="panel-title">รหัสการแจ้งซ่อม:  {{$notify->id}}
                         <div class="btn-group pull-right">                        
                            <div class="btn-group pull-right" >
                              <a class="btn btn-warning" 
                              href={!! URL::to('tech/' . $notify->id. '/edit' )!!} >แก้ไข
                              </a>
                              <div class="btn-group pull-right" >   
                              {!! Form::model($notify, array('route' => array('job.update', $notify->id), 'method' => 'PUT')) !!} 
                              <button type="submit"  class="btn btn-danger">ปฏิเสธ</button>
                              {!! Form::close() !!}
                              </div>
                          </div>
                        </div>
                      </h3>
                      <div class="clearfix"></div>
                      </div>

                      <div class="panel-body">                
                        <h3>  สถานะ : {{$notify->status}}</h3>                        
                        @include('tech.link')     
                    </div>
                  </div> 
              @endif
      @endforeach
      @endif



          </div>
        </div>
      </div>
    </div>

@endsection