@extends('backend.includes.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Company Milestones</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Website Info</li>
                    <li class="breadcrumb-item active">Create Milestones</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <form class="mt-3" action="{{ route('admin.milestones.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id=""
                                            placeholder="Enter Title" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="counts" class="form-label">Counts</label>
                                        <input type="number" class="form-control" name="counts" id=""
                                            placeholder="Enter Counts" required>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Select Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="status" aria-label="Default select example">
                                                <option selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
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
