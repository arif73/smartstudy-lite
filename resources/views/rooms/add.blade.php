@extends('template.macosdoc.master.admin')

@section('title')
    Add Room
@endsection

@section('page-name')
    :: Add Room
@endsection

@section('section-name')
    Add Room - {{$data->name}}
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

                    <form action="{{ route('post.add.room') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}



                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('roomnumber') ? ' has-error' : '' }}">
                                    <label for="roomnumber" >Room Number *</label>
                                    <input id="roomnumber" type="text" class="form-control border-input" placeholder="Room Number" name="roomnumber" value=" {{ old('roomnumber') }} " required autofocus>
                                    @if ($errors->has('roomnumber'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('roomnumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                                    <label for="capacity" >Capacity (optional)</label>
                                    <input id="capacity" type="text" class="form-control border-input" placeholder="Capacity" name="capacity" value=" {{ old('capacity') }}" required>
                                    @if ($errors->has('capacity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('capacity') }}</strong>
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



                        <input type="hidden" name="buildings_id" id="buildings_id" value="{{$data->id}}">

                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Room</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
    </div>
@endsection