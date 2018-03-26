@extends('template.macosdoc.master.teacher')

@section('title')
    Teacher Panel
@endsection

@section('page-name')

    :: Homework Submissions
@endsection

@section('section-name')

    <strong>Homework: </strong>{{$homework->name}}

@endsection


@section('content')

    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        @include('includes.message-block')

                        <h4 ><strong>Task</strong></h4>
                        {{$homework->task}}
                        <h4 style="margin-top:20px;"><strong></strong></h4>
                        @if(empty($homework->filepath))
                            <strong>Atatched File: </strong>No
                        @else
                            <strong>Atatched File: </strong> Yes <a href="{{getenv('storageurl')}}/storage/app/{{$homework->filepath}}">(download)</a>
                        @endif
                        <h4 style="margin-top:20px;"><strong></strong></h4>
                        <strong>Created: </strong>
                        {{$homework->created_at}}
                        <h4 ><strong></strong></h4>
                        <strong>Deadline: </strong>
                        {{$homework->deadline}}

                        <h4 style="margin-top:20px;"><strong>Submissions</strong></h4>

                        <table class="table table-striped">
                            <thead>
                            <th>Nr</th>
                            <th>Student Name</th>
                            <th>Roll</th>
                            <th>Submiited On</th>
                            <th>Status</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($dataset as $i=>$data)
                                <tr>
                                    <td>{{(($dataset->currentPage() - 1 ) * $dataset->perPage() ) + $i+1 }}</td>
                                    <td>{{$data->user->name}}</td>
                                    <td>{{$data->student->id}}</td>

                                    <td>{{$data->created_at}}</td>
                                    <td>{{$data->status}}</td>
                                    <td>

                                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="View" href="{{route('teacher.homework.evaluate',['id'=>$data->id])}}"><i class="fa fa-eye"></i></a>



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