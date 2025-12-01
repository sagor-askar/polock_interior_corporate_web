 @extends('backend.includes.master')
 @section('content')
        <main id="main" class="main">

            <div class="page title">
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Project Information
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">
                                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-arrow-left-circle"></i> Back to List
                                </a>
                            </div>
                            <table class="table table-bordered table-striped mt-3">
                                <tbody>
                                <tr>
                                    <th>Images</th>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 15px;">
                                            <div style="
                width: 90px;
                height: 90px;
                border-radius: 10px;
                overflow: hidden;
                border: 1px solid #ddd;
                background: #f3f4f6;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 2px 5px rgba(0,0,0,0.08);
            ">
                                                @if($project->image_one)
                                                    <img src="{{ asset($project->image_one) }}"
                                                         style="width: 100%; height: 100%; object-fit: cover;">
                                                @else
                                                    <span style="font-size: 12px; color: #888;">No Image</span>
                                                @endif
                                            </div>
                                            <div style="
                width: 90px;
                height: 90px;
                border-radius: 10px;
                overflow: hidden;
                border: 1px solid #ddd;
                background: #f3f4f6;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 2px 5px rgba(0,0,0,0.08);
            ">
                                                @if($project->image_two)
                                                    <img src="{{ asset($project->image_two) }}"
                                                         style="width: 100%; height: 100%; object-fit: cover;">
                                                @else
                                                    <span style="font-size: 12px; color: #888;">No Image</span>
                                                @endif
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Project Name
                                    </th>
                                    <td>
                                        {{ $project->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Project Type
                                    </th>
                                    <td>
                                        {{ $project->projectType->name ?? '' }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Client Name
                                    </th>
                                    <td>
                                        {{ $project->client_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Location
                                    </th>
                                    <td>
                                        {{ $project->location ?? '' }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Site Area
                                    </th>
                                    <td>
                                        {{ $project->site_area ?? '' }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Date of Completion
                                    </th>
                                    <td>
                                        {{ \Carbon\Carbon::parse($project->date_of_completion)->format('d-M-Y') }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                       Processing Stage
                                    </th>
                                    @if($project->stage == 1)
                                        <td>
                                            <span class="badge badge-success" style="background-color: green">Completed</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-success" style="background-color: orangered">Ongoing</span>
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>
                                        Description
                                    </th>
                                    <td>
                                        {!! $project->description?? '' !!}
                                    </td>
                                </tr>



                                <tr>
                                    <th>
                                        Facebook Link </th>
                                    <td>
                                        <a href="{{ $project->facebook_url ?? '' }}" target="_blank">  <span>{{ $project->facebook_url ?? '' }} </span> </a>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Linkedin Link  </th>
                                    <td>
                                        <a href="{{ $project->linkedin_url ?? '' }}" target="_blank">  <span>{{ $project->linkedin_url ?? '' }} </span> </a>

                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Youtube Link
                                    </th>
                                    <td>
                                        <a href="{{ $project->youtube_url ?? '' }}" target="_blank">  <span>{{ $project->youtube_url ?? '' }} </span> </a>

                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Homepage Visibility  </th>
                                    @if($project->homepage_visibility == 1)
                                        <td>
                                            <span class="badge badge-success" style="background-color: green">Yes</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-danger">No</span>
                                        </td>
                                    @endif
                                </tr>

                                <tr>
                                    <th>
                                        Visibility Order
                                    </th>
                                    <td>
                                        {{ $project->visibility_order ?? '' }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        Status
                                    </th>
                                    @if($project->status == 1)
                                        <td>
                                            <span class="badge badge-success" style="background-color: green">Active</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-danger">Inactive</span>
                                        </td>
                                    @endif
                                </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-arrow-left-circle"></i> Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
