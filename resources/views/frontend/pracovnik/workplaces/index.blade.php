@extends('layout.pracovnik')
@section('page-title')
    Pracoviska
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
                                    <h4 class="mt-0 header-title">Zoznam pracovísk</h4>
                                </div>
                            </div>

                            @include('frontend.pracovnik._partials._alert')
                            @include('frontend.pracovnik.workplaces._partials._table')

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
