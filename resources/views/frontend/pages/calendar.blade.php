@extends('layout.frontend')

@section('content')
    <!-- Date form -->
    <section class="bg-light-gray">
        <div class="container">
            <div class="text-center section-heading">
                <h3>{{__('Choose a date')}}</h3>
            </div>
            <form action="{{ route('web.calendar', [app()->getLocale(), request()->get('date')])  }}">
                <div class="form-group">
                    <div class="input-group">
                        <input name="date" type="date" class="form-control" value="{{ $date }}">
                        <div class="input-group-btn">
                            <button type="submit" class="butn medium">
                                <span>{{ __('View events') }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <!-- Events -->
        <div class="container">
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
                                        <p>{{$event->date}}</p>
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
