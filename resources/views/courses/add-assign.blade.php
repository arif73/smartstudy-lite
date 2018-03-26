@extends('template.macosdoc.master.admin')

@section('title')
    Add Course
@endsection

@section('page-name')
   :: Course - Assign
@endsection

@section('section-name')
    @if ($type== "class")
        Add Course - Class {{$class->shortname}}
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
                    <h4>Course Details</h4>

                    <form action="{{ route('post.add.class') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}



                        <div class="row">


                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                    <label for="start" >Start *</label>
                                    <input id="start" type="date" class="form-control border-input"  name="start" value=" {{ old('start') }}" required>
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
                                    <input id="end" type="date" class="form-control border-input" name="end" value=" {{ old('end') }}" required>
                                    @if ($errors->has('end'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                    <label for="start" >Start *</label>
                                    <input id="start" type="date" class="form-control border-input"  name="start" value=" {{ old('start') }}" required>
                                    @if ($errors->has('start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                                    <label for="end" >End *</label>
                                    <input id="end" type="date" class="form-control border-input" name="end" value=" {{ old('end') }}" required>
                                    @if ($errors->has('end'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-info btn-fill btn-wd" style="margin-bottom: 10px;">Next</button>

                    </form>
                </div>
                <div class="text-center">

                </div>


            </div>


        </div>

    </div>

@endsection