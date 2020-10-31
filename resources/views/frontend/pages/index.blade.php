@extends('layout.frontend')

@section('content')

    <!-- Introduction -->
    <section class="bg-light-gray">
        <div class="container">
            <div class="text-center section-heading">
                <h1>{{__('Welcome')}}</h1>
                <h4 class="text-center">{{__('This is the events calendar')}}</h4>
            </div>
            <h6 class="text-center">{{__('You will find current info on the upcoming events here')}}</h6>
        </div>
    </section>

    <!-- Events -->
    <section>
        <div class="container">
            <div class="section-heading">
                <h3>{{__('Upcoming events')}}</h3>
            </div>
            @foreach($events->chunk(3) as $items)
                <div class="row">
                    @foreach( $items as $event)
                        <div class="col-lg-4 col-md-12 sm-margin-20px-bottom">
                            <div class="blog-grid">
                                @foreach($event->images->chunk(1) as $images)
                                    @foreach($images as $image)
                                        <div class="blog-grid-img">
                                            <img alt="{{$event->name}}" src="{{ asset($event->get_thumb($image->image)) }}">
                                        </div>
                                    @endforeach
                                @endforeach
                                <div class="blog-grid-text">
                                    <h4>{{ $event->name }}</h4>
                                    <span> {{$event->event_category->name}}</span>
                                    <div class="data-box-grid">
                                        <p>{{$event->formatted_created_at}}</p>
                                    </div>
                                    <div class="margin-10px-top">
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
    </section>

@endsection
