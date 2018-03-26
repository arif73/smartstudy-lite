@extends('template.macosdoc.master.admin')

@section('title')
    View Section
@endsection

@section('page-name')
    :: View Section
@endsection

@section('section-name')

    <b>{{ $data->name }} </b> ({{ $class->name }})


        @endsection

        @section('content')

            <div class="content table-responsive table-full-width">

                <table class="table">

                    <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{$data->name}}</td>
                    </tr>



                    <tr>
                        <th scope="row">Short Name</th>
                        <td>{{$data->shortname}}</td>
                    </tr>


                    <tr>
                        <th scope="row">Total Students</th>
                        <td>{{$data->students->count()}}</td>
                    </tr>


                    </tbody>


                </table>


            </div>

            <h4 class="title" style="margin-left: 10px;">Students of {{ $data->name }}</h4>
            <div class="content table-responsive table-full-width">
                @include('includes.message-block')
                <table class="table table-striped">
                    <thead>
                    <th>Nr</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Added</th>
                    <th>Photo</th>
                    <th>Action</th>
                    </thead>
                    <tbody>

                    @foreach($students as $i=>$student)
                        <tr>
                            <td>{{(($students->currentPage() - 1 ) * $students->perPage() ) + $i+1 }}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->username}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->created_at}}</td>
                            <td>
                                <img src="../uploads/avatars/{{$student->avatar}}" style="width:32px;height:32px;border-radius: 50%;">


                            </td>
                            <td>

                                <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="{{route('student.view',['id'=>$student->id])}}"><i class="fa fa-eye"></i></a>


                                    <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('student.edit',['id'=>$student->id])}}"><i class="fa fa-pencil"></i></a>

                          {{--          <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('student.delete',['id'=>$student->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>--}}





                                </div>
                            </td>
                        </tr>
                    @endforeach





                    </tbody>
                </table>
                <div>

                    Showing {{($students->currentPage()-1)* $students->perPage() + 1}} to
                    {{(($students->currentpage()-1)*$students->perpage())+$students->count()}} from
                    {{ $students->total() }} results.</div>
                {{$students->links()}}
            </div>

            <a class="btn btn-info btn-fill btn-wd" title="Back" href="{{route('class.view',['id'=>$class->id])}}" style="margin-left: 10px">Back</a>
            <a class="btn btn-info btn-fill btn-wd" title="Back" href="{{route('class.index')}}" style="margin-left: 10px">Back to all classes</a>
@endsection