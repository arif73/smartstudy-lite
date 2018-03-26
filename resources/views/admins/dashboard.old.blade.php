@extends('admins.sidebar')

@section('title')
    Admins
@endsection

@section('page-name')
    Admins
@endsection

@section('section-name')
    Admin Name

    <a class="btn-no-padding btn btn-xs btn-no-padding-x btn-edit pull-right"  title="Edit" href="../student/edit">Edit</a>

@endsection




@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        <table class="table">

                            <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td>{{Auth::user()->name}}</td>
                            </tr>

                            <tr>
                                <th scope="row">Photo</th>
                                <td> <img class="avatar border-white" src="../uploads/avatars/{{Auth::user()->avatar}}" alt="..."/></td>
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
                                <th scope="row">About</th>
                                <td>None </td>
                            </tr>





                            </tbody>
                        </table>


                    </div>
                </div>


                <a class="btn-no-padding btn btn-xs btn-no-padding-x pull-right btn-group-sm"  title="Edit" href="../student/edit">Edit</a>

            </div>


        </div>
    </div>



@endsection