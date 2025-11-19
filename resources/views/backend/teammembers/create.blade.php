@extends('backend.includes.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Team Members</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">People</li>
                    <li class="breadcrumb-item active">Add Team Members</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <form class="mt-3" action="{{ route('admin.team.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            placeholder="Enter Name" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" class="form-control" name="designation" id=""
                                            placeholder="Enter Designation" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="department" class="form-label">Department</label>
                                        <input type="text" class="form-control" name="department" id=""
                                            placeholder="Write department" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="image" class="form-label">Image <small style="color: red;">112 * 112
                                                | Max: 300kb</small></label>
                                        <input type="file" class="form-control" name="image" id="" required>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-sticky"></i>
                                            Submit</button>
                                        <a href="{{ route('admin.team.index') }}"
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
