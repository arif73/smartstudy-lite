@extends('template.macosdoc.master.admin')

@section('title')
    Edit Building
@endsection

@section('page-name')
    :: Edit Building
@endsection

@section('section-name')
    Edit Building : {{$datacollection->shortname}}
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
                    <form action="{{ route('post.edit.building') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">


                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Name *</label>
                                    <input id="name" type="text" class="form-control border-input" placeholder="Building 1" name="name" value=" {{ $datacollection->name }} " required autofocus>
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
                                    <input id="shortname" type="text" class="form-control border-input" placeholder="1" name="shortname" value=" {{ $datacollection->shortname }}" required>
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
                                    <textarea rows="3" id="address" type="text" class="form-control border-input" placeholder="Here can be your address" name="address" value="{{ $datacollection->address }}">{{$datacollection->address}}</textarea>
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
                                    <textarea rows="3" id="description" type="text" class="form-control border-input" placeholder="Here can be your description" name="description" value="{{ $datacollection->description }}">{{$datacollection->description}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>





                        <input id="id" type="text" class="hidden"  name="id" value="{{ $datacollection->id }}" >


                        <button type="submit" class="btn btn-info btn-fill btn-wd">Save Changes</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
    </div>
@endsection