@extends('admin.newlayout.layout',['breadcom'=>['Quizzes','Result Quizzes']])
@section('title')
    {{ trans('admin.quiz_results') }}
@endsection
@section('page')
    <a href="/admin/quizzes/{{ $quiz->id }}/results/excel" class="btn btn-primary">Export as xls</a>
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
                        <th class="text-center">{{ trans('admin.grade_date') }}</th>
                        <th class="text-center" width="50">{{ trans('admin.th_status') }}</th>
                        <th class="text-center" width="100">{{ trans('admin.th_controls') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quiz_results as $result)
                        <tr>
                            <td class="text-center">{!! $quiz->id  !!}</td>
                            <td>
                                {{ $quiz->name }}
                                <small class="d-block">({{ $quiz->content->title }})</small>
                            </td>
                            <td class="text-center">{{ $result->student->name }}</td>
                            <td class="text-center">{{ $quiz->user->name }}</td>
                            <td class="text-center">{{ $result->user_grade }}</td>
                            <td class="text-center">{{ date('Y-m-d | H:i', $result->created_at) }}</td>

                            <td class="text-center">
                                @if ($result->status == 'pass')
                                    <span class="badge badge-success">{{ trans('main.passed') }}</span>
                                @elseif ($result->status == 'fail')
                                    <span class="badge badge-danger">{{ trans('main.failed') }}</span>
                                @else
                                    <span class="badge badge-warning">{{ trans('main.waiting') }}</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="#" data-href="/admin/quizzes/{{ $quiz->id }}/results/{{ $result->id }}/delete" title="Delete" data-toggle="modal" data-target="#confirm-delete" class="c-r">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
            {!! $quiz_results->links('pagination.default') !!}
        </div>
    </section>
@endsection
