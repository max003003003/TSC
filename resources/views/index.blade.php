<h1>List of Problem</h1>
 @if ($lists->count() > 0)
  <ul>
    @foreach($lists as $list)
       <li>{{$list->name}}  Problelm is :  {{$list->Descrip}}</li>
    @endforeach
  </ul>
 @else
   <p>
     No lists found!
   </p>
@endif
