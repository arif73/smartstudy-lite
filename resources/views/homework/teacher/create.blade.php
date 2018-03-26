@extends('template.macosdoc.master.teacher')

@section('title')
    Teacher Panel
@endsection

@section('page-name')

    :: Create Homework
@endsection

@section('section-name')



@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">

            <h4><strong>{{$course->name}}</strong> ({{$course->codename}}): New Homework</h4>
            <h4></h4>
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
                    <form action="{{route('post.add.homework')}}" role="form" method="POST" enctype="multipart/form-data">
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

                        </div>





                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('') ? ' has-error' : '' }}">
                                    <label for="task" >Homework Task (optional)</label>
                                    <textarea rows="3" id="taskt" type="text" class="form-control border-input" placeholder="Write the homework task here" name="task" value="{{ old('task') }}"></textarea>
                                    @if ($errors->has('task'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('task') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('filepath') ? ' has-error' : '' }}">
                                    <label for="filepath" >File (optional)</label>
                                    <input type="file" id="filepath"  class="form-control border-input"  name="filepath" value="{{ old('filepath') }}">

                                    @if ($errors->has('filepath'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('filepath') }} Maximum image size allowed is 2 MB, minimum image resolution 100 X 100 pixel, maximum: 500 X 500 pixel, image must be square.</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>


                        <div class="row">


                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
                                    <label for="deadline" >Deadline</label>
                                    <input id="deadline" type="date" class="form-control border-input"  name="deadline" value=" {{ old('deadline') }}" required>
                                    @if ($errors->has('deadline'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('deadline') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>



                        <input type="hidden" name="teachers_id" id="teachers_id" value="{{$teacherid}}">
                        <input type="hidden" name="courses_id" id="courses_id" value="{{$course->id}}">
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Homework</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
@endsection