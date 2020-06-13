@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Recent Jobs</h1>
        <br>
        <div class="row justify-content-center">
            <table class="table table-hover">
                <thead>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr class="table-row" data-href="{{ route('job.show', [$job->id, $job->slug]) }}">
                        <td><img src="{{ asset($job->company->logo) }}" width="70"></td>
                        <td><a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="fa"><span style="font-size: 17px;">{{ $job->position }}</span></a>
                            <br>
                            <i class="fa fa-clock-o"></i> <span style="font-size: 15px;">{{ $job->type }}</span>
                        </td>
                        <td><i class="fa fa-map-marker"></i> {{ $job->address }}</td>
                        <td><i class="fa fa-calendar"></i> {{ $job->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $jobs->render() }}
        </div>


@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function($) {
            $(".table-row").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
@endsection
