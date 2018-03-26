@extends('admins.sidebar')

@section('title')
    Admin Panel: Result
@endsection

@section('page-name')
    Admin Panel : Result
@endsection

@section('section-name')
    Select Class/Section:


@endsection


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width">
                        @include('includes.message-block')
                        <table class="table">
                            <thead>
                            <th>Nr</th>
                            <th>Class</th>
                            <th>Sections</th>
                            </thead>
                            <tbody>

                            @foreach($datacollection as $i=>$data)
                                <tr>
                                    <td>{{(($datacollection->currentPage() - 1 ) * $datacollection->perPage() ) + $i+1 }}</td>

                                    <td><a href="{{route('class.edit',['id'=>$data->id])}}">{{$data->name}}</a></td>

                                    <td>
                                        @foreach($data->sections as $section)
                                        <a href="{{route('section.view',['id'=>$section->id])}}">{{$section->name}} ,</a>
                                        @endforeach
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