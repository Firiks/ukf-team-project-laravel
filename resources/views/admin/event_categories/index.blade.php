@extends('layout.admin')

@section('page-title')
    Kategórie udalostí
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Kategórie udalostí</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h4 class="mt-0 header-title">Zoznam kategórií</h4>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <p class="text-muted m-b-30 text-right">
                                        <a href="{{ route('event_categories.create') }}" class="btn btn-primary waves-effect waves-light">
                                            <i class="fa fa-plus pr-2"></i>
                                            Pridať kategóriu
                                        </a>
                                    </p>
                                </div>
                            </div>

                            @include('admin._partials._alert')
                            @include('admin.event_categories._partials._table')

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
