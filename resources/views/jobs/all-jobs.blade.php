@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form action="{{ route('all.jobs') }}" method="get" style="margin-top: 3rem;">
                <div class="form-inline">
                    <div class="form-group">
                        <label for="Keyword">Keyword&nbsp;</label>
                        <input type="text" name="title" class="form-control" style="margin-right: 5px">
                    </div>

                    <div class="form-group">
                        @php
                            $types = ['casual', 'fulltime', 'part-time'];
                        @endphp
                        <label for="type">Employment Type&nbsp;</label>
                        <select name="type" class="form-control" style="margin-right: 5px">
                            <option value="">Select...</option>
                            @foreach($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="category">Category&nbsp;</label>
                        <select name="category_id" class="form-control" style="margin-right: 5px">
                            <option value="">Select...</option>
                            @foreach(\App\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="address">Address&nbsp;</label>
                        <input type="text" name="address" class="form-control" style="margin-right: 5px">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Search" class="btn btn-outline-dark">
                    </div>
                </div>
                <br>
            </form>


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
            {{ $jobs->appends(Request::except('page'))->render() }}
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
