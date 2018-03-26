@extends('template.macosdoc.master.admin')

@section('title')
    Teachers
@endsection

@section('page-name')
    :: Teachers
@endsection

@section('section-name')
    Teachers
    <a class="btn btn-primary btn-edit pull-right" title="+Add Teacher" href="{{Route('teacher.add')}}">+ Add Teacher</a>

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

                            @foreach($teachers as $i=>$t)
                                <tr>
                                    <td>{{(($teachers->currentPage() - 1 ) * $teachers->perPage() ) + $i+1 }}</td>
                                    <td>{{$t->name}}</td>
                                    <td>{{$t->username}}</td>
                                    <td>{{$t->email}}</td>
                                    <td>{{$t->created_at}}</td>
                                    <td>
                                        <img src="../uploads/avatars/{{$t->avatar}}" style="width:32px;height:32px;border-radius: 50%;">


                                    </td>
                                    <td>

                                        <div class="button_action" style="text-align:left"><a class="btn btn-xs btn-primary btn-detail" title="Detail Data" href="{{route('teacher.view',['id'=>$t->id])}}"><i class="fa fa-eye"></i></a>


                                            <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('teacher.edit',['id'=>$t->id])}}"><i class="fa fa-pencil"></i></a>

                                     {{--       <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('teacher.delete',['id'=>$t->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>  --}}





                                        </div>
                                    </td>
                                </tr>
                            @endforeach





                            </tbody>
                        </table>
                        <div>

                         Showing {{($teachers->currentPage()-1)* $teachers->perPage() + 1}} to
                            {{(($teachers->currentpage()-1)*$teachers->perpage())+$teachers->count()}} from
                        {{ $teachers->total() }} results.</div>
                        {{$teachers->links()}}
                    </div>
                </div>
            </div>





        </div>
    </div>

@endsection