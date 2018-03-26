@extends('template.macosdoc.master.admin')

@section('title')
    Classes
@endsection

@section('page-name')
    :: Classes & Sections
@endsection

@section('section-name')
    All Classes
    <a class="btn btn-primary btn-edit pull-right" title="+Add Class" href="{{route('class.add')}}">+ Add Class</a>

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
                            <th>Sections</th>
                            <th>Students</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($datacollection as $i=>$data)
                                <tr>
                                    <td>{{(($datacollection->currentPage() - 1 ) * $datacollection->perPage() ) + $i+1 }}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->shortname}}</td>
                                    <td><a href="{{route('class.view',['id'=>$data->id])}}">{{$data->sections->count()}}</a></td>

                                    <td>{{$data->students->count()}}</td>
                                    <td>

                                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="{{route('class.view',['id'=>$data->id])}}"><i class="fa fa-eye"></i></a>


                                            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('class.edit',['id'=>$data->id])}}"><i class="fa fa-pencil"></i></a>

                            {{--                <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('class.delete',['id'=>$data->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>--}}





                                        </div>
                                    </td>
                                </tr>
                            @endforeach





                            </tbody>
                        </table>
                        <div>

                            Showing {{($datacollection->currentPage()-1)* $datacollection->perPage() + 1}} to
                            {{(($datacollection->currentpage()-1)*$datacollection->perpage())+$datacollection->count()}} from
                            {{ $datacollection->total() }} results.</div>
                        {{$datacollection->links()}}
                    </div>
                </div>
            </div>





        </div>
    </div>

@endsection