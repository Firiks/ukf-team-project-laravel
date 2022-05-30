@if(session('message') && session('type'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-{{ session('type')  }} alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {!! session('message') !!}
            </div>
        </div>
    </div>
@endif