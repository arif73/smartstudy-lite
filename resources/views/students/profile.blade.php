@if (Auth::user()->role=='admin')
    @extends('admins.sidebar')
@endif

@if (Auth::user()->role=='teacher')
    @extends('teachers.sidebar')
@endif

@if (Auth::user()->role=='student')
    @extends('students.sidebar')
@endif


@section('page-name')
    Profile
    @endsection

@section('section-name')
    <b>{{ Auth::user()->name }}'s Profile</b>
    <img src="../uploads/avatars/{{$user->avatar}}" style="width:100px;height:100px;border-radius: 50%;float:left;margin-right: 25px;">
    <form action="{{ route('student.profile') }}" role="form" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label>Update Profile Picture</label>
        <div class="noname{{ $errors->has('avatar') ? ' has-error' : '' }}">
        <input type="file" id="avatar"  name="avatar" class="btn-no-padding-x btn-sm" required>

        <button type="submit" class="btn btn-info btn-fill btn-xs">Save</button>

            @if ($errors->has('avatar'))
                <span class="help-block">
                                        Failed: {{ $errors->first('avatar') }}
                                    </span>
            @endif
            <span class="help-block ">
                <?=$message;?>
            </span>
        </div>
    </form>
@endsection

@section('content')

    <div class="content table-responsive table-full-width">
        <table class="table">

            <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{Auth::user()->name}}</td>
            </tr>



            <tr>
                <th scope="row">Username</th>
                <td>{{Auth::user()->username}}</td>
            </tr>

            <tr>
                <th scope="row">Email Address</th>
                <td>{{Auth::user()->email}}</td>
            </tr>

            <tr>
                <th scope="row">School ID</th>
                <td>{{Auth::user()->id}}</td>
            </tr>

            <tr>
                <th scope="row">About</th>
                <td>None </td>
            </tr>





            </tbody>
        </table>


    </div>
    @endsection