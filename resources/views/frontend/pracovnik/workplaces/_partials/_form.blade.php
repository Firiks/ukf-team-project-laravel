<div class="row mb-3">
    <div class="col-sm-6 col-md-6">
        <div class="form-group">
            <label>Zadajte kod ktory ste dostali na <strong>mail</strong>.</label>
            <input name="kod_check" type="hidden" value="{{ $kod }}">
            <input name="kod" type="text" value="" class="form-control {{ $errors->has("kod") ? 'parsley-error' : '' }}">
            @include('admin._partials._errors', ['column' => "kod"])
        </div>
    </div>
</div>
