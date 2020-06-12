@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="company-profile">
                    <img src="{{ $company->cover_photo ? asset($company->cover_photo) : asset('cover/tumblr-image-sizes-banner.png') }}" style="width: 100%;">
                    <div class="company-description">
                        <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                            <div class="col-sm-2">
                                <img src="{{ asset($company->logo) ?? 'Company Logo' }}" class="img-fluid img-thumbnail">
                            </div>
                            <div class="col-sm-10">
                                <p>{{ $company->description }}</p>
                            </div>
                        </div>
                        <h1>{{ $company->company_name }}</h1>
                        <div class="row text-center">
                            <div class="col-md-3"><i class="fa fa-lightbulb-o"></i> <strong>Slogan:</strong> {{ $company->slogan }}</div>
                            <div class="col-md-3"><i class="fa fa-map-marker"></i> {{ $company->address }}</div>
                            <div class="col-md-3"><i class="fa fa-phone"></i> {{ $company->phone }}</div>
                            <div class="col-md-3"><i class="fa fa-globe"></i> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></div>
                        </div>
                    </div>
                </div>
                <br>
                <h4 style="margin-top: 3rem">Job Vacancies</h4>
                <table class="table table-hover">
                    <thead>
                    </thead>
                    <tbody>
                    @foreach($company->jobs as $job)
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
            </div>
            </div>

        </div>
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
