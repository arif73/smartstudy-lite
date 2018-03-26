@extends('template.macosdoc.master.teacher')

@section('page-name')
    :: Profile
@endsection

@section('section-name')
    <img src="{{getenv('baseurl')}}/uploads/avatars/{{$user->avatar}}" style="width:100px;height:100px;border-radius: 50%;float:left;margin-right: 25px;margin-bottom: 10px;">
   <div class="col-lg-3">
    <b>{{ $user->name }}</b>
      {{-- <div class="button_action" style="text-align:left;margin-top: 5px;"><a class="btn btn-xs btn-primary " title="Change" href="{{route('student.edit',['id'=>$user->id])}}">Change</a> </div>--}}

   </div>

@endsection

@section('content')

    <div class="content table-responsive table-full-width ">

        <table class="table table-striped">

            <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{$user->name}}</td>
            </tr>


            <tr>
                <th scope="row">About</th>
                <td>{{$userdata->about}} </td>
            </tr>
            <tr>
                <th scope="row">Email </th>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <th scope="row">Username</th>
                <td>{{$user->username}}</td>
            </tr>

            @if(checkPermission(['admin|teacher']))
            <tr>
                <th scope="row">Added on</th>
                <td>{{$user->created_at}}</td>
            </tr>

            @endif




            </tbody>
        </table>


    </div>
   </div>
@endsection