@extends('template.macosdoc.master.admin')

@section('title')
    Add Course
@endsection

@section('page-name')
    :: Add Course
@endsection

@section('section-name')
    @if ($type== "class")
        Add Course - Class {{$class->shortname}} (for all sections)
    @else
        Add Course - Section {{$section->shortname}} (Class {{$section->classes->shortname}})
    @endif
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

                    <form action="{{ route('post.add.course') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Name *</label>
                                    <input id="name" type="text" class="form-control border-input" placeholder="Name" name="name" value=" {{ old('name') }} " required autofocus>
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
                                    <input id="codename" type="text" class="form-control border-input" placeholder="PHY-CL6-SECA-17" name="codename" value=" {{ old('codename') }}" required>
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
                                    <textarea rows="3" id="description" type="text" class="form-control border-input" placeholder="Here can be your description" name="description" value="{{ old('description') }}">{{ old('description') }}</textarea>
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
                                <div class="form-group{{ $errors->has('session') ? ' has-error' : '' }}">
                                    <label for="session" >Session * </label>
                                    <select class="form-control input-wd border-input" name="sessions_id" id="sessions_id" required>
                                        <option value="0" disabled="true" selected="true">Select Session</option>
                                        @foreach($session as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('classes'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('classes') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                    <label for="start" >Start *</label>
                                    <input id="start" type="date" class="form-control border-input input-wd" name="start" value={{date('Y-m-d')}} required>
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
                                    <input id="end" type="date" class="form-control border-input input-wd" name="end" value= {{date('Y-m-d')}} required>
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
                            {{--nicher script ta ekhane na,,, borong main layout file e must rakhte hobe with stylesheet--}}
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    function setIcon (iconpath) {
                                        if (!iconpath.id) { return iconpath.text; }
                                        var $iconpath = $('<span class=" input-wd"><img src="{{getenv('baseurl')}}/assets/img/'+iconpath.element.value+'" class="img-flag" style="margin-right: 10px;"/>'   + iconpath.text + '</span>');
                                        return $iconpath;
                                    };
                                    $(".templatingselect2").select2({
                                        placeholder: "Icon", //placeholder
                                        templateResult: setIcon,
                                        templateSelection: setIcon
                                    });
                                })
                            </script>

                        </div>

                        @if ($type== "class")
                            <input type="hidden" name="classes_id" id="classes_id" value="{{$class->id}}">
                            <input type="hidden" name="sections_id" id="sections_id" value="0">
                        @else
                            <input type="hidden" name="classes_id" id="classes_id" value="{{$section->classes->id}}">
                            <input type="hidden" name="sections_id" id="sections_id" value="{{$section->id}}">
                        @endif


                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd" style="margin-bottom: 10px;">Add Course</button>
                        </div>

                    </form>
                </div>



            </div>


        </div>

    </div>

@endsection