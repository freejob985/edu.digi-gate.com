<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="header">
                <span class="pull-left">{{ trans('main.newest_courses') }}</span>
                <a href="/category?order=new" class="more-link pull-right">{{ trans('main.load_more') }}</a>
            </div>
            <div class="body body-s-r" dir="ltr">
                <span class="nav-right"></span>
                <div class="owl-carousel">
                    @foreach($new_content as $new)
                        <?php $meta = arrayToList($new->metas, 'option', 'value'); ?>
                        <div class="owl-car-s" dir="rtl">
                            <a href="/product/{{ $new->id }}" title="{{ $new->title }}" class="content-box">
                                <img src="{{ !empty($meta['thumbnail']) ? $meta['thumbnail'] : '' }}"/>
                                <h3>{!! truncate($new->title,30) !!}</h3>
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
