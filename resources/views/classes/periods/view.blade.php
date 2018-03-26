@extends('template.macosdoc.master.admin')

@section('title')
    View Period
@endsection

@section('page-name')
    :: View Period
@endsection

@section('section-name')

    View Period
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
                <th scope="row">Start</th>
                <td>{{$data->start}}</td>
            </tr>

            <tr>
                <th scope="row">End</th>
                <td>{{$data->end}}</td>
            </tr>

            </tbody>


        </table>


    </div>



@endsection