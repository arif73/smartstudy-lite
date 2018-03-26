@extends('template.macosdoc.master.teacher')

@section('title')
    Teacher Panel
@endsection

@section('page-name')

    :: News
@endsection

@section('section-name')

    News:

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
                                                                    href="{{route('news.teacher.view',['id'=>$n->id])}}"><span>({{$n->created_at}})</span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p>{{$n->description}}</p>


                                                    </div>
                                                    @if(is_null($n->image))
                                                    @else
                                                    <div class="col-md-4">
                                                        <div class="pull-right"></div>
                                                        <img
                                                             src="{{getenv('baseurl')}}/uploads/news/{{$n->image}}"
                                                             alt=""/>
                                                    </div>
                                                        @endif
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