@extends('layout.frontend')

@section('js')
    <script type="text/javascript">
    // SHARE MODAL
    $(function(){
        var form;
        $(document).on("click", ".share-button", function(){
            $('.share-name').text($(this).data('entity'));
            form = $(this).parent();

            $('.modal-share').modal();
        });
    });
    </script>

@endsection
@section('content')

    <section class="blogs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 padding-30px-right xs-padding-15px-right sm-margin-30px-bottom">
                    <div class="posts">
                        <div class="post">
                            <div class="content">
                                @foreach($event->images->chunk(1) as $images)
                                    @foreach($images as $image)
                                        <div class="post-img">
                                            <img alt="{{$event->name}}"
                                                 src="{{ asset($event->get_thumb($image->image)) }}">
                                        </div>
                                    @endforeach
                                @endforeach
                                <div class="post-meta">
                                    <div class="post-title">
                                        <h5>{{$event->name}}</h5>
                                    </div>
                                    <ul class="meta">
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fa fa-bars" aria-hidden="true"></i>
                                                <b>{{$event->event_category->name}}</b>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fa fa-building" aria-hidden="true"></i>
                                                <b>{{$event->faculty->name}}</b>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                                <b>{{$event->workplace->name}}</b>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fa fa-cube" aria-hidden="true"></i>
                                                <b>{{$event->room->name}}</b>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                                <b>{{$event->date}}</b>
                                            </a>
                                        </li>
                                        @if ($event->user_id != null)
                                            @foreach($users as $user)
                                                @if( $event->user_id == $user->id )
                                                    @if( $user->admin == 0 )
                                                        <li>
                                                            <a href="javascript:void(0);">
                                                                <i class="fas fa-user" aria-hidden="true"></i> <b>{{$user->name}}</b>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="post-cont">
                                    <i class="fas fa-comments" aria-hidden="true"></i>
                                    <b>{!! $event->description !!}</b>
                                </div>
                                    <br>
                                @guest
                                        <h6>Prihláste sa</h6>
                                    <input name="email" type="text" class="form-control" placeholder="Zadajte e-mail">

                                            <button class="btn btn-info w-md waves-effect waves-light" type="submit">Prihlásiť sa</button>
                                @else
                                    @if(Auth::user())

                                        <button type="submit" class="btn btn-success waves-effect waves-light">Zúčastním
                                            sa!
                                        </button>
                                    @endif
                                @endguest
                                        </div>


                                <div class="text-right">
                                    <button data-entity="{{ 'Udalosť - ' . $event->name_sk }}" class="share-button btn btn-primary text-white" type="button">
                                        <i class="fa fa-share"></i> Zdieľať udalosť
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
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
                            <img src="{{asset($event->get_event_image($event_image->image))}}" alt="slide1"
                                 class="rev-slidebg">

                            <div class="tp-caption tp-resizeme max-style alt-font" id="slide-1-layer-1"
                                 data-x="['left','left','center','center']"
                                 data-y="['middle','middle','middle','middle']" data-hoffset="['40','40','0','0']"
                                 data-voffset="['-100','-100','-100','-120']" data-width="none" data-height="none"
                                 data-whitespace="nowrap" data-transform_idle="o:1;"
                                 data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-start="1000" data-splitin="chars"
                                 data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05"
                                 style="z-index: 5; white-space: nowrap; color: #fff; font-weight: 700; text-transform: uppercase;">
                                {{$event->name}}
                            </div>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>
@endsection
