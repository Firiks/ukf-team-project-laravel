@extends('layout.student')

@section('page-title')
    Pracoviská
@endsection

@section('content')

    <section class="bg-light-gray">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h6 class="mt-0 header-title">Žiadost pridania na pracovisko - {{ $workplace->name_sk }}</h6>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <p class="text-muted m-b-30 text-right">
                                        <a href="{{ route('pracovnik.workplaces', ['language' => app()->getLocale()]) }}" class="btn btn-primary waves-effect waves-light">
                                            <i class="fa fa-list pr-2"></i>
                                            Zoznam pracovísk
                                        </a>
                                    </p>
                                </div>
                            </div>

                            @include('admin._partials._alert')

                            <form action="{{ route('pracovnik.workplaces.request.store', $workplace->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label>Zadajte 6-miestny kód pracoviska</label>
                                            <input name="kod" type="number" placeholder="******" class="form-control {{ $errors->has("kod") ? 'parsley-error' : '' }}">
                                            @include('admin._partials._errors', ['column' => "kod"])
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-10px-left">
                                    <button type="submit" class="butn medium">
                                        <span>Uložiť</span>
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
    </section>

@endsection
