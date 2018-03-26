@extends('template.macosdoc.master.admin')

@section('title')
    Attendence Records
@endsection

@section('page-name')
    :: Attendence Records
@endsection

@section('section-name')
    Attendence Records
    <a class="btn btn-primary btn-edit pull-right" title="+Add Admin" href="../admin/add">+ Add Attendence</a>

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
                            <th>User ID</th>
                            <th>Time</th>
                            <th>Mode</th>
          {{--                  <th>Action</th>--}}
                            </thead>
                            <tbody>

                            @foreach($datacollection as $i=>$data)
                                <tr>
                                    <td>{{(($datacollection->currentPage() - 1 ) * $datacollection->perPage() ) + $i+1 }}</td>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->time}}</td>
                                    <td>{{$data->mode}}</td>
                                    {{--
                                    <td>

                                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="{{route('admin.view',['id'=>$data->id])}}"><i class="fa fa-eye"></i></a>


                                            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('admin.edit',['id'=>$data->id])}}"><i class="fa fa-pencil"></i></a>

                                            <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('admin.delete',['id'=>$data->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>





                                        </div>
                                    </td>
                                    --}}
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