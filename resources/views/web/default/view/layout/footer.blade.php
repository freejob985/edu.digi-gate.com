<!-- Footer Start -->
        <footer id="rs-footer" class="rs-footer home9-style" style="background-color: #273c66;background-image:url('bin/admin/files/cmsdef/footer-bg.png');">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                            <h3 class="widget-title">من نحن</h3>
                              <div class="textwidget white-color  md-pr-15"><p style="color:#fff;">
نحن خبرة، بدأنا عندما أدركنا أن تدريب الفرد والاهتمام بمهاراته العملية مهمتنا، فقررنا أن نغير من واقع التدريب الالكتروني ونصنع الفرق من خلال منصة تدريبية الكترونية تقدم الدورات والبرامج التدريبية المبتكرة، الاستشارات المهنية، وخدمات تدريبية متنوعة أخرى.
							  </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                            <h3 class="widget-title">تواصل معنا</h3>
                            <ul class="address-widget">
                                <li>
                                    <i class="flaticon-location"></i>
                                    <div class="desc">الشارع, المدينة</div>
                                </li>
                                <li>
                                    <i class="flaticon-call"></i>
                                    <div class="desc">
                                       <a href="tel:(+880)155-69569">0000000</a>
                                    </div>
                                </li>
                                <li>
                                    <i class="flaticon-email"></i>
                                    <div class="desc">
                                        <a href="mailto:support@rstheme.com">support@rstheme.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 pl-50 md-pl-15 footer-widget md-mb-50">
                            <h3 class="widget-title">روابط هامة</h3>
                            <ul class="site-map">
                                <li><a href="#">شروط الاستخدام</a></li>
                                <li><a href="#">سياسة الخصوصية</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                            <h3 class="widget-title">احدث الانشطة</h3>
                            <div class="recent-post mb-20">
                                <div class="post-img">
                                    <img src="bin/admin/Thumbnail/Data-Engineering.png" alt="">
                                </div>
                                <div class="post-item">
                                    <div class="post-desc">
                                        <a href="#">تحقيق الريادة والتميز في مجال التعليم والتدريب الالكتروني .</a>
                                    </div>
                                    <span class="post-date">
                                        <i class="fa fa-calendar"></i>
                                        September 20, 2020
                                    </span>
                                </div>
                            </div> 
                            <div class="recent-post mb-20 md-pb-0">
                                <div class="post-img">
                                    <img src="bin/admin/Thumbnail/Data-Engineering.png" alt="">
                                </div>
                                <div class="post-item">
                                    <div class="post-desc">
                                        <a href="#">تحقيق الريادة والتميز في مجال التعليم والتدريب الالكتروني .</a>
                                    </div>
                                    <span class="post-date">
                                       <i class="fa fa-calendar-check-o"></i>
                                        September 14, 2020
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </footer>
        <!-- Footer End -->
<div class="container-fluid footer-blow">
    <div class="col-md-3 col-xs-12 text-center">
        <span class="social-text">{{ trans('main.social_footer') }}</span>
        <ul>
            @if(!empty($socials))
                @foreach($socials as $social)
                    <li>
                        <a href="{{ $social->link }}" target="_blank" title="{{ $social->title }}">
                            <img src="{{ $social->icon }}" alt="{{ $social->title }}"/>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="col-md-9 col-xs-12">
        <span class="copyright">
            {{ trans('main.copyright') }}
        </span>
        <span class="copyright">
             {{ trans('main.copyright2') }}
        </span>
    </div>
</div>
<div class="modal fade" id="uploader-modal" role="dialog">
    <div class="modal-dialog modal-dialog-s">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">{{ trans('main.file_manager') }}</h4>
            </div>
            <div class="modal-body">
                {{--<iframe class="modal-body-s" width="100%" height="400" src="/assets/default/filemanager/dialog.php?type=2&field_id=upload-id-fill&relative_url=1" frameborder="0"></iframe>--}}
                <iframe src="/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
            </div>
        </div>
    </div>
</div>
@if(get_option('site_popup',0) == '1')
    <div class="modal fade" id="site_popup">
        <div class="modal-dialog popup_modal">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fa fa-close" data-dismiss="modal"></i>
                    <a href="{{ get_option('popup_url','javascript:void(0);') }}"><img src="{{ get_option('popup_image','') }}" class="img-responsive"></a>
                </div>
            </div>
        </div>
    </div>
@endif
@if(get_option('triangle-banner-top-image','')!='')
    <div class="fix-top-banner">
        <a href="{{ get_option('triangle-banner-top-url','') }}"><img src="{{ get_option('triangle-banner-top-image','') }}"></a>
    </div>
@endif
@if(get_option('triangle-banner-bottom-image','')!='')
    <div class="fix-bottom-banner">
        <a href="{{ get_option('triangle-banner-bottom-url','') }}"><img src="{{ get_option('triangle-banner-bottom-image','') }}"></a>
    </div>
@endif
@if(get_option('banner-html-box','')!='')
    <div class="fix-html-bottom">
        {!! get_option('banner-html-box','') !!}
    </div>
@endif
<!-- Scripts -->
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
    </body>
    </html>
