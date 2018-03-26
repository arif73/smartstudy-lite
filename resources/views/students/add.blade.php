@extends('template.macosdoc.master.admin')

@section('title')
    Add Student
@endsection

@section('page-name')
    :: Add Students
@endsection

@section('section-name')
    Add Student
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">


            <div class="card">
                <div class="content">
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
                    <form action="{{ route('post.add.student') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Name *</label>
                                    <input id="name" type="text" class="form-control border-input" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" >Email </label>
                                    <input id="email" type="email" class="form-control border-input" placeholder="Email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" >Username *</label>
                                    <input id="username" type="text" class="form-control border-input" placeholder="Username" name="username" value="{{ old('username') }}" required>
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="pasword" >Password *</label>
                                    <input id="password" type="password" class="form-control border-input" placeholder="Password" name="password" value="{{ old('password') }}" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pasword-confirm" >Password *</label>
                                    <input id="password-confirm" type="password" class="form-control border-input" placeholder="Confirm Password" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                                </div>
                            </div>
                        </div>



                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('classes') ? ' has-error' : '' }}">
                                    <label for="classes" >Class</label>
                                    <select class="form-control input-wd border-input classes" name="classes" id="classes">
                                        <option value="0" disabled="true" selected="true">Select Class</option>
                                        @foreach($classes as $classunit)
                                            <option value="{{$classunit->id}}">{{$classunit->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('classes'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('classes') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

                            <script>
                                $('#classes').on('change',function (e) {
                                    console.log(e);
                                    console.log("hi");
                                    var z="Checking sections ..";
                                    $('#sections').append('<option value="0">'+z+'</option>')
                                    var class_id=e.target.value;
                                    $.get('{{getenv('baseurl')}}/ajaxGetSections-'+class_id,function(data){
                                        //success data
                                        $('#sections').empty();
                                        if(Object.keys(data).length>0){
                                            var z="Select Section ("+Object.keys(data).length+")";
                                            $('#sections').append('<option value="0">'+z+'</option>')
                                            $.each(data,function (index,sectionObj) {
                                                $('#sections').append('<option value="'+sectionObj.id+'">'+sectionObj.name+'</option>')
                                            });}
                                        else
                                            $('#sections').append('<option value="1">No section created</option>')
                                    });

                                });
                            </script>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('sections') ? ' has-error' : '' }}">
                                    <label for="sections" >Sections</label>
                                    <select class="form-control input-wd border-input" name="sections" id="sections">
                                        <option value="0" disabled="true" selected="true">Select Section</option>
                                    </select>

                                    @if ($errors->has('sections'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sections') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                                    <label for="about" >About (optional)</label>
                                    <textarea rows="3" id="about" type="text" class="form-control border-input" placeholder="Here can be your description" name="about" value="{{ old('about') }}"></textarea>
                                    @if ($errors->has('about'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <label for="avatar" >Photo (optional)</label>
                                    <input type="file" id="avatar"  class="form-control border-input"  name="avatar" value="{{ old('avatar') }}">

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }} Maximum image size allowed is 2 MB, minimum image resolution 100 X 100 pixel, maximum: 500 X 500 pixel, image must be square.</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>






                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Student</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
@endsection