@extends('template.macosdoc.master.admin')

@section('title')
    Courses
@endsection

@section('page-name')
    :: Courses
@endsection

@section('section-name')
    @if ($type== "class")
        All Courses - Class {{$class->shortname}}
        <a class="btn btn-primary btn-edit pull-right" title="+Add Class" href="{{route('course.add',['type'=>'class','id'=>$class->id])}}">+ Add Course</a>

    @else
        All Courses - Section {{$section->shortname}} (Class {{$section->classes->shortname}})
        <a class="btn btn-primary btn-edit pull-right" title="+Add Class" href="{{route('course.add',['type'=>'section','id'=>$section->id])}}">+ Add Course</a>
    @endif



@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        @include('includes.message-block')
                        <table class="table table-striped">
                            <thead>
                            <th>Nr</th>
                            <th>Name</th>
                            <th>Shortcode</th>
                            <th>Duration</th>
                            <th>Session</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($datacollection as $i=>$data)
                                <tr>
                                    <td>{{$i+1 }}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->codename}}</td>
                                    <td width="25%">{{$data->start->format('jS F, Y')}} - {{$data->end->format('jS F, Y')}}</td>
                                    <td>{{$data->sessions->name}}</td>
                                    <td>

                                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="{{route('course.view',['id'=>$data->id])}}"><i class="fa fa-eye"></i></a>


                                            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('course.edit',['id'=>$data->id])}}"><i class="fa fa-pencil"></i></a>

                                   {{--       <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('course.delete',['id'=>$data->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>--}}





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