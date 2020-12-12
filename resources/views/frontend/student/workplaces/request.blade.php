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
                                        <a href="{{ route('student.workplaces', ['language' => app()->getLocale()]) }}" class="btn btn-primary waves-effect waves-light">
                                            <i class="fa fa-list pr-2"></i>
                                            Zoznam pracovísk
                                        </a>
                                    </p>
                                </div>
                            </div>

                            @include('admin._partials._alert')

                            <form action="{{ route('student.workplaces.request.store', app()->getLocale()) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('frontend.student.workplaces._partials._form')

                                @include('admin._partials._buttons')
                            </form>

                        </div>
                    </div>
                </div>

            </div>
    </section>

@endsection
