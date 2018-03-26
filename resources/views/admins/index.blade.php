@extends('template.macosdoc.master.admin')

@section('title')
    Admins
@endsection

@section('page-name')
    :: Admins
@endsection

@section('section-name')
    Admins
    <a class="btn btn-primary btn-edit pull-right" title="+Add Admin" href="../admin/add">+ Add Admin</a>

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
                            <th>Username</th>
                            <th>Email</th>
                            <th>Added</th>
                            <th>Photo</th>
                            <th>Action</th>
                            </thead>
                            <tbody>

                            @foreach($admins as $i=>$admin)
                                <tr>
                                    <td>{{(($admins->currentPage() - 1 ) * $admins->perPage() ) + $i+1 }}</td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->username}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->created_at}}</td>
                                    <td>
                                        <img src="../uploads/avatars/{{$admin->avatar}}" style="width:32px;height:32px;border-radius: 50%;">


                                    </td>
                                    <td>

                                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="{{route('admin.view',['id'=>$admin->id])}}"><i class="fa fa-eye"></i></a>


                                            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('admin.edit',['id'=>$admin->id])}}"><i class="fa fa-pencil"></i></a>

                                         {{--   <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('admin.delete',['id'=>$admin->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>--}}





                                        </div>
                                    </td>
                                </tr>
                            @endforeach





                            </tbody>
                        </table>
                        <div>

                         Showing {{($admins->currentPage()-1)* $admins->perPage() + 1}} to
                            {{(($admins->currentpage()-1)*$admins->perpage())+$admins->count()}} from
                        {{ $admins->total() }} results.</div>
                        {{$admins->links()}}
                    </div>
                </div>
            </div>





        </div>
    </div>

@endsection