@extends('backend.includes.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Official Clients</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Achievements</li>
                    <li class="breadcrumb-item active">Clients</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <a href="{{ route('admin.clients.create') }}" class="btn btn-sm btn-success mt-2 mb-2">
                                <i class="bi bi-plus-circle"></i> Add New</a>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($item->image)
                                                    <img src="{{ asset($item->image) }}" alt="" width="60"
                                                        height="60" class="rounded">
                                                @endif
                                            </td>
                                            <td>{{ $item->name ?? '' }}</td>
                                            <td>{{ $item->project_location ?? '' }}</td>
                                            <td>
                                                <span class="badge bg-{{ $item->status ? 'success' : 'danger' }}">
                                                    {{ $item->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.clients.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm" title="Edit"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <form action="{{ route('admin.clients.destroy', $item->id) }}"
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

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
