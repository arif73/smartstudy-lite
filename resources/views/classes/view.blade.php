@extends('template.macosdoc.master.admin')

@section('page-name')
    :: View Class
@endsection

@section('section-name')

        {{ $data->name }}
        <a class="btn btn-primary btn-edit pull-right" title="+Add Section" href="{{Route('section.add',['id'=>$data->id])}}">+ Add Section</a>

        @endsection

        @section('content')
            @include('includes.message-block')
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
                        <th scope="row">Total Sections</th>
                        <td>{{$data->sections->count()}}</td>
                    </tr>

                    <tr>
                        <th scope="row">Total Students</th>
                        <td>{{$data->students->count()}}</td>
                    </tr>


                    </tbody>


                </table>


            </div>

            <h4 class="title" style="margin-left: 10px;">Sections of {{ $data->name }}</h4>

            <div class="content table-responsive table-full-width">

                <table class="table table-striped">
                    <thead>
                    <th>Nr</th>
                    <th>Name</th>
                    <th>Short Name</th>
                    <th>Total Students</th>
                    <th>Action</th>
                    </thead>
                    <tbody>

                    @foreach($data->sections as $i=>$data1)
                        <tr>
                            <td>{{$i+1}}</td>
                            <td>{{$data1->name}}</td>
                            <td>{{$data1->shortname}}</td>
                            <td>{{$data1->students->count()}}</td>
                            <td>

                                <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="{{route('section.view',['id'=>$data1->id])}}"><i class="fa fa-eye"></i></a>


                                    <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('section.edit',['id'=>$data1->id])}}"><i class="fa fa-pencil"></i></a>

                            {{--        <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('section.delete',['id'=>$data1->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>--}}





                                </div>
                            </td>
                        </tr>
                    @endforeach





                    </tbody>

                </table>

                <a class="btn btn-info btn-fill btn-wd" title="Show All" href="{{route('class.index')}}" style="margin-left: 10px">Back to all classes</a>
            </div>

@endsection