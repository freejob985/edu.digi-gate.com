@extends(getTemplate().'.view.layout.layout')
@section('title')
    {{ !empty($setting['site']['site_title']) ? $setting['site']['site_title'] : '' }}
@endsection
@section('page')

    @include(getTemplate() . '.view.parts.slider')

    <div class="container-fluid">
        <div class="row cat-tag-section">
            <div class="container">
                <div class="col-md-2 col-xs-12 tab-con">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary @if($pricing == 'all' || $pricing == '') active @endif">
                            <input type="radio" name="pricing" value="all" @if($pricing == 'all' || $pricing == '') checked @endif> {{ trans('main.all') }}
                        </label>
                        <label class="btn btn-primary @if($pricing == 'free') active @endif">
                            <input type="radio" name="pricing" value="free" @if($pricing == 'free') checked @endif> {{ trans('main.free') }}
                        </label>
                        <label class="btn btn-primary @if($pricing == 'price') active @endif">
                            <input type="radio" name="pricing" value="price" @if($pricing == 'price') checked @endif> {{ trans('main.paid') }}
                        </label>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12 tab-con">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary @if($course == 'all' || $course == '') active @endif">
                            <input type="radio" name="course" value="all" @if($course == 'all' || $course == '') checked @endif> {{ trans('main.all') }}
                        </label>
                        <label class="btn btn-primary @if($course == 'multi') active @endif">
                            <input type="radio" name="course" value="multi" @if($course == 'multi') checked @endif> {{ trans('main.course') }}
                        </label>
                        <label class="btn btn-primary @if($course == 'webinar') active @endif">
                            <input type="radio" name="course" value="webinar" @if($course == 'webinar') checked @endif> {{ trans('main.webinar') }}
                        </label>
                        <label class="btn btn-primary @if($course == 'one') active @endif">
                            <input type="radio" name="course" value="one" @if($course == 'one') active @endif> {{ trans('main.single') }}
                        </label>
                    </div>
                </div>
                <div class="col-md-5 col-xs-12 text-left tab-con">
                    <div class="form-group">
                        <label class="control-label cont-lab-s" for="inputDefault">{{ trans('main.postal_delivery') }}</label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="post-sell">
                            <input type="checkbox" name="post-sell" value="1" @if(!empty(request()->get('post-sell')) && request()->get('post-sell') == 1) checked @endif data-plugin-ios-switch/>
                        </div>
                        &nbsp;&nbsp;
                        <label class="control-label cont-lab-s" for="inputDefault">{{ trans('main.supported_course') }}</label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="support">
                            <input type="checkbox" name="support" value="1" @if(!empty(request()->get('support')) && request()->get('support') == 1) checked @endif data-plugin-ios-switch/>
                        </div>
                        &nbsp;&nbsp;
                        <label class="control-label cont-lab-s" for="inputDefault">{{ trans('main.discount') }}</label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="post">
                            <input type="checkbox" name="off" value="1" @if($off == 1) checked @endif data-plugin-ios-switch/>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 text-left tab-con">
                    <div class="form-group pull-left">
                        <select class="form-control" id="order">
                            <option value="new" @if($order == 'new') selected @endif>{{ trans('main.newest') }}</option>
                            <option value="old" @if($order == 'old') selected @endif>{{ trans('main.oldest') }}</option>
                            <option value="price" @if($order == 'price') selected @endif>{{ trans('main.price_ascending') }}</option>
                            <option value="cheap" @if($order == 'cheap') selected @endif>{{ trans('main.price_descending') }}</option>
                            <option value="sell" @if($order == 'sell') selected @endif>{{ trans('main.most_sold') }}</option>
                            <option value="popular" @if($order == 'popular') selected @endif>{{ trans('main.most_popular') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-20"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="h-20"></div>
                <div class="col-md-12 col-xs-12">
                    <div class="newest-container">
                        <div class="row body body-target body-target-s">
                            <?php $vipIds[] = 0; ?>
                            @if(!empty($vip) && !isset($order) && !isset($pricing) && !isset($course) && !isset($off) && !isset($post_sell) && !isset($q) && !isset($support) && !isset($filters))
                                @foreach($vip as $content)
                                    @if(isset($content->content->id))
                                        <?php
                                            $vipIds[] = $content->content->id;
                                            $meta = arrayToList($content->content->metas, 'option', 'value');
                                        ?>
                                        <div class="col-md-3 col-sm-6 col-xs-12 pagi-content vip-content tab-con">
                                            <a href="/product/{{ $content->content->id }}" title="{{ $content->content->title }}" class="content-box pagi-content-box">

                                                <div class="img-container">
                                                    <img src="{{ $meta['thumbnail'] }}"/>
                                                    <span class="off-badge vip-badge">
                                                        <label class="text-center">{{ trans('main.vip_badge') }}</label>
                                                    </span>
                                                    @if($content->type == 'webinar' || $content->type == 'course+webinar')
                                                        <span class="live_class">Live class</span>
                                                    @endif
                                                </div>
                                                <h3>{!! truncate($content->content->title,30) !!}</h3>
                                                <div class="footer">
                                                    <span class="avatar" title="{{ $content->user->name }}" onclick="window.location.href = '/profile/{{ $content->user->id }}'"><img src="{{ get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar','')) }}"></span>

                                                        <label class="pull-right content-clock">{{ contentDuration($content->id) }}</label>
                                                        <span class="boxicon mdi mdi-clock pull-right"></span>

                                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                  
                                                    <label class="pull-left">{{ price($content->id,$content->category_id,$meta['price'])['price_txt'] ?? 0 }}</label>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <?php $vipIds[] = 0; ?>
                            @endif
                            @foreach($contents as $content)
                                @if(!in_array($content['id'],$vipIds))
                                    <div class="col-md-3 col-sm-6 col-xs-12 pagi-content tab-con">
                                        <a href="/product/{{ $content['id'] }}" title="{{ $content['title'] }}" class="content-box pagi-content-box">

                                            <div class="img-container">
                                                <img src="{{ !empty($content['metas']['thumbnail']) ? $content['metas']['thumbnail'] : '' }}"/>
                                                @if($content['discount'] != null)
                                                    <span class="off-badge">
                                                        <label class="text-center">%{{ !empty($content['discount']['off']) ? $content['discount']['off'] : 0 }}<br><span>{{ trans('main.discount') }}</span></label>
                                                    </span>
                                                @endif
                                                @if($content['type'] == 'webinar' || $content['type'] == 'course+webinar')
                                                    <span class="live_class">Live class</span>
                                                @endif
                                            </div>
                                            <h3>{!! truncate($content['title'],30) !!}</h3>
                                            <div class="footer">
                                                <span class="avatar" title="{{ !empty($content['user']['name']) ? $content['user']['name'] : '' }}" onclick="window.location.href = '/profile/{{ $content['user']['id'] }}'"><img src="{{ get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar','')) }}"></span>

                                                    <label class="pull-right content-clock">{{ contentDuration($content['id']) }}</label>
                                                    <span class="boxicon mdi mdi-clock pull-right"></span>

                                                <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                {{--  @dd("Catch errors for script and full tracking ( 2)");  --}}
                                                @php
                                               $contents_meta = DB::table('contents_meta')->where('option','Discount')->where('content_id',$content['id'])->value('value');
                                               $content_rate[] = DB::table('content_rate')->where('content_id',$content['id'])->value('rate');
                                                @endphp
                                                <label class="pull-left"> قبل الخصم: @if(isset($content['metas']['price'])) {{ price($content['id'],$content['category_id'],$content['metas']['price'])['price_txt'] ?? 0 }} @endif</label>
                                                <label class="pull-left"> بعد الخصم : {{$contents_meta}}$</label>
                                                <div class="col-xs-12 col-md-4 text-left">
                                                    <div class="raty-product-section">
                                                        <div class="raty"></div>
                                                
                                                        <span class="raty-text">({{ count( $content_rate ) }} {{ trans('main.votes') }})</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="h-10"></div>
                        <div class="pagi text-center center-block col-xs-12"></div>
                        <div class="row pagi-s">
                            @if(isset($ads))
                                @foreach($ads as $ad)
                                    @if($ad->position == 'category-pagination-bottom')
                                        <a href="{{ $ad->url }}"><img src="{{ $ad->image }}" class="{{ $ad->size }}" id="cat-side"></a>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include(getTemplate() . '.view.parts.container')
    
    @if(isset($setting['site']['main_page_newest_container']) and $setting['site']['main_page_newest_container'] == 1)
        @include(getTemplate() . '.view.parts.newest')
    @endif
    @if(isset($setting['site']['main_page_popular_container']) and $setting['site']['main_page_popular_container'] == 1)
        @include(getTemplate() . '.view.parts.popular')
        @include(getTemplate() . '.view.parts.most_sell')
    @endif
    @if(isset($setting['site']['main_page_vip_container']) and $setting['site']['main_page_vip_container'] == 1)
        @include(getTemplate() . '.view.parts.vip')
    @endif
    @include(getTemplate() . '.view.parts.news')
    {{--  Software additions  --}}


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(), 'guest' => !auth()->check()]); ?>;
    </script>
    
    <script type="application/javascript" src="/assets/default/vendor/jquery-ui/js/jquery-1.10.2.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/justgage/raphael-2.1.4.min.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/justgage/justgage.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/simplepagination/jquery.simplePagination.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/onloader/js/jquery.oLoader.min.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/ios7-switch/ios7-switch.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/sticky/jquery.sticky.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/chartjs/Chart.min.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/bootstrap-notify-master/bootstrap-notify.min.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/auto-numeric/autoNumeric.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/raty/jquery.raty.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/easyautocomplete/jquery.easy-autocomplete.min.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/owlcarousel/dist/owl.carousel.min.js"></script>
    <script type="application/javascript" src="/assets/default/vendor/jquery-te/jquery-te-1.4.0.min.js"></script>
    <script type="application/javascript">var sliderTimer = <?=get_option('main_page_slider_timer', 10000);?>;</script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        var preloader = {!! get_option('site_preloader',0) !!};
    </script>
    <script type="application/javascript" src="/assets/default/javascripts/view-custom.js"></script>
    @if(isset($user))
        <script>login({!! $user['id'] !!})</script>
    @endif
    @if(get_option('site_popup',0) == '1' && session('popup') == 0)
        <script>
            $(function () {
                $('#site_popup').modal();
            })
        </script>
        @php session(['popup'=>1]) @endphp
    @endif
    @yield('script')
    @if(session('msg') != null)
        <script>
            $.notify({
                message: '{{ session('msg')}}'
            }, {
                type: 'danger',
                allow_dismiss: false,
                z_index: '99999999',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                position: 'fixed'
            });
        </script>
        @endif
        {!! get_option('main_js') !!}
