@if(Session::has('message'))
<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

    {{Session::get('message')}}

</div>
@endif

@if(Session::has('error-message'))
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

        {{Session::get('error-message')}}

    </div>
@endif