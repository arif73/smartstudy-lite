@extends('teachers.sidebar')

@section('title')
    Teachers
@endsection

@section('page-name')
    Teachers
@endsection

@section('section-name')
    Teacher Name

    <a class="btn-no-padding btn btn-xs btn-no-padding-x btn-edit pull-right"  title="Edit" href="../teacher/edit">Edit</a>

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
                                <td>Ahmed Tarek</td>
                            </tr>

                            <tr>
                                <th scope="row">Nick Name</th>
                                <td>Satu</td>
                            </tr>

                            <tr>
                                <th scope="row">Photo</th>
                                <td> <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="..."/></td>
                            </tr>
                            <tr>
                                <th scope="row">Class</th>
                                <td>Nine</td>
                            </tr>

                            <tr>
                                <th scope="row">Roll</th>
                                <td>01</td>
                            </tr>

                            <tr>
                                <th scope="row">Username</th>
                                <td>tarek</td>
                            </tr>

                            <tr>
                                <th scope="row">Email Address</th>
                                <td>tarekgr@gmail.com</td>
                            </tr>

                            <tr>
                                <th scope="row">Phone</th>
                                <td>0191107773</td>
                            </tr>

                            <tr>
                                <th scope="row">Religion</th>
                                <td>Islam</td>
                            </tr>

                            <tr>
                                <th scope="row">Gender</th>
                                <td>Male</td>
                            </tr>

                            <tr>
                                <th scope="row">Address</th>
                                <td>53/4 Purana Paltan (Culvert Road)</td>
                            </tr>

                            <tr>
                                <th scope="row">City</th>
                                <td>Dhaka</td>
                            </tr>

                            <tr>
                                <th scope="row">Postal Code</th>
                                <td>1000</td>
                            </tr>

                            <tr>
                                <th scope="row">About</th>
                                <td>I am a passionate cricket player. </td>
                            </tr>

                            <tr>
                                <th scope="row">Birth Date</th>
                                <td>23 January 2005</td>
                            </tr>

                            <tr>
                                <th scope="row">Blood Group</th>
                                <td>A+</td>
                            </tr>



                            </tbody>
                        </table>


                    </div>
                </div>


                <a class="btn-no-padding btn btn-xs btn-no-padding-x pull-right btn-group-sm"  title="Edit" href="../teacher/edit">Edit</a>

            </div>


        </div>
    </div>



@endsection