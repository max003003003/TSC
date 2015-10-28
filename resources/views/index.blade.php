<h1>List of Problem</h1>

<link rel="stylesheet"
href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<div class="container">
  <ol>
   @foreach ($users as $user)
     <li>  {{ $user->name }}</li>
   @endforeach
 </ol>
 <div class="form-group">
 {!! Form::label('Your Name') !!}
 {!! Form::text('name', null,
 array('required',
 'class'=>'form-control',
 'placeholder'=>'Your name')) !!}
 </div>


{!! $users->render() !!}


 @if ($lists->count() > 0)


  <ol class="container">
    @foreach($lists as $list)
       <li>{{$list->name}}  Problelm is :  {{$list->Descrip}}</li>
    @endforeach
  </ol>
 @else
   <p>
     No lists found!
   </p>
@endif
</div>
