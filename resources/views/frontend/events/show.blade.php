@extends('layout.frontend')

@section('content')
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="7" data-background="img/bg/bg9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{$event->name}}</h1>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li>
                            <a href="{{ route('web.home', app()->getLocale()) }}">
                                {{ __('Home') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('web.events', app()->getLocale()) }}">
                                Udalosti
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                {{$event->name}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="rev_slider_wrapper custom-controls custom-paragraph">
        <div id="rev_slider_2" class="rev_slider" style="display: none;" data-version="5.4.5">
            <ul>
                @foreach($event->event_images->chunk(10) as $items)
                    @foreach($items as $event_image)
                        <li data-transition="parallaxtoright">
                            <div class="opacity-very-light bg-black z-index-1"></div>
                            <img src="{{asset($event->get_event_image($event_image->image))}}" alt="slide1" class="rev-slidebg">

                            <div class="tp-caption tp-resizeme max-style alt-font" id="slide-1-layer-1" data-x="['left','left','center','center']" data-y="['middle','middle','middle','middle']" data-hoffset="['40','40','0','0']" data-voffset="['-100','-100','-100','-120']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-start="1000" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="z-index: 5; white-space: nowrap; color: #fff; font-weight: 700; text-transform: uppercase;">
                                {{$event->name}}
                            </div>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>

    <section class="blogs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 padding-30px-right xs-padding-15px-right sm-margin-30px-bottom">
                    <div class="posts">
                        <div class="post">
                            <div class="content">
                                <div class="post-meta">
                                    <div class="post-title">
                                        <h5>{{$event->name}}</h5>
                                    </div>
                                    <ul class="meta">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fa fa-folder-open" aria-hidden="true"></i> {{$event->event_category->name}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fas fa-calendar-alt" aria-hidden="true"></i> {{$event->formatted_created_at}}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="post-cont">
                                    {!! $event->description !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
