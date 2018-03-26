@extends('template.macosdoc.master.student')

@section('title')
    Student Panel
@endsection

@section('page-name')

    :: Homework
@endsection

@section('section-name')

    {{$course->name}} ({{$course->codename}}) Homeworks:




@endsection


@section('content')

    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        @include('includes.message-block')
                        <table class="table table-striped">
                            <thead>
                            <th>Nr</th>
                            <th>Name</th>
                            <th>Added</th>
                            <th>Deadline</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($dataset as $i=>$data)
                                <tr>
                                    <td>{{(($dataset->currentPage() - 1 ) * $dataset->perPage() ) + $i+1 }}</td>
                                    <td><a href="{{route('student.homework.view',['id'=>$data->id])}}">{{$data->name}}</a></td>
                                    <td>{{$data->created_at}}</td>

                                    <td>{{$data->deadline}}</td>

                                    <td>

                                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="View" href="{{route('student.homework.view',['id'=>$data->id])}}"><i class="fa fa-eye"></i></a>




                                        </div>
                                    </td>
                                </tr>
                            @endforeach





                            </tbody>
                        </table>
                        <div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection