@extends('backend.includes.master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Update Project</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item">Achievements</li>
                    <li class="breadcrumb-item active">Update Project</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form class="mt-3" action="{{ route('admin.projects.update', $project->id) }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label class="required" for="name">Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Name" name="name" id="name" value="{{ old('name', $project->name ?? '' ) }}" required>
                                            @if($errors->has('name'))
                                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="required" for="inputState">Project Type</label>
                                            <select id="inputState" class="form-control form-select" name="project_type_id" required>
                                                <option value="">Select one</option>
                                                @foreach($projectTypes as $projectType)
                                                    <option
                                                        value="{{ $projectType->id }}"
                                                        {{ old('project_type_id', $project->project_type_id) == $projectType->id ? 'selected' : '' }}>
                                                        {{ $projectType->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group {{ $errors->has('client_name') ? 'has-error' : '' }}">
                                            <label class="required" for="name">Client Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Client Name" name="client_name" id="name" value="{{ old('client_name',$project->client_name ?? '') }}" required>
                                            @if($errors->has('client_name'))
                                                <span class="help-block" role="alert">{{ $errors->first('client_name') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-3">
                                        <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                                            <label class="required" for="name">Location</label>
                                            <input class="form-control" type="text" placeholder="Enter location" name="location" id="location" value="{{ old('location', $project->location ?? '') }}" required>
                                            @if($errors->has('location'))
                                                <span class="help-block" role="alert">{{ $errors->first('location') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group {{ $errors->has('site_area') ? 'has-error' : '' }}">
                                            <label class="required" for="name">Site Area</label>
                                            <input class="form-control" type="text" placeholder="Enter site area" name="site_area" id="site_area" value="{{ old('site_area',$project->site_area ?? '') }}" required>
                                            @if($errors->has('site_area'))
                                                <span class="help-block" role="alert">{{ $errors->first('site_area') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group {{ $errors->has('date_of_completion') ? 'has-error' : '' }}">
                                            <label class="required" for="name">Date of Completion</label>
                                            <input class="form-control" type="date"  name="date_of_completion" id="date_of_completion" value="{{ old('date_of_completion',$project->date_of_completion ?? '') }}" required>
                                            @if($errors->has('date_of_completion'))
                                                <span class="help-block" role="alert">{{ $errors->first('date_of_completion') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group {{ $errors->has('stage') ? 'has-error' : '' }}">
                                            <label class="required">Processing Status</label>
                                            <div class="col-sm-10">
                                                <select name="stage" class="form-select">
                                                    <option value="1" {{ old('stage', $project->stage) == 1 ? 'selected' : '' }}>Completed</option>
                                                    <option value="0" {{ old('stage', $project->stage) == 0 ? 'selected' : '' }}>Ongoing</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                            <label  for="job_description">Description</label>
                                            <textarea class="form-control" name="description"  id="descriptionstyle" cols="45" rows="5">
                                              {{ $project->description }} </textarea>
                                            @if($errors->has('description'))
                                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-2 mt-3">
                                        <div class="form-group {{ $errors->has('image_one') ? 'has-error' : '' }}">
                                            <label for="required" class="form-label">Primary Image One <small style="color: red;">(Max: 500kb)</small></label>
                                            <input type="file" class="form-control" name="image_one" id="" >

                                            @if ($project->image_one)
                                                <img src="{{ asset($project->image_one) }}" width="80" class="mb-2 rounded">
                                            @endif

                                            @if($errors->has('image_one'))
                                                <span class="help-block" role="alert">{{ $errors->first('image_one') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group {{ $errors->has('image_two') ? 'has-error' : '' }}">
                                            <label class="form-label">Primary Image Two <small style="color: red;">(Max: 500kb)</small></label>
                                            <input type="file" class="form-control" name="image_two" id="">

                                            @if ($project->image_two)
                                                <img src="{{ asset($project->image_two) }}" width="80" class="mb-2 rounded">
                                            @endif
                                            @if($errors->has('image_two'))
                                                <span class="help-block" role="alert">{{ $errors->first('image_two') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-3">
                                        <div class="form-group {{ $errors->has('facebook_url') ? 'has-error' : '' }}">
                                            <label for="facebook">Facebook URL</label>
                                            <input class="form-control" type="text" placeholder="Enter Facebook URL" name="facebook_url" id="facebook_url" value="{{ old('facebook_url',$project->facebook_url ?? '') }}">
                                            @if($errors->has('facebook_url'))
                                                <span class="help-block" role="alert">{{ $errors->first('facebook_url') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group {{ $errors->has('youtube_url') ? 'has-error' : '' }}">
                                            <label for="youtube">Youtube URL</label>
                                            <input class="form-control" type="text" placeholder="Enter Youtube URL" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $project->youtube_url ?? '') }}">
                                            @if($errors->has('youtube_url'))
                                                <span class="help-block" role="alert">{{ $errors->first('youtube_url') }}</span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group {{ $errors->has('linkedin_url') ? 'has-error' : '' }}">
                                            <label for="linkedin_url">Linkedin URL</label>
                                            <input class="form-control" type="text" placeholder="Enter Linkedin URL" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $project->linkedin_url ?? '') }}">
                                            @if($errors->has('linkedin_url'))
                                                <span class="help-block" role="alert">{{ $errors->first('linkedin_url') }}</span>
                                            @endif

                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-3">
                                        <div class="form-group {{ $errors->has('homepage_visibility') ? 'has-error' : '' }}">
                                            <label class="required">Homepage Visibility</label>
                                            <div class="col-sm-10">
                                                <select name="homepage_visibility" class="form-select">
                                                    <option value="1" {{ old('homepage_visibility', $project->homepage_visibility) == 1 ? 'selected' : '' }}>Yes</option>
                                                    <option value="0" {{ old('homepage_visibility', $project->homepage_visibility) == 0 ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group {{ $errors->has('visibility_order') ? 'has-error' : '' }}">
                                            <label for="visibility_order">Visibility Order</label>
                                            <input class="form-control" type="number" placeholder="Enter visibility order" name="visibility_order" id="visibility_order" value="{{ old('visibility_order', $project->visibility_order ?? '') }}">
                                            @if($errors->has('visibility_order'))
                                                <span class="help-block" role="alert">{{ $errors->first('visibility_order') }}</span>
                                            @endif

                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-2 mb-3">
                                        <label class="form-label">Select Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-select">
                                                <option value="1" {{ old('status',$project->status)==1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ old('status',$project->status)==0 ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-sticky"></i>
                                            Submit</button>
                                        <a href="{{ route('admin.projects.index') }}"
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


    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#descriptionstyle'))
            .catch(error =>{
                console.log(error);
            });
    </script>
@endsection
