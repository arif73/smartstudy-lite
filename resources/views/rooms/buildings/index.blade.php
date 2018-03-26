@extends('template.macosdoc.master.admin')

@section('title')
    Buildings
@endsection

@section('page-name')
    :: Buildings
@endsection

@section('section-name')

    Buildings
    <a class="btn btn-primary btn-edit pull-right" title="+Add Building" href="{{route('building.add')}}">+Add Building</a>




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
                            <th>Short Name</th>
                            <th>Rooms</th>
                            <th>Description</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($datacollection as $i=>$data)
                                <tr>
                                    <td>{{(($datacollection->currentPage() - 1 ) * $datacollection->perPage() ) + $i+1 }}</td>
                                    <td><a href="{{route('building.view',['id'=>$data->id])}}">{{$data->name}}</a></td>
                                    <td>{{$data->shortname}}</td>
                                    <td><a href="{{route('building.view',['id'=>$data->id])}}">{{$data->rooms->count()}}</a></td>

                                    <td>{{$data->description}}</td>

                                    <td>

                                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="{{route('building.view',['id'=>$data->id])}}"><i class="fa fa-eye"></i></a>

                                            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('building.edit',['id'=>$data->id])}}"><i class="fa fa-pencil"></i></a>

                                            <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('building.delete',['id'=>$data->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>

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