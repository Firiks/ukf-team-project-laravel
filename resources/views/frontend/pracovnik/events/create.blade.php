@extends('layout.pracovnik')

@section('page-title')
    Udalosti
@endsection

@section('content')

    <section class="bg-light-gray">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Udalosti</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h4 class="mt-0 header-title">Nová udalosť</h4>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <p class="text-muted m-b-30 text-right">
                                        <a href="{{ route('pracovnik.events', ['language' => app()->getLocale()]) }}" class="btn btn-primary waves-effect waves-light">
                                            <i class="fa fa-list pr-2"></i>
                                            Zoznam udalostí
                                        </a>
                                    </p>
                                </div>
                            </div>

                            <form action="{{ route('pracovnik.events.store', ['language' => app()->getLocale()]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.events._partials._form')

                                @include('admin._partials._buttons')
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
