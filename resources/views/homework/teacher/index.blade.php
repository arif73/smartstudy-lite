@extends('template.macosdoc.master.teacher')

@section('title')
    Teacher Panel
@endsection

@section('page-name')

    :: Homework
@endsection

@section('section-name')

    {{$course->name}} ({{$course->codename}}) Homeworks:
    <a class="btn btn-primary btn-edit pull-right" style="margin-bottom: 20px;" title="+Add Homework" href="{{route('homework.add',['courseid'=>$course->id])}}">+Add Homework</a>




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
                            <th>Created</th>
                            <th>Deadline</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($dataset as $i=>$data)
                                <tr>
                                    <td>{{(($dataset->currentPage() - 1 ) * $dataset->perPage() ) + $i+1 }}</td>
                                    <td><a href="{{route('teacher.homework.submissions.index',['id'=>$data->id])}}">{{$data->name}}</a></td>
                                    <td>{{$data->created_at}}</td>

                                    <td>{{$data->deadline}}</td>

                                    <td>

                                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="View" href="{{route('teacher.homework.submissions.index',['id'=>$data->id])}}"><i class="fa fa-eye"></i></a>

                                            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('homework.teacher.edit',['id'=>$data->id])}}"><i class="fa fa-pencil"></i></a>


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