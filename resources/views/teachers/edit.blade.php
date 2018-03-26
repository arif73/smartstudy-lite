@extends('template.macosdoc.master.admin')

@section('title')
    Edit Teacher
@endsection

@section('page-name')
    :: Edit Teacher
@endsection

@section('section-name')
{{$user->name}}
    <img src="{{getenv('baseurl')}}/uploads/avatars/{{$user->avatar}}" style="width:25px;height:25px;border-radius: 50%;">
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
                    <form action="{{ route('post.edit.teacher') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Name *</label>
                                    <input id="name" type="text" class="form-control border-input" placeholder="Name" name="name" value="{{ $user->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" >Email</label>
                                    <input id="email" type="email" class="form-control border-input" placeholder="Email" name="email" value="{{ $user->email }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="pasword" >New Password (optional)</label>
                                    <input id="password" type="password" class="form-control border-input" placeholder="Password" name="password" value="">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                                    <label for="about" >About (optional)</label>
                                    <textarea rows="3" id="about" type="text" class="form-control border-input" placeholder="Here can be your description" name="about">{{$teacher->about}}</textarea>
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



                        <input id="id" type="text" class="hidden"  name="id" value="{{ $user->id }}" >


                        <button type="submit" class="btn btn-info btn-fill btn-wd">Save Changes</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
    </div>
@endsection