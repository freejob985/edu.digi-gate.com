<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="header">
                <span class="popular pull-left header-s">{{ trans('main.most_popular') }}</span>
                <a href="/category?order=popular" class="pull-right more-link">{{ trans('main.load_more') }}</a>
            </div>
            <div class="body body-s-r">
                <span class="nav-right"></span>
                <div class="owl-carousel">
                    
                    @foreach($popular_content as $popular)
                        <?php $meta = arrayToList($popular->metas, 'option', 'value'); ?>
                        <div class="owl-car-s" dir="rtl">
                            <a href="/product/{{ $popular->id }}" title="{{ $popular->title }}" class="content-box">
                                <img src="{{ !empty($meta['thumbnail']) ? $meta['thumbnail'] : '' }}"/>
                                <h3>{!! truncate($popular->title,35) !!}</h3>
                                <div class="footer">
                                    @if(isset($popular->user))
                                    <span class="avatar" title="{{ $popular->user->name }}" onclick="window.location.href = '/profile/{{ $popular->user->id }}'"><img src="{{ get_user_meta($popular->user_id,'avatar',get_option('default_user_avatar','')) }}"></span>
                                    @endif
                                    @php
                                    $contents_meta = DB::table('contents_meta')->where('option','Discount')->where('content_id',$popular->id)->value('value');
                                    $content_rate[] = DB::table('content_rate')->where('content_id',$popular->id)->value('rate');
                                     @endphp
                                        <label class="pull-right content-clock">{!! contentDuration($popular->id) !!}</label>
                                    <span class="boxicon mdi mdi-clock pull-right"></span>
                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                    @php
                                    $contents_meta = DB::table('contents_meta')->where('option','Discount')->where('content_id',$popular->id)->value('value');
                                    $content_rate[] = DB::table('content_rate')->where('content_id',$popular->id)->value('rate');
                                     @endphp
                                     <label class="pull-left" style="padding-left: 4%;text-decoration: line-through; "> @if(isset($content['metas']['price'])) {{ price($content['id'],$content['category_id'],$content['metas']['price'])['price_txt'] ?? 0 }} @endif</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                     <label class="pull-left"> {{$contents_meta}}$</label>
                                                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <span class="nav-left pull-right"></span>
            </div>
        </div>
    </div>
</div>
