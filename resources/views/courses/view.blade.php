

@extends((( Auth::user()->role="admin") ? 'template.macosdoc.master.admin' : 'template.macosdoc.master.teacher' ))
@section('title')
    View Course -
@endsection

@section('page-name')
    :: View Course
@endsection

@section('section-name')

    View Course - {{$data->name}} ({{$data->codename}})
@endsection

@section('content')
    @include('includes.message-block')
    <div class="content table-responsive table-full-width">

        <table class="table">

            <tbody>
            <tr>
                <th scope="row">Name</th>
                <td>{{$data->name}}</td>
            </tr>

            <tr>
                <th scope="row">Code Name</th>
                <td>{{$data->codename}}</td>
            </tr>

            <tr>
                <th scope="row">Description</th>
                <td>{{$data->description}}</td>
            </tr>

            <tr>
                <th scope="row">Sessions</th>
                <td>{{$data->sessions->name}}</td>
            </tr>

            <tr>
                <th scope="row">Start</th>
                <td>{{$data->start->format('jS F, Y')}}</td>
            </tr>

            <tr>
                <th scope="row">End</th>
                <td>{{$data->end->format('jS F, Y')}}</td>
            </tr>

            </tbody>


        </table>






    </div>



    <div class="card">
        <div class="content">

            <h4 >Class Schedule:</h4>
        <div class="container-fluid">
            <div class="row">
                <table class="table ">
                    <thead>
                    <th>Day</th>
                    <th>Period</th>
                    <th>Building</th>
                    <th>Room</th>
                    <th>Teacher</th>
                 {{--   <th>Action</th>--}}
                    </thead>
                    <tbody>

                    @foreach($schedule as $i=>$s)
                        <tr>
                            <td>{{$s->day->name }}</td>
                            <td>{{$s->period->name}}</td>
                            <td>{{$s->building->name}}</td>
                            <td>{{$s->room->roomnumber}}</td>
                            <td>{{$s->teacher->name}}</td>
                            <td>

                                <div class="button_action" style="text-align:left">

                                    {{--
                                                                        <a class="btn btn-xs btn-success btn-edit" title="Edit Data" href="{{route('admin.edit',['id'=>$s->id])}}"><i class="fa fa-pencil"></i></a>

                                                                      <a class="btn btn-xs btn-warning btn-delete" title="Delete" href="{{route('admin.delete',['id'=>$s->id])}}" onclick="return confirm('Are you sure that you want to delete?');"><i class="fa fa-trash"></i></a>


 --}}


                                </div>
                            </td>
                        </tr>
                    @endforeach





                    </tbody>
                </table>
        <form action="{{ route('post.add.courseperiod') }}" role="form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">

                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('days_id') ? ' has-error' : '' }}">
                        <label for="days_id" >Day * </label>
                        <select  required class="form-control input-wd border-input" name="days_id" id="days_id">
                            <option value="" disabled="true" selected="true">Select Day</option>
                            @foreach($day as $d)
                                <option value="{{$d->id}}">{{$d->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('days_id'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('days_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('periods_id') ? ' has-error' : '' }}">
                        <label for="periods_id" >Period * </label>
                        <select class="form-control input-wd border-input" name="periods_id" id="periods_id" required>
                            <option value="" disabled="true" selected="true">Select Period</option>
                            @foreach($period as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('periods_id'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('periods_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>







                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('buildings') ? ' has-error' : '' }}">
                        <label for="buildings" >Building</label>
                        <select class="form-control input-wd border-input building" name="building" id="building" required>
                            <option value=""  selected="true">Select Building</option>
                            @foreach($building as $b)
                                <option value="{{$b->id}}">{{$b->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('buildings'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('buildings') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

                <script>
                    $('#building').on('change',function (e) {
                        console.log(e);
                        console.log("hi");
                        var z="Checking rooms ..";
                        $('#rooms').append('<option value="0">'+z+'</option>')
                        var buildings_id=e.target.value;
                        $.get('{{getenv('baseurl')}}/ajaxGetRooms-'+buildings_id,function(data){
                            //success data
                            console.log("partial");
                            
                            
                           $('#rooms').empty();
                            if(Object.keys(data).length>0){
                                var z="Select Room ("+Object.keys(data).length+")";
                                $('#rooms').append('<option value="">'+z+'</option>')
                                console.log("partial2");
                                $.each(data,function (index,roomObj) {
                                    $('#rooms').append('<option value="'+roomObj.id+'"  >'+roomObj.roomnumber+'</option>')
                                });}
                            else
                                $('#rooms').append('<option value="">No room created</option>')
                        });
                                
                                
                                
                        

                    });
                </script>

                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
                        <label for="rooms" >Room </label>
                        <select required class="form-control input-wd border-input" name="rooms" id="rooms" >
                            <option value="" selected="true">Select Room</option>


                        </select>

                        @if ($errors->has('rooms'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('rooms') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>









                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('teachers_id') ? ' has-error' : '' }}">
                        <label for="teachers_id" >Teacher * </label>

                        <select class="border-input templatingselect2 form-control input-wd" name="teachers_id1" id="teachers_id1" required>
                            <option value="" title="Select Teacher" disabled="true" selected="true">Select Teacher</option>
                            @foreach($teacher as $t)
                                <option value="{{$t->avatar}}" title="{{$t->id}}">{{$t->name}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('teachers_id'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('teachers_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                        function setCurrency (currency) {
                            if (!currency.id) { return currency.text; }
                            var $currency = $('<span class=" input-wd"><img src="{{getenv('baseurl')}}/uploads/avatars/'+currency.element.value+'" class="img-flag" style="margin-right: 10px;"/>'   + currency.text + '</span>');
                            return $currency;
                        };
                        $(".templatingselect2").select2({
                            placeholder: "Select Teacher", //placeholder
                            templateResult: setCurrency,
                            templateSelection: setCurrency
                        });
                        $(".templatingselect2").change(function () {
                            var obj = $(".templatingselect2").select2("data");
                            console.log(obj);
                            document.getElementById("teachers_id").value = obj[0].title;
                        });
                    })
                </script>

            </div>



            <input type="hidden" name="courses_id" id="courses_id" value="{{$data->id}}">
            <input type="hidden" name="teachers_id" id="teachers_id" value="47">

            <button type="submit" class="btn btn-info btn-fill btn-wd" style="margin-bottom: 10px;">Add Schedule</button>

        </form>

            </div>
        </div>
        </div>
    </div>
@endsection