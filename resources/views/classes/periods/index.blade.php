@extends('template.macosdoc.master.admin')

@section('title')
    Periods
@endsection

@section('page-name')
    :: Periods
@endsection

@section('section-name')

 Periods
    <a class="btn btn-primary btn-edit pull-right" href="{{route('period.add')}}">+Add Periods</a>




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
                            <th>Start</th>
                            <th>End</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($datacollection as $i=>$data)
                                <tr>
                                    <td>{{(($datacollection->currentPage() - 1 ) * $datacollection->perPage() ) + $i+1 }}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->start}}</td>
                                    <td>{{$data->end}}</td>


                                    <td>

                                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="{{route('period.view',['id'=>$data->id])}}"><i class="fa fa-eye"></i></a>

                                            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('period.edit',['id'=>$data->id])}}"><i class="fa fa-pencil"></i></a>

                                            <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('period.delete',['id'=>$data->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>

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