@if (\Session::has("message"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! \Session::get("message") !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (\Session::has("message_danger"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! \Session::get("message_danger") !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (\Session::has("message_warning"))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {!! \Session::get("message_warning") !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (\Session::has("message_info"))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {!! \Session::get("message_info") !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (count($errors))
    <div class="alert alert-danger" >
        <ul style="margin-bottom: 1px; list-style-type: none;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif