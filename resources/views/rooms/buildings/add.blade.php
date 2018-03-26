@extends('template.macosdoc.master.admin')

@section('title')
    Add Building
@endsection

@section('page-name')
    :: Add Building
@endsection

@section('section-name')
    Add Building
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
                    <form action="{{ route('post.add.building') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">


                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Name *</label>
                                    <input id="name" type="text" class="form-control border-input" placeholder="Building 1" name="name" value=" {{ old('name') }} " required autofocus>
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
                                    <input id="shortname" type="text" class="form-control border-input" placeholder="1" name="shortname" value=" {{ old('shortname') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('shortname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="address" >Address (optional)</label>
                                        <textarea rows="3" id="address" type="text" class="form-control border-input" placeholder="Here can be your address" name="address" value="{{ old('address') }}"></textarea>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description" >Description (optional)</label>
                                        <textarea rows="3" id="description" type="text" class="form-control border-input" placeholder="Here can be your description" name="description" value="{{ old('description') }}"></textarea>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </div>










                        <button type="submit" class="btn btn-info btn-fill btn-wd">Add Building</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
    </div>
@endsection