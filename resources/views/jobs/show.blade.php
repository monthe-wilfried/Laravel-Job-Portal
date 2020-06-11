@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $job->title }}</div>

                    <div class="card-body">
                        <div class="cart-title"><h3>Desciption</h3></div>
                        <p>{{ $job->description }}</p>

                        <div class="cart-title"><h3>Roles</h3></div>
                        <p>{{ $job->roles }}</p>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-header">Short Info</div>

                <div class="card-body">
                    <p><b><i class="fa fa-home"></i> Company:</b> <a href="{{ route('company.show', [$job->company->id, $job->company->slug]) }}">{{ $job->company->company_name }}</a></p>
                    <p><b><i class="fa fa-map-marker"></i> Address:</b> {{ $job->address }}</p>
                    <p><b><i class="fa fa-clock-o"></i> Employment Type:</b> {{ $job->type }}</p>
                    <p><b><i class="fa fa-suitcase"></i> Position</b> {{ $job->position }}</p>
                    <p><b><i class="fa fa-globe"></i> Date:</b> {{ $job->created_at->diffForHumans() }}</p>
                </div>
                @if(Auth::check() && Auth::user()->user_type=='seeker')
                    <a href="" class="btn btn-sm btn-dark btn-block"><i class="fa fa-check" aria-hidden="true"></i> Apply</a>
                @endif
            </div>
        </div>
    </div>
@endsection

