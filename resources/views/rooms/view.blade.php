@extends('template.macosdoc.master.admin')

@section('title')
    View Room
@endsection

@section('page-name')
    :: View Room
@endsection

@section('section-name')

    Room: <b>{{ $data->roomnumber }} </b> ({{ $building->name }})
@endsection

        @section('content')

            <div class="content table-responsive table-full-width">

                <table class="table">

                    <tbody>
                    <tr>
                        <th scope="row">Room Number</th>
                        <td>{{$data->roomnumber}}</td>
                    </tr>



                    <tr>
                        <th scope="row">Capacity</th>
                        <td>{{$data->capacity}}</td>
                    </tr>


                    <tr>
                        <th scope="row">Description</th>
                        <td>{{$data->description}}</td>
                    </tr>


                    </tbody>


                </table>


            </div>


            <a class="btn btn-info btn-fill btn-wd" title="Back" href="{{route('building.view',['id'=>$building->id])}}" style="margin-left: 10px">Back</a>
            <a class="btn btn-info btn-fill btn-wd" title="Back" href="{{route('building.index')}}" style="margin-left: 10px">Back to all buildings</a>
@endsection