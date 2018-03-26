@extends('template.macosdoc.master.student')

@section('title')
    Student Panel
@endsection

@section('page-name')

    :: Events
@endsection

@section('section-name')

    Events:

@endsection


@section('content')

    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content table-full-width">
                        @include('includes.message-block')

                        <div class="single_right_coloum ">

                            <div class="single_right_coloum">

                                <ul>

                                        <li>
                                            <div class="single_cat_right_content ">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <h3>{{$n->name}}</h3>
                                                        <p class="single_cat_right_content_meta"><a
                                                                    href="{{route('news.student.view',['id'=>$n->id])}}"><span>({{$n->created_at}})</span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Date: {{$n->eventdate}}<h3></h3>
                                                        Start: {{$n->start}}<h3></h3>
                                                        End: {{$n->end}}<h3></h3>
                                                        Whole Day Event:
                                                        @if($n->wholedayevent=='1')
                                                            Yes
                                                        @else
                                                            No
                                                        @endif
                                                        <h3></h3>
                                                        <p>{{$n->description}}</p>


                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="pull-right"></div>
                                                        <img
                                                             src="{{getenv('baseurl')}}/uploads/events/{{$n->image}}"
                                                             alt=""/>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>




                                </ul>


                            </div>



                        </div>


                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection