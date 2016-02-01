@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                      @if($user->hasRole('admin'))

                                Hello Admin

                      @elseif($user->hasRole('technician'))
                               

                      @elseif($user->hasRole('user'))


                      @endif
                    <div class="panel-body">
                        
                          <th colspan="2"><a href="notify" class="btn btn-primary btn-block">แจ้งซ่อม</a></th>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
