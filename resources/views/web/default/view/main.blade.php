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
@endsection