@endsection
@section('script')
    <script>
        $(function () {
            pagination('.body-target', {{ !empty($setting['site']['category_content_count']) ? $setting['site']['category_content_count'] : 6 }}, 0);
            $('.pagi').pagination({
                items: {!! count($contents) !!},
                itemsOnPage:  {{ !empty($setting['site']['category_content_count']) ? $setting['site']['category_content_count'] : 6 }},
                cssStyle: 'light-theme',
                prevText: 'Pre.',
                nextText: 'Next',
                onPageClick: function (pageNumber, event) {
                    pagination('.body-target', {{ !empty($setting['site']['category_content_count']) ? $setting['site']['category_content_count'] : 6 }}, pageNumber - 1);
                }
            });
        });
    </script>
    <script type="application/javascript" src="/assets/default/javascripts/category-page-custom.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script>
        var Countdown = {
            $el: $('.countdown'),
            countdown_interval: null,
            total_seconds: 18000,
            init: function () {
                this.$ = {
                    hours: this.$el.find('.bloc-time.hours .figure'),
                    minutes: this.$el.find('.bloc-time.min .figure'),
                    seconds: this.$el.find('.bloc-time.sec .figure')
                };
                this.values = {
                    hours: this.$.hours.parent().attr('data-init-value'),
                    minutes: this.$.minutes.parent().attr('data-init-value'),
                    seconds: this.$.seconds.parent().attr('data-init-value'),
                };
                this.total_seconds = this.values.hours * 60 * 60 + (this.values.minutes * 60) + this.values.seconds;
                this.count();
            },
            count: function () {
                var that = this,
                    $hour_1 = this.$.hours.eq(0),
                    $hour_2 = this.$.hours.eq(1),
                    $min_1 = this.$.minutes.eq(0),
                    $min_2 = this.$.minutes.eq(1),
                    $sec_1 = this.$.seconds.eq(0),
                    $sec_2 = this.$.seconds.eq(1);
                this.countdown_interval = setInterval(function () {
                    if (that.total_seconds > 0) {
                        --that.values.seconds;
                        if (that.values.minutes >= 0 && that.values.seconds < 0) {
                            that.values.seconds = 59;
                            --that.values.minutes;
                        }
                        if (that.values.hours >= 0 && that.values.minutes < 0) {
                            that.values.minutes = 59;
                            --that.values.hours;
                        }
                        that.checkHour(that.values.hours, $hour_1, $hour_2);
                        that.checkHour(that.values.minutes, $min_1, $min_2);
                        that.checkHour(that.values.seconds, $sec_1, $sec_2);
                        --that.total_seconds;
                    } else {
                        clearInterval(that.countdown_interval);
                    }
                }, 1000);
            },
            animateFigure: function ($el, value) {
                var that = this,
                    $top = $el.find('.top'),
                    $bottom = $el.find('.bottom'),
                    $back_top = $el.find('.top-back'),
                    $back_bottom = $el.find('.bottom-back');
                $back_top.find('span').html(value);
                $back_bottom.find('span').html(value);
                TweenMax.to($top, 0.8, {
                    rotationX: '-180deg',
                    transformPerspective: 300,
                    ease: Quart.easeOut,
                    onComplete: function () {
                        $top.html(value);
                        $bottom.html(value);
                        TweenMax.set($top, {rotationX: 0});
                    }
                });
                TweenMax.to($back_top, 0.8, {
                    rotationX: 0,
                    transformPerspective: 300,
                    ease: Quart.easeOut,
                    clearProps: 'all'
                });
            },
            checkHour: function (value, $el_1, $el_2) {
                var val_1 = value.toString().charAt(0),
                    val_2 = value.toString().charAt(1),
                    fig_1_value = $el_1.find('.top').html(),
                    fig_2_value = $el_2.find('.top').html();

                if (value >= 10) {
                    if (fig_1_value !== val_1) this.animateFigure($el_1, val_1);
                    if (fig_2_value !== val_2) this.animateFigure($el_2, val_2);
                } else {
                    if (fig_1_value !== '0') this.animateFigure($el_1, 0);
                    if (fig_2_value !== val_1) this.animateFigure($el_2, val_1);
                }
            }
        };
        Countdown.init();
    </script>

  
@endsection

