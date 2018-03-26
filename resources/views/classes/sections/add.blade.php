@extends('template.macosdoc.master.admin')

@section('title')
    Add Section
@endsection

@section('page-name')
    :: Add Section
@endsection

@section('section-name')
    Add Section - {{$data->name}}
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
                    <form action="{{ route('post.add.section') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">


                            <div class="col-md-4">
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

                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('shortname') ? ' has-error' : '' }}">
                                    <label for="shortname" >Short Name *</label>
                                    <input id="shortname" type="text" class="form-control border-input" placeholder="Short Name" name="shortname" value=" {{ old('shortname') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('shortname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                        </div>






                        <input type="hidden" name="class_id" id="class_id" value="{{$data->id}}">

                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Section</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
    </div>
@endsection