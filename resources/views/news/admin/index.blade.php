@extends('template.macosdoc.master.admin')

@section('title')
    Admin Panel
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
                                <div><a class="btn btn-edit btn-warning" title="+Add News" href="{{route('news.admin.add')}}">Add News</a></div>


                                <ul>



                                    @foreach($news as $n)
                                    <li>
                                        <div class="single_cat_right_content ">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <h3>{{$n->name}}</h3>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="limit2line">{{$n->description}}</p>

                                                    <p class="single_cat_right_content_meta">
                                                        <a href="{{route('news.admin.view',['id'=>$n->id])}}"><span>read more</span></a>

                                                        {{$n->created_at->diffForHumans($today)}}</p>

                                                    @if($n->active=='1')
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif

                                                    <a style="color: #1f648b;" href="{{route('news.admin.edit',['id'=>$n->id])}}"><span>(Edit)</span></a>
                                                </div>
                                                @if(is_null($n->image))
                                                    @else

                                                <div class="col-md-4">
                                                    <div class="pull-right"></div>

                                                    <img style="height: 60px;"
                                                         src="{{getenv('baseurl')}}/uploads/news/{{$n->image}}"
                                                         alt=""/>

                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach



                                </ul>


                            </div>



                        </div>


                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection