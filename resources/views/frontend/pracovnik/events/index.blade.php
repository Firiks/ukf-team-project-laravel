@extends('layout.pracovnik')
@section('page-title')
    Udalosti
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
                                    <h4 class="mt-0 header-title">Zoznam udalostí</h4>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <p class="text-muted m-b-30 text-right">
                                        <a href="{{ route('pracovnik.events.create', ['language' => app()->getLocale()]) }}" class="btn btn-primary waves-effect waves-light">
                                            <i class="fa fa-plus pr-2"></i>
                                            Pridať udalosť
                                        </a>
                                    </p>
                                </div>
                            </div>

                            @include('frontend.pracovnik._partials._alert')
                            @include('frontend.pracovnik._partials._table')

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
