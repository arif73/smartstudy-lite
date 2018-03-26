@extends('template.macosdoc.master.teacher')

@section('title')
    Edit Payment
@endsection

@section('page-name')
    :: Payment
@endsection

@section('section-name')
    Edit Payment
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
                    <form action="{{ route('post.edit.teacher.student.payment') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Name *</label>
                                    <input id="name" type="text" class="form-control border-input" placeholder="Name" name="name" value=" {{$p->name }} " required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('payment') ? ' has-error' : '' }}">
                                    <label for="payment" >Payment *</label>
                                    <input id="payment" type="text" class="form-control border-input" placeholder="Payment" name="payment" value=" {{ $p->amount }}" required>
                                    @if ($errors->has('payment'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('payment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('due') ? ' has-error' : '' }}">
                                    <label for="due" >Due </label>
                                    <input id="due" type="text" class="form-control border-input" placeholder="due" name="due" value=" {{ $p->due }}">
                                    @if ($errors->has('due'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('due') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                                    <label for="note" >Note (optional)</label>
                                    <textarea rows="3" id="note" type="text" class="form-control border-input" placeholder="Note" name="note" value="{{ $p->note }}">{{ $p->note }}</textarea>
                                    @if ($errors->has('note'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <input id="id" type="text" class="hidden"  name="id" value="{{ $p->id }}" >


                        <button type="submit" class="btn btn-info btn-fill btn-wd">Save Changes</button>
                    </form>
                </div>
            </div>



        </div>
    </div>
    </div>
@endsection