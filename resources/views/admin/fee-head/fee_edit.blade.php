@extends('admin.layout')

@section('content')
    {{-- content form --}}
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fee</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Fee Management</li>
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
                                <h3 class="card-title">Edit Fee</h3>
                            </div>

                            {{-- metode default HTML hanya mendukung GET dan POST --}}
                            <form action="{{ route('fee-head.update') }}" method="post">

                                @csrf
                                @method('PUT') <!-- Mengubah metode menjadi PUT -->

                                <input type="hidden" name="id" value="{{ $fee->id }}">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName">Fee</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputName"
                                            placeholder="Enter Fee Name" value="{{ old('name', $fee->name) }}">
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Fee</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
