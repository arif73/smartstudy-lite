@extends('template.macosdoc.master.teacher')

@section('title')
    SMART STUDY - Teacher Panel
@endsection

@section('page-name')
        :: Results
@endsection

@section('section-name')
    View Results
@endsection


@section('content')

    <div class="container-fluid" style="margin-top: 10px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width table-bordered ">
                        @include('includes.message-block')

                        <table class="table table-striped">
                            <thead>
                            <th>Nr</th>
                            <th>Student Name</th>
                            <th>1st Quiz (21)</th>
                            <th>2nd Quiz (20)</th>
                            <th>Exam (60)</th>


                            </thead>
                            <tbody>


                                <tr>

                                        <td>1</td>
                                    <td>Sabuj Ahmed</td>
                                    <td><i class="fa fa-user-circle-o"
                                           ></i> 16 </td>
                                    <td>17</td>
                                    <td>45</td>

                                </tr>

                                <tr>

                                    <td>2</td>
                                    <td>Nasim Chowdhury</td>
                                    <td>9</td>
                                    <td>7</td>
                                    <td>12</td>

                                </tr>






                            </tbody>
                        </table>



                        <div>

                        </div>
                    </div>
                </div>





            </div>
        </div>

@endsection