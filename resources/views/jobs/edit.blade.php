@extends('layouts.app')

@section('content')
    <div class="container">
        @include('includes.flash_message')
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Edit Job</h3></div>

                    <form action="{{ route('job.update') }}" method="post">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $job->title) }}">
                                @error('title')
                                <div class="error" style="color: red">
                                    {{ $errors->first('title') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea  name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $job->description) }}</textarea>
                                @error('description')
                                <div class="error" style="color: red">
                                    {{ $errors->first('description') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="roles">Roles</label>
                                <textarea name="roles" class="form-control @error('roles') is-invalid @enderror">{{ old('roles', $job->roles) }}</textarea>
                                @error('roles')
                                <div class="error" style="color: red">
                                    {{ $errors->first('roles') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Select Category...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                        @if($category->id == $job->category_id)
                                            selected
                                        @endif
                                        >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="error" style="color: red">
                                    {{ $errors->first('category_id') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $job->position) }}">
                                @error('position')
                                <div class="error" style="color: red">
                                    {{ $errors->first('position') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $job->address) }}">
                                @error('address')
                                <div class="error" style="color: red">
                                    {{ $errors->first('address') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                @php
                                    $types = ['casual', 'fulltime', 'part-time'];
                                @endphp
                                <label for="type">Type</label>
                                <select name="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="">Select type...</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type }}"
                                        @if($type == $job->type)
                                           selected
                                        @endif
                                        >{{ $type }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="error" style="color: red">
                                    {{ $errors->first('type') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                @php
                                    $status = ['Draft', 'Live'];
                                @endphp
                                <label for="status">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">Select status...</option>
                                    @foreach($status as $key => $row)
                                        <option value="{{ $key }}"
                                        @if($key == $job->status)
                                            selected
                                        @endif
                                        >{{ $row }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="error" style="color: red">
                                    {{ $errors->first('status') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deadline">Application Deadline</label>
                                <input type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror" value="{{ old('deadline', $job->deadline) }}">
                                @error('deadline')
                                <div class="error" style="color: red">
                                    {{ $errors->first('v') }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
