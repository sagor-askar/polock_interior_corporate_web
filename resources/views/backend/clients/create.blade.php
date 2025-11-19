@extends('backend.includes.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Official Clients</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Achievements</li>
                    <li class="breadcrumb-item active">Create Clients</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <form class="mt-3" action="{{ route('admin.clients.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            placeholder="Enter Name" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="project_location" class="form-label">Project Location</label>
                                        <input type="text" class="form-control" name="project_location" id=""
                                            placeholder="Enter Project Location" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" class="form-control" name="description" id=""
                                            placeholder="Write Description" required>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="image" class="form-label">Image <small style="color: red;">400 * 170
                                                | Max: 100kb</small></label>
                                        <input type="file" class="form-control" name="image" id="" required>
                                    </div>

                                    <div class="col-md-4 mt-2 mb-3">
                                        <label class="form-label">Select Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-select">
                                                <option value="1" selected>Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-sticky"></i>
                                            Submit</button>
                                        <a href="{{ route('admin.clients.index') }}"
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
