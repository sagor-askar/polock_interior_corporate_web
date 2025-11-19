@extends('backend.includes.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Testimonials</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Achievements</li>
                    <li class="breadcrumb-item active">Edit Testimonials</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <form class="mt-3" action="{{ route('admin.testimonials.update', $testimonial->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $testimonial->name }}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" class="form-control" name="designation"
                                            value="{{ $testimonial->designation }}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="speech" class="form-label">Speech</label>
                                        <input type="text" class="form-control" name="speech"
                                            value="{{ $testimonial->speech }}" required>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="image" class="form-label">Image <small style="color: red;">112 * 112
                                                | Max: 300kb</small></label>
                                        <input type="file" name="image" class="form-control">
                                        <br>
                                        @if ($testimonial->image)
                                            <img src="{{ asset($testimonial->image) }}" width="80" class="mb-2 rounded">
                                        @endif
                                    </div>

                                    <div class="col-md-4 mt-2 mb-3">
                                        <label class="form-label">Select Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-select">
                                                <option value="1" {{ $testimonial->status ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ !$testimonial->status ? 'selected' : '' }}>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-sticky"></i>
                                            Submit</button>
                                        <a href="{{ route('admin.milestones.index') }}"
                                            class="btn btn-sm btn-success mt-2 mb-2">
                                            <i class="bi bi-arrow-return-left"></i> Back</a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
