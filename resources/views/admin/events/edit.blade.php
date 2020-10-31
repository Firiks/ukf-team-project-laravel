@extends('layout.admin')

@section('page-title')
    Udalosti
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">

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
                                    <h4 class="mt-0 header-title">Editovať udalosť - {{ $event->name_sk }}</h4>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <p class="text-muted m-b-30 text-right">
                                        <a href="{{ route('events.index') }}" class="btn btn-primary waves-effect waves-light">
                                            <i class="fa fa-list pr-2"></i>
                                            Zoznam udalostí
                                        </a>
                                    </p>
                                </div>
                            </div>

                            @include('admin._partials._alert')

                            <form action="{{ route('events.update', $event->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.events._partials._form')

                                @include('admin._partials._buttons')
                            </form>

                            <div class="dropdown-divider"></div>

                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <h4 class="mt-0 header-title">Obrázok</h4>

                                    @foreach($event->images as $image)
                                        <div class="">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="image-wrapper mb-3">
                                                        <img src="{{ asset($event->get_thumb($image->thumb)) }}" class="img-responsive">
                                                        <div class="image-wrapper-back">
                                                            <div class="image-wrapper-back-actions">
                                                                <a href="{{ asset($event->get_image($image->image)) }}" class="show-icon image-popup-vertical-fit">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                                <form action="{{ route('images.delete', $image->id) }}" method="post">
                                                                    @csrf
                                                                    <button data-entity="{{ 'Obrázok - ' . $image->image }}" class="delete-button delete-icon pointer" type="button">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-12">
                                    <h4 class="mt-0 header-title">Obrázky</h4>

                                    <div class="">
                                        <div class="row">
                                            @foreach($event->event_images as $event_image)
                                                <div class="col-sm-3">
                                                    <div class="image-wrapper mb-3">
                                                        <img src="{{ asset($event->get_event_thumb($event_image->thumb)) }}" class="img-responsive">
                                                        <div class="image-wrapper-back">
                                                            <div class="image-wrapper-back-actions">
                                                                <a href="{{ asset($event->get_event_image($event_image->image)) }}" class="show-icon image-popup-vertical-fit">
                                                                    <i class="far fa-eye"></i>
                                                                </a>
                                                                <form action="{{ route('event_images.delete', $event_image->id) }}" method="post">
                                                                    @csrf
                                                                    <button data-entity="{{ 'Obrázok - ' . $event_image->event_image }}" class="delete-button delete-icon pointer" type="button">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
