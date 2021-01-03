@extends('admin.newlayout.layout',['breadcom'=>['Quizzes','Latest Quizzes']])
@section('title')
    {{ trans('admin.quizzes_list') }}
@endsection
@section('page')
    <a href="/admin/quizzes/excel" class="btn btn-primary">Export as xls</a>
    <div class="h-10"></div>
    <section class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-none" id="datatable-details">
                    <thead>
                    <tr>
                        <th class="text-center" width="30">#</th>
                        <th>{{ trans('admin.th_name') }}</th>
                        <th class="text-center">{{ trans('admin.instructor') }}</th>
                        <th class="text-center">{{ trans('admin.question_count') }}</th>
                        <th class="text-center">{{ trans('admin.students_count') }}</th>
                        <th class="text-center">{{ trans('admin.average_grade') }}</th>
                        <th class="text-center">{{ trans('admin.certificate') }}</th>
                        <th class="text-center" width="50">{{ trans('admin.th_status') }}</th>
                        <th class="text-center" width="100">{{ trans('admin.th_controls') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quizzes as $quiz)
                        <tr>
                            <td class="text-center">{!! $quiz->id  !!}</td>
                            <td>
                                {{ $quiz->name }}
                                <small class="d-block">({{ $quiz->content->title }})</small>
                            </td>
                            <td class="text-center">{{ $quiz->user->name }}</td>
                            <td class="text-center">
                                {{ count($quiz->questions) }}
                            </td>
                            <td class="text-center">
                                {{ count($quiz->QuizResults) }}
                                <span class="d-block">({{ trans('main.passed') }}: {{ $quiz->passed }})</span>
                            </td>
                            <td class="text-center">{{ $quiz->average_grade }}</td>
                            <td class="text-center">{{ ($quiz->certificate) ? trans('admin.yes') : trans('admin.no') }}</td>

                            <td class="text-center">
                                @if($quiz->status == 'active')
                                    <b class="c-g">{{ trans('admin.active') }}</b>
                                @else
                                    <span class="c-r">{{ trans('admin.disabled') }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="/admin/quizzes/{{ $quiz->id }}/results" data-toggle="tooltip" title="{{ trans('admin.quiz_results') }}">
                                    <i class="fa fa-poll-h fa-2x" aria-hidden="true"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            {!! $quizzes->links('pagination.default') !!}
        </div>
    </section>
@endsection
