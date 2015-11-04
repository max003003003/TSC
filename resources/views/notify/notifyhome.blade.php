@extends('notify.notifymaster')
@section('linkcreate')
      <li><a href="../notify/create">แจ้งซ่อม</a></li>  
@endsection
@section('content2')
			
		 
    <div class="container-fluid">
      <div class="row">
       
        <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-2 main">  
       @if($notifies)
        @foreach( $notifies as$notify )    
              @if(  $notify->status =='รอดำเนินการ')                
                  <div class="panel panel-danger"> 
                      <div class="panel-heading">
                       <h3 class="panel-title">รหัสการแจ้งซ่อม:  {{$notify->id}}
                       <div class="btn-group pull-right">
                        
                        <div class="btn-group pull-right" >
                        <a class="btn btn-warning" 
                        href={!! URL::to('notify/' . $notify->id. '/edit' )!!} >แก้ไข </a>
                       {!! Form::open(array('url' => 'notify/' . $notify->id, 'class' => 'pull-right')) !!}
                       {!! Form::hidden('_method', 'DELETE') !!}
                       {!! Form::submit('ยกเลิกใบแจ้งซ่อม', array('class' => 'btn btn-danger ')) !!}
                       {!! Form::close() !!}
                        
                      </div>
                      </div>
                      </h3>
                       <div class="clearfix"></div>
                      </div>

                      <div class="panel-body">                
                     <h3>  สถานะ : {{$notify->status}}</h3>                   
                   
                      @include('notify.link')     
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