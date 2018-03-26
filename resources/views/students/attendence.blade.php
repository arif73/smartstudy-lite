@extends('template.macosdoc.master.student')

@section('title')
    SMART STUDY - Student Panel
@endsection

@section('page-name')
    :: Attendence Record
@endsection

@section('section-name')
    Attendence Records

@endsection


@section('content')

    <div class="container-fluid" style="margin-top: 10px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-responsive table-full-width table-bordered ">
                        @include('includes.message-block')

                        <table class="table table-striped">
                            <thead>
                            <th>Nr</th>
                            <th>Time</th>
                            <th>Mode</th>
                            </thead>
                            <tbody>

                            @foreach($dataset as $i=>$data)
                                <tr>
                                    <td>{{(($dataset->currentPage() - 1 ) * $dataset->perPage() ) + $i+1 }}</td>
                                    <td>{{$data->time}}</td>
                                    <td>{{$data->mode}}</td>

                                </tr>
                            @endforeach





                            </tbody>
                        </table>
                        <div>

                            Showing {{($dataset->currentPage()-1)* $dataset->perPage() + 1}} to
                            {{(($dataset->currentpage()-1)*$dataset->perpage())+$dataset->count()}} from
                            {{ $dataset->total() }} results.</div>
                        {{$dataset->links()}}
                    </div>
                </div>
            </div>





        </div>
    </div>

@endsection