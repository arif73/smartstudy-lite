@extends('template.macosdoc.master.admin')

@section('title')
    Add Event
@endsection

@section('page-name')
    :: Add Event
@endsection

@section('section-name')
    Add Event
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

                    <form action="{{ route('post.add.events') }}" role="form" method="POST" enctype="multipart/form-data">
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

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                                    <label for="active" >Active * </label>
                                    <select class="form-control input-wd border-input" name="active" id="active" required>
                                        <option value="1" selected="true">Yes</option>
                                        <option value="0" >No</option>

                                    </select>

                                    @if ($errors->has('active'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('eventdate') ? ' has-error' : '' }}">
                                    <label for="eventdate" >Date * </label>

                                    <input type="date" class="form-control border-input" id="eventdate" name="eventdate" min="2017-07-31" max="2020-12-31">
                                    @if ($errors->has('eventdate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('eventdate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                    <label for="start" >Start (optional)  </label>
                                    <input type="time" class="form-control border-input" id="start" name="start" value="00:00:00">
                                    @if ($errors->has('start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                                    <label for="end" >End (optional)  </label>
                                    <input type="time" class="form-control border-input" id="end" name="end" value="00:00:00">
                                    @if ($errors->has('end'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('wholedayevent') ? ' has-error' : '' }}">
                                    <label for="wholedayevent" >Whole Day Event? </label>
                                    <select class="form-control input-wd border-input" name="wholedayevent" id="wholedayevent" required>
                                        <option value="1">Yes</option>
                                        <option value="0" selected="true">No</option>

                                    </select>

                                    @if ($errors->has('wholedayevent'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('wholedayevent') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                    <label for="avatar" >Photo (optional)</label>
                                    <input type="file" id="photo"  class="form-control border-input"  name="photo" value="{{ old('photo') }}">

                                    @if ($errors->has('photo'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('photo') }} Maximum image size allowed is 2 MB, minimum image resolution 100 X 100 pixel, maximum: 500 X 500 pixel, image must be square.</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>


                            <input type="hidden" name="classes_id" id="classes_id" value="">
                            <input type="hidden" name="sections_id" id="sections_id" value="">


                        <div class="text-center">
                            <button type="submit" class="btn btn-info btn-fill btn-wd" style="margin-bottom: 10px;">Add Event</button>
                        </div>

                    </form>
                </div>



            </div>


        </div>

    </div>

@endsection