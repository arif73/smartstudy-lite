@extends('template.macosdoc.master.teacher')

@section('title')
    Teacher Panel
@endsection

@section('page-name')

    :: Homework Evaluation
@endsection

@section('section-name')

    <strong>Homework: </strong>{{$homework->name}}

@endsection


@section('content')

    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="content  table-full-width">
                        @include('includes.message-block')

                        <h4 ><strong>Task</strong></h4>
                        {{$homework->task}}
                        <h4 style="margin-top:20px;"><strong></strong></h4>
                        <strong>Created: </strong>
                        {{$homework->created_at}}
                        <h4 ><strong></strong></h4>
                        <strong>Deadline: </strong>
                        {{$homework->deadline}}

                        <h4 style="margin-top:20px;"><strong>Student</strong></h4>
                        <strong>Name: </strong>
                        {{$data->user->name}}
                        <h4 ><strong></strong></h4>
                        <strong>Roll: </strong>
                        {{$data->student->id}}


                        <h4 style="margin-top:20px;"><strong>Submission</strong></h4>
                        <strong>Homework submitted: </strong>
                        {{$data->created_at}}
                        <h4 ><strong></strong></h4>
                        <strong>Provided Solution: </strong>
                        <h4 ><strong></strong></h4>
                        {{$data->text}}
                        <h4 ><strong></strong></h4>
                        <strong>Attached file: </strong>

                        @if(empty($data->filepath))
                        No
                        @else
                            {{$data->filepath}}
                        @endif
                        <h4 ><strong></strong></h4>
                        <strong>Attempts: </strong>{{$data->attempts}}

                        <h4 style="margin-top:20px;"><strong>Evaluation</strong></h4>
                        <strong>Correction: </strong>
                        (Tips: Copy the provided solution and paste in the following field and make correction. Alternatively, upload the correction file)
                        <h4 ><strong></strong></h4>

                        <form action="{{ route('post.evaluate.homework') }}" role="form" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group{{ $errors->has('correction') ? ' has-error' : '' }}">
                                    <textarea rows="3" id="correction" type="text" class="form-control border-input" placeholder="Here can be your correction" name="correction">{{ $data->correction }}</textarea>
                                    @if ($errors->has('correction'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('correction') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>



                        <div class="row">

                            <div class="col-md-4">
                                @if(empty($data->correctionfile))
                                <strong>Correction file: (Max 1 MB)</strong>
                                @else
                                    <strong>Correction file: (Max 1 MB)</strong>  <a href="{{getenv('storageurl')}}/storage/app/{{$data->correctionfile}}">(already uploaded)</a> <a href="{{Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix()}}">try</a>
                                @endif
                                    <h4 ><strong></strong></h4>
                                <div class="form-group{{ $errors->has('correctionfile') ? ' has-error' : '' }}">
                                    <input type="file" id="correctionfile"  class="form-control border-input"  name="correctionfile" value="{{ old('correctionfile') }}">

                                    @if ($errors->has('correctionfile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('correctionfile') }} Maximum image size allowed is 2 MB, minimum image resolution 100 X 100 pixel, maximum: 500 X 500 pixel, image must be square.</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>




                            <div class="col-md-6">
                               <strong>Comment:</strong>
                                <h4 ><strong></strong></h4>
                                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">


                                    <textarea rows="1" id="comment" type="text" class="form-control border-input" placeholder="Comment (optional)" name="comment">{{ $data->comment}}</textarea>
                                    @if ($errors->has('comment'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>



                    <div class="row">
                        <div class="col-md-12">

                        <strong>Current Status:</strong>
                            {{$data->status}}
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <h4 ><strong></strong></h4>
                                <strong>Change Status:</strong>
                                <h4 ><strong></strong></h4>

                                <select class="form-control input-wd border-input" name="status" id="status">
                                    <option value="Submitted, waiting for approval" selected>Submitted, waiting for approval</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Not approved, correction required">Not approved, correction required</option>
                                    <option value="Copied">Copied</option>
                                    <option value="Rejected">Rejected</option>
                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group{{ $errors->has('resubmit') ? ' has-error' : '' }}">
                                <h4 ><strong></strong></h4>
                                <strong>Can student resubmit homework?:</strong>
                                <h4 ><strong></strong></h4>

                                <select class="form-control input-wd border-input" name="resubmit" id="resubmit">
                                    <option value="0" selected>No</option>
                                    <option value="1">Yes</option>
                                </select>

                                @if ($errors->has('resubmit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('resubmit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        </div>
                            <input type="hidden" name="id" id="id" value="{{$data->id}}">
                            <input type="hidden" name="homework_id" id="homeworks_id" value="{{$data->homeworks_id}}">
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Submit Evaluation</button>
                    </form>



                </div>




                </div>
            </div>
        </div>
    </div>
@endsection