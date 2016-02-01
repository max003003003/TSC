@extends('home')
@section('content')

    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
    <!-- <table class="table" >
       <thead>
        <tr>
            <th width="400">หัวข้อเรื่อง</th>
            <th >ระดับความพึงพอใจ</th>         
            
        </tr>
        </thead>
    </table> -->
    <table class="table table-bordered" >

        <tr>
            <th >หัวข้อเรื่อง</th>
            <th >ระดับความพึงพอใจ</th>         
            
        </tr>
        <tr>
            <td>
                ความเอาใจใส่ในงานที่ได้รับมอบหมาย
            </td>
            <td>
                {{$rate->a}}
            </td>
        </tr>
        <tr>
            <td>
                ความรวดเร็วในการดำเนินงาน
            </td>
            <td>
                {{$rate->b}}
            </td>
        </tr>
        <tr>
            <td>
                เจ้าหน้าที่สามารถทำงานที่ได้รับมอบหมายได้
            </td>
            <td>
                {{$rate->c}}
            </td>
        </tr>
        <tr>
            <td>
                ความพึงพอใจของท่านในการรับบริการ
            </td>
            <td>
                {{$rate->d}}
            </td>
        </tr>
        <tr>
            <td>
                การดำเนินการใช้เวลาเหมาะสม
            </td>
            <td>
                {{$rate->e}}
            </td>
        </tr>
        <tr>
            <td>
                ข้อเสนอแนะอื่นๆ
            </td>
            <td>
                {{$rate->comment}}
            </td>
        </tr>
    </table>
    

@endsection
