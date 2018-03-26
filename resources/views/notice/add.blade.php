@extends('template.macosdoc.master.admin')

@section('title')
    Add Notice
@endsection

@section('page-name')
    Admin Panel
@endsection

@section('section-name')
    Add Notice
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="content" style="margin-left: 15px;">
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

                    <form action="{{ route('post.add.notice') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-9">
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
                        </div>

                        <div class="row">
                            <div class="col-md-9">
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
                                <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                                    <label for="active" >Active * </label>
                                    <select class="form-control input-wd border-input" name="active" id="active" required>
                                        <option value="1" selected="true">Yes</option>
                                        <option value="0">No</option>

                                    </select>

                                    @if ($errors->has('active'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('target') ? ' has-error' : '' }}">
                                    <label for="target" >Target * </label>
                                    <select class="form-control input-wd border-input" name="target" id="target" required>
                                        <option value="1" selected="true">Both Teachers and Students</option>
                                        <option value="2">Teachers</option>
                                        <option value="3">Students</option>

                                    </select>

                                    @if ($errors->has('active'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label for="avatar" >Image (optional)</label>
                                    <input type="file" id="image"  class="form-control border-input"  name="image" value="{{ old('image') }}">

                                    @if ($errors->has('image'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('image') }} Maximum image size allowed is 2 MB, minimum image resolution 100 X 100 pixel, maximum: 500 X 500 pixel, image must be square.</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>


                            <input type="hidden" name="classes_id" id="classes_id" value="">
                            <input type="hidden" name="sections_id" id="sections_id" value="">


                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd" style="margin-bottom: 10px;">Add Notice</button>
                        </div>

                    </form>
                </div>



            </div>


        </div>

    </div>

@endsection