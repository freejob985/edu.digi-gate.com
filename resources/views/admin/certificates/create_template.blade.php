@extends('admin.newlayout.layout',['breadcom'=>['Email Template']])
@section('title')
    {!! trans('admin.templates') !!}
@endsection
@section('page')
    <section class="card card-collapsed">
        <div class="card-body">
            <p>{{ trans('admin.student') }} : [student] </p>
            <hr>
            <p>{{ trans('admin.course') }} : [course] </p>
            <hr>
            <p>{{ trans('admin.mark') }} : [mark] </p>
        </div>
    </section>

    <section class="card">
        <div class="card-body">

            <form action="/admin/certificates/templates/store" id="templateForm" class="form-horizontal form-bordered" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ !empty($template) ? $template->id : '' }}">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="inputDefault">{!! trans('admin.th_title') !!}</label>
                    <div class="col-md-11">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ !empty($template) ? $template->title : '' }}">
                        <div class="invalid-feedback">@error('title') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="input-group ingr">
                    <button id="lfm_image" data-input="image" data-preview="holder" class="btn btn-primary">
                        Choose
                    </button>
                    <input id="image" class="form-control @error('image') is-invalid @enderror" type="text" dir="ltr" name="image" value="{{ !empty($template) ? $template->image : '' }}">
                    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                        <span class="input-group-text">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
                <div class="invalid-feedback">@error('image') {{ $message }} @enderror</div>
                <div class="h-20"></div>

                <div class="row">
                    <dov class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="inputDefault">{!! trans('admin.position_x') !!}</label>
                            <div class="col-md-11">
                                <input type="text" name="position_x" class="form-control @error('position_x') is-invalid @enderror" value="{{ !empty($template) ? $template->position_x : '120' }}">
                                <div class="invalid-feedback">@error('position_x') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </dov>
                    <dov class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="inputDefault">{!! trans('admin.position_y') !!}</label>
                            <div class="col-md-11">
                                <input type="text" name="position_y" class="form-control @error('position_y') is-invalid @enderror" value="{{ !empty($template) ? $template->position_y : '100' }}">
                                <div class="invalid-feedback">@error('position_y') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </dov>
                    <dov class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="inputDefault">{!! trans('admin.font_size') !!}</label>
                            <div class="col-md-11">
                                <input type="text" name="font_size" class="form-control @error('font_size') is-invalid @enderror" value="{{ !empty($template) ? $template->font_size : '26' }}">
                                <div class="invalid-feedback">@error('font_size') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </dov>
                    <dov class="col-md-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="inputDefault">{!! trans('admin.text_color') !!}</label>
                            <div class="col-md-11">
                                <input type="text" name="text_color" class="form-control @error('text_color') is-invalid @enderror" value="{{ !empty($template) ? $template->text_color : '#e1e1e1' }}">
                                <div class="invalid-feedback">@error('text_color') {{ $message }} @enderror</div>
                                <div>like : (#e1e1e1) or (#ffffff) or (#000000)</div>
                            </div>
                        </div>
                    </dov>
                </div>


                <div class="form-group ">
                    <label class="col-md-4 control-label" for="inputDefault">Message body</label>
                    <div class="col-md-12">
                        <textarea class="form-control hauto text-left  @error('body') is-invalid @enderror" dir="ltr" rows="6" name="body">{{ (!empty($template)) ? $template->body :'' }}</textarea>
                        <div class="invalid-feedback">@error('body') {{ $message }} @enderror</div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="custom-switches-stacked">
                        <label class="custom-switch">
                            <input type="hidden" name="status" value="draft">
                            <input type="checkbox" name="status" value="publish" {{ (!empty($template) and $template->status == 'publish') ? 'checked="checked"' : '' }} class="custom-switch-input"/>
                            <span class="custom-switch-indicator"></span>
                            <label class="custom-switch-description" for="inputDefault">{{ trans('admin.status') }}</label>
                        </label>
                    </div>
                    <div class="h-15"></div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary pull-left" id="submiter" type="button">{{ trans('admin.save_changes') }}</button>
                        <button class="btn btn-danger pull-left" id="preview" type="button">{{ trans('admin.preview_certificate') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
@endsection

@section('script')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        "use strict";
        $('#lfm_image').filemanager('image');
        var form = $('#templateForm');
        $('#preview').on('click',function (e) {
            e.preventDefault();

            form.attr('target', '_blank');
            form.attr('action', '/admin/certificates/templates/preview');
            form.attr('method', 'get');
            form.submit();
        });

        $('#submiter').on('click',function (e) {
            e.preventDefault();
            form.removeAttr('target');
            form.attr('action', '/admin/certificates/templates/store');
            form.attr('method', 'post');
            form.submit();
        })
    </script>
@endsection
