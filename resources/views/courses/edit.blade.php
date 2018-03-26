@extends('template.macosdoc.master.admin')

@section('title')
    Edit Course
@endsection

@section('page-name')
    :: Edit Course
@endsection

@section('section-name')

        Edit Course - {{$course->name}}

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">


            <div class="card">
                <div class="content">
                    @include('includes.message-block')
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('post.edit.course') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Name *</label>
                                    <input id="name" type="text" class="form-control border-input" placeholder="Name" name="name" value=" {{$course->name}} " required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('codename') ? ' has-error' : '' }}">
                                    <label for="codename" >Code Name *</label>
                                    <input id="codename" type="text" class="form-control border-input" placeholder="PHY-CL6-SECA-17" name="codename" value=" {{$course->codename }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('codename') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>





                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    <label for="description" >Description (optional)</label>
                                    <textarea rows="3" id="description" type="text" class="form-control border-input" placeholder="Here can be your description" name="description">{{$course->description}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('sessions_id') ? ' has-error' : '' }}">
                                    <label for="sessions_id" >Session * </label>
                                    <select class="form-control input-wd border-input" name="sessions_id" id="sessions_id" required>
                                        <option value="" disabled="true" selected="true">Select Session</option>
                                        @foreach($session as $s)
                                            <option value="{{$s->id}}"
                                                    @if($s->id==$course->sessions_id)
                                                    selected="true"
                                                    @endif
                                            >{{$s->name}} </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('sessions_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sessions_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                    <label for="start" >Start *</label>
                                    <input id="start" type="date" class="form-control border-input input-wd" name="start" value="{{$course->start->format('Y-m-d')}}" required>
                                    @if ($errors->has('start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                                    <label for="end" >End *</label>
                                    <input id="end" type="date" class="form-control border-input input-wd" name="end" value="{{$course->end->format('Y-m-d')}}" required>
                                    @if ($errors->has('end'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>






                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

                            <div class="col-md-1">
                                <div class="form-group{{ $errors->has('iconpath') ? ' has-error' : '' }}">
                                    <label for="iconpath" >Icon * </label>

                                    <select class="border-input templatingselect2 form-control input-wd" name="iconpath" id="iconpath" required>
                                        <option value="">Icon</option>

                                        @foreach($icons as $i)
                                            <option value="{{$i->url}}"></option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('iconpath'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('iconpath') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    function setIcon (icon) {
                                        if (!icon.id) { return icon.text; }
                                        var $icon = $('<span class=" input-wd"><img src="{{getenv('baseurl')}}/assets/img/'+icon.element.value+'" class="img-flag" style="margin-right: 10px;"/>'   + icon.text + '</span>');
                                        return $icon;
                                    };
                                    $(".templatingselect2").select2({
                                        placeholder: "Icon", //placeholder
                                        templateResult: setIcon,
                                        templateSelection: setIcon
                                    });
                                })
                            </script>

                        </div>


                            <input type="hidden" name="courses_id" id="courses_id" value="{{$course->id}}">





                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd" style="margin-bottom: 10px;">Edit Course</button>
                        </div>

                    </form>
                </div>



            </div>


        </div>

    </div>

@endsection