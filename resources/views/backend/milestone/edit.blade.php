@extends('backend.includes.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Company Milestones</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Website Info</li>
                    <li class="breadcrumb-item active">Edit Milestones</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <form class="mt-3" action="{{ route('admin.milestones.update', $milestone->id) }}"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $milestone->title }}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="counts" class="form-label">Counts</label>
                                        <input type="number" class="form-control" name="counts"
                                            value="{{ $milestone->counts }}" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Select Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-select">
                                                <option value="active"
                                                    {{ $milestone->status == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive"
                                                    {{ $milestone->status == 'inactive' ? 'selected' : '' }}>Inactive
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

    </main><!-- End #main -->
@endsection
