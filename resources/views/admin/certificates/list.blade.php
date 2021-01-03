@extends('admin.newlayout.layout',['breadcom'=>['Quizzes','Latest Quizzes']])
@section('title')
    {{ trans('admin.certificates_list') }}
@endsection
@section('page')
    <section class="card">
        <header class="card-header">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title">{{ trans('admin.filter_items') }}</h2>
        </header>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="text-center form-control text-left" value="{{ request()->get('student_name') ?? '' }}" name="student_name" placeholder="Student Name">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="text-center form-control text-left" value="{{ request()->get('instructor') ?? '' }}" name="instructor" placeholder="Instructor Name">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" class="text-center form-control text-left" value="{{ request()->get('quiz_name') ?? '' }}" name="quiz_name" placeholder="Quiz Name">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="submit" class="text-center btn btn-primary w-100" value="Filter Items">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="h-10"></div>
    <section class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-none" id="datatable-details">
                    <thead>
                    <tr>
                        <th class="text-center" width="30">#</th>
                        <th>{{ trans('admin.th_name') }}</th>
                        <th class="text-center">{{ trans('admin.student') }}</th>
                        <th class="text-center">{{ trans('admin.instructor') }}</th>
                        <th class="text-center">{{ trans('admin.grades') }}</th>
                        <th class="text-center">{{ trans('main.time_and_date') }}</th>
                        <th class="text-center" width="100">{{ trans('admin.th_controls') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($certificates as $certificate)
                        <tr>
                            <td class="text-center">{!! $certificate->id  !!}</td>
                            <td>
                                {{ $certificate->quiz->name }}
                                <small class="d-block">({{ $certificate->quiz->content->title }})</small>
                            </td>
                            <td class="text-center">{{ $certificate->student->name }}</td>
                            <td class="text-center">{{ $certificate->quiz->user->name }}</td>
                            <td class="text-center">{{ $certificate->user_grade }}</td>
                            <td class="text-center">{{ date('Y-m-d | H:i', $certificate->created_at) }}</td>
                            <td class="text-center">
                                <a href="/admin/certificates/{{ $certificate->id }}/download" data-toggle="tooltip" title="{{ trans('admin.download') }}">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
