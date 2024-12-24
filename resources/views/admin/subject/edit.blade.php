@extends('admin.layout')

@section('content')
    {{-- content form --}}
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subject</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Subject Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">

                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            <div class="card-header">
                                <h3 class="card-title">Edit Subject</h3>
                            </div>

                            {{-- metode default HTML hanya mendukung GET dan POST --}}
                            <form action="{{ route('subject.update', $subject->id) }}" method="post">

                                @csrf
                                @method('PUT') <!-- Mengubah metode menjadi PUT -->

                                <div class="card-body">
                                    {{-- subject name --}}
                                    <div class="form-group">
                                        <label for="exampleInputName">Subject Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputName"
                                            placeholder="Enter Subject Name" value="{{ old('name', $subject->name) }}">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- type --}}
                                    <div class="form-group">
                                        <label for="exampleInputName">Type</label>
                                        <select name="type" class="form-control">
                                            <option value="">Select</option>
                                            <option value="theory" {{ $subject->type == 'theory' ? 'selected' : '' }}>Theory
                                            </option>
                                            <option value="practical" {{ $subject->type == 'practical' ? 'selected' : '' }}>
                                                Practical</option>
                                        </select>

                                        @error('type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Subject</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
