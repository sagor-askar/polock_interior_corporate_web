@extends('backend.includes.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Projects</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Achievements</li>
                    <li class="breadcrumb-item active">Projects</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-success mt-2 mb-2">
                                <i class="bi bi-plus-circle"></i> Add New</a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>ProjectName</th>
                                        <th>ClientName</th>
                                        <th>Location</th>
                                        <th>Stage</th>
                                        <th>Status</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $key=> $project)
                                        <tr>
                                      <td>{{ $key +1  }}</td>
                                            <td>
                                                @if ($project->image_one)
                                                    <img src="{{ asset($project->image_one) }}" alt="" width="60"
                                                        height="60" class="rounded">
                                                @endif
                                            </td>
                                            <td>{{ $project->name ?? '' }}</td>
                                            <td>{{ $project->client_name ?? '' }}</td>
                                            <td>{{ $project->location ?? '' }}</td>
                                            <td>
                                                @if($project->stage == 1)
                                                    <span class="badge bg-success">
                                                   Completed
                                                </span>
                                                @else
                                                    <span class="badge bg-secondary">
                                                   Ongoing
                                                </span>
                                                @endif
                                            </td>

                                            <td>
                                                @if($project->status == 1)
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
                                                <div class="btn-group" role="group" aria-label="Project Actions">

                                                    <!-- Upload Image -->
                                                    <a href="{{ route('admin.projects.image-upload', $project->id) }}"
                                                       class="btn btn-sm btn-primary"
                                                       title="Upload Image">
                                                        <i class="bi bi-plus"></i>
                                                    </a>

                                                    <!-- View -->
                                                    <a href="{{ route('admin.projects.show', $project->id) }}"
                                                       class="btn btn-sm btn-info"
                                                       title="View Project">
                                                        <i class="bi bi-eye"></i>
                                                    </a>

                                                    <!-- Edit -->
                                                    <a href="{{ route('admin.projects.edit', $project->id) }}"
                                                       class="btn btn-sm btn-warning"
                                                       title="Edit Project">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <!-- Delete -->
                                                    <form action="{{ route('admin.projects.destroy', $project->id) }}"
                                                          method="POST"
                                                          onsubmit="return confirm('Are you sure you want to delete this project?');"
                                                          style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Project">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
