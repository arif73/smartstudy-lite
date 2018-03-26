@extends('template.macosdoc.master.admin')

@section('title')
    View Building
@endsection

@section('page-name')
    :: View Building
@endsection

@section('section-name')

    {{ $data->name }}
    <a class="btn btn-primary btn-success pull-right btn-sm" title="+Add Room" href="{{Route('room.add',['id'=>$data->id])}}">+ Add Room</a>
    <a class="btn btn-primary btn-primary pull-right btn-sm" style="margin-right: 5px;" title="Edit" href="{{Route('building.edit',['id'=>$data->id])}}">Edit</a>
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
                <th scope="row">Rooms</th>
                <td>{{$data->rooms->count()}}</td>
            </tr>

            <tr>
                <th scope="row">Description</th>
                <td>{{$data->description}}</td>
            </tr>

            <tr>
                <th scope="row">Address</th>
                <td>{{$data->address}}</td>
            </tr>


            </tbody>


        </table>


    </div>

    <h4 class="title" style="margin-left: 10px;">Rooms of {{ $data->name }}</h4>

    <div class="content table-responsive table-full-width" id="rooms">

        <table class="table table-striped">
            <thead>
            <th>Nr</th>
            <th>Room Number</th>
            <th>Capacity</th>
            <th>Action</th>
            </thead>
            <tbody>

            @foreach($rooms as $i=>$room)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$room->roomnumber}}</td>
                    <td>{{$room->capacity}}</td>
                    <td>

                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="{{route('room.view',['id'=>$room->id])}}"><i class="fa fa-eye"></i></a>


                            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('room.edit',['id'=>$room->id])}}"><i class="fa fa-pencil"></i></a>

                            <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('room.delete',['id'=>$room->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>





                        </div>
                    </td>
                </tr>
            @endforeach





            </tbody>

        </table>

        <a class="btn btn-info btn-fill btn-wd" title="Show All" href="{{route('building.index')}}" style="margin-left: 10px">Back to all buildings</a>
    </div>

@endsection