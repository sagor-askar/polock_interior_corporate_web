@extends('backend.includes.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Team Members</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">People</li>
                    <li class="breadcrumb-item active">Edit Team Members</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <form class="mt-3" action="{{ route('admin.team.update', $member->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $member->name }}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" class="form-control" name="designation"
                                            value="{{ $member->designation }}" required>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="department" class="form-label">Department</label>
                                        <input type="text" class="form-control" name="department"
                                            value="{{ $member->department }}" required>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="image" class="form-label">Image <small style="color: red;">112 * 112
                                                | Max: 300kb</small></label>
                                        <input type="file" name="image" class="form-control">
                                        <label for="">Old Image:</label> <br>
                                        @if ($member->image)
                                            <img src="{{ asset('uploads/team_members/' . $member->image) }}" width="80"
                                                class="mb-2">
                                        @endif
                                    </div>

                                    <div class="col-md-4 mt-2 mb-3">
                                        <label class="form-label">Select Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-select">
                                                <option value="1" {{ $member->status ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ !$member->status ? 'selected' : '' }}>
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
                                        <a href="{{ route('admin.team.index') }}" class="btn btn-sm btn-success mt-2 mb-2">
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
