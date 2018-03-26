@extends('template.macosdoc.master.student')

@section('title')
    Student Panel
@endsection

@section('page-name')

    :: Homework
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
                        <h4 style=""><strong></strong></h4>
                        @if(empty($homework->filepath))
                            <strong>Atatched File: </strong>No
                        @else
                            <strong>Atatched File: </strong> Yes <a href="{{getenv('storageurl')}}/storage/app/{{$homework->filepath}}">(download)</a>
                        @endif
                        <h4 ><strong></strong></h4>
                        <strong>Created: </strong>
                        {{$homework->created_at}}
                        <h4 ><strong></strong></h4>
                        <strong>Deadline: </strong>
                        {{$homework->deadline}}




                        <h4 style="margin-top:20px;"><strong>Status</strong></h4>
                        @if(empty($hwsubmission->id))
                            <strong>Status: </strong>Not Submitted
                            <h4 ><strong></strong></h4>
                            <strong>Attempt: </strong>0
                        @else
                            <strong>Status: </strong> {{$hwsubmission->status}}
                            <h4 ><strong></strong></h4>
                            <strong>Attempt: </strong>{{$hwsubmission->attempts}}
                        @endif
                        <h4 style="margin-top:20px;"><strong></strong></h4>

                        <h4 style="margin-top:20px;"><strong>Submission</strong></h4>
                        @if(nullValue($hwsubmission))

                            <strong>Your solution: </strong>
                            (Tips: Write your homework solution here. Alternatively, you can also upload the soluation as pdf or image file.)
                            <h4 ><strong></strong></h4>

                            <form action="{{ route('post.evaluate.homework') }}" role="form" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group{{ $errors->has('correction') ? ' has-error' : '' }}">
                                            <textarea rows="3" id="correction" type="text" class="form-control border-input" placeholder="Here can be your solution" name="correction">{{ old('correction') }}</textarea>
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

                                        <strong>Attach Solution File: </strong> (optional)
                                        <h4 ><strong></strong></h4>
                                        <div class="form-group{{ $errors->has('filepath') ? ' has-error' : '' }}">
                                            <input type="file" id="filepath"  class="form-control border-input"  name="filepath" value="{{ old('filepath') }}">

                                            @if ($errors->has('filepath'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('filepath') }} Maximum image size allowed is 2 MB, minimum image resolution 100 X 100 pixel, maximum: 500 X 500 pixel, image must be square.</strong>
                                    </span>
                                            @endif
                                        </div>


                                    </div>




                                 </div>




                                <button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
                            </form>
                        @endif



                    </div>




                </div>
            </div>
        </div>
    </div>
@endsection