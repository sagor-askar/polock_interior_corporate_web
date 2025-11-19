@extends('backend.includes.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Project Type</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Website Info</li>
                    <li class="breadcrumb-item active">Project Type</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('admin.project-types.create') }}" class="btn btn-sm btn-success mt-2 mb-2">
                                <i class="bi bi-plus-circle"></i> Add New</a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projectTypes as $projectType)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $projectType->name }}</td>
                                            <td>

                                              @if($projectType->status == 1)
                                                <span class="badge bg-success">
                                                   Active
                                                </span>
                                                @else
                                                 <span class="badge bg-secondary">
                                                   Inactive
                                                </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.project-types.edit', $projectType->id) }}"
                                                    class="btn btn-warning btn-sm" title="Edit"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <form action="{{ route('admin.project-types.destroy', $projectType->id) }}"
                                                    method="POST" style="display:inline;" title="Delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
