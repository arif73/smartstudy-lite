@extends('template.macosdoc.master.admin')

@section('title')
    Edit Shift
@endsection

@section('page-name')
    :: Edit Shift
@endsection

@section('section-name')
    Edit Shift : {{$datacollection->name}}
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
                    <form action="{{ route('post.edit.period') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">


                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Name *</label>
                                    <input id="name" type="text" class="form-control border-input" placeholder="11:00 am - 12:30 pm" name="name" value=" {{ $datacollection->name }} " required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                    <label for="start" >Start *</label>
                                    <input id="start" type="time" class="form-control border-input"  name="start" value="{{ $datacollection->start }}" required>
                                    @if ($errors->has('start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                                    <label for="end" >End *</label>
                                    <input id="end" type="time" class="form-control border-input" name="end" value="{{ $datacollection->end }}" required>
                                    @if ($errors->has('end'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
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