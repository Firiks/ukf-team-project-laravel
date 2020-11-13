@extends('layout.frontend')

@section('content')
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="img/bg/bg9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-heading">
                    <h1>Udalosti</h1>
                    <div class="col-md-12">
                        <ul>
                            <li>
                                <a href="{{ route('web.home', app()->getLocale()) }}">
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    Udalosti
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blogs ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="side-bar">
                        <div class="widget">
                            <div class="widget-title">
                                <h6>{{__('Categories')}}</h6>
                            </div>
                            <ul>
                                <li>
                                    <a href="{{ route('web.events', app()->getLocale()) }}">{{__('All categories')}}</a>
                                </li>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('web.events', ['language' => app()->getLocale(), 'event_category_id' => $category->id]) }}" class="{{ request('event_category_id') == $category->id ? 'active-filter' : '' }}">
                                            {{$category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-12 padding-30px-right xs-padding-15px-right sm-margin-30px-bottom">
                    @foreach($events->chunk(2) as $items)
                        <div class="row">
                            @foreach($items as $event)
                                <div class="col-lg-6 col-md-12 margin-30px-bottom sm-margin-20px-bottom">
                                    <div class="blog-grid">
                                        @foreach($event->images->chunk(1) as $images)
                                            @foreach($images as $image)
                                                <div class="blog-grid-img">
                                                    <img alt="{{ $event->name }}" src="{{asset($event->get_image($image->image))}}">
                                                </div>
                                            @endforeach
                                        @endforeach
                                        <div class="blog-grid-text">
                                            <span>{{$event->event_category->name}}</span>
                                            <div class="data-box-grid">
                                                <p>{{$event->date}}</p>
                                            </div>
                                            <h4>{{$event->name}}</h4>
                                            <div class="margin-10px-top text-left">
                                                <a href="{{ route('web.event', ['language' => app()->getLocale(), 'slug' => $event->slug]) }}" class="butn small">
                                                    <span>{{__('View')}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-3"></div>
                <div class="col-md-12 col-lg-9">
                    <div class="text-center margin-60px-top sm-margin-30px-top">
                        <div class="pagination text-small text-uppercase text-extra-dark-gray">
                            {{ $events->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
