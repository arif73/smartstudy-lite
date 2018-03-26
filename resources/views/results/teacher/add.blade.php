@extends('template.macosdoc.master.teacher')

@section('title')
    Result
@endsection

@section('page-name')
    :: Result
@endsection

@section('section-name')

    <b>Add New Result</b>

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

                    <form action="{{ route('post.result.name') }}" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Name *</label>
                                    <input id="name" type="text" class="form-control border-input" placeholder="1st term quiz" name="name" value="" required >
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('result-type') ? ' has-error' : '' }}">
                                    <label for="result-type" >Result Type</label>
                                    <select onchange="optionCheck(this);" class="form-control input-wd border-input"  name="result-type" id="result-type" required>
                                        <option value="1" selected="true">Mark</option>
                                        <option value="2" >Pass/Fail</option>
                                        <option value="3" >Other</option>
                                    </select>

                                    @if ($errors->has('result-type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('result-type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-3" id="totalmark">
                                <div class="form-group{{ $errors->has('totalmark') ? ' has-error' : '' }}">
                                    <label for="totalmark" >Total Mark *</label>
                                    <input id="totalmark" type="text" class="form-control border-input" placeholder="40" name="totalmark" value=""  >
                                    @if ($errors->has('totalmark'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('totalmark') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-3" id="status">
                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label for="status" >Pass/Fail status applicable?</label>
                                    <select onchange="optionCheckStatus(this);" class="form-control input-wd border-input"  name="status" id="status" required>
                                        <option value="0" selected="true">No</option>
                                        <option value="1" >Yes</option>

                                    </select>

                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div id="passmark" class="col-md-3" style="display:none;">
                                <div class="form-group{{ $errors->has('passmark') ? ' has-error' : '' }}">
                                    <label for="passmark" >Pass Mark *</label>
                                    <input id="passmark" type="text" class="form-control border-input" placeholder="20" name="passmark" value=""  >
                                    @if ($errors->has('passmark'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('passmark') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- 1. Mark 2. Pass/Fail 3. Other--}}






                        <input type="hidden" name="courses_id" id="courses_id" value="{{$course->id}}">
                        <input type="hidden" name="teachers_id" id="teachers_id" value="{{Auth::user()->id}}">





                        <div>
                            <button type="submit" class="btn btn-info btn-fill btn-wd" style="margin-bottom: 10px;">Next</button>
                            {{--  <a class="btn btn-info btn-fill" title="Next" href="{{route('teacher.result.update',['id'=>4])}}">Next</a>--}}
                        </div>

                    </form>

                    <script>
                        function optionCheck(selectedOption) {
                            if (selectedOption.value == "1") {
                                document.getElementById("totalmark").style.display = "block";
                                document.getElementById("status").style.display = "block";
                            } else {
                                document.getElementById("totalmark").style.display = "none";
                                document.getElementById("status").style.display = "none";
                                document.getElementById("passmark").style.display = "none";
                            }
                        }
                    </script>


                    <script>
                        function optionCheckStatus(selectedOption) {
                            if (selectedOption.value == "1") {
                                document.getElementById("passmark").style.display = "block";
                            } else {
                                document.getElementById("passmark").style.display = "none";
                            }
                        }
                    </script>

                </div>



            </div>


        </div>

    </div>

@endsection