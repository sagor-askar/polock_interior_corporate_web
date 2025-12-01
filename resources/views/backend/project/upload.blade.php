@extends('backend.includes.master')
@section('content')

    <style>
        /* Global */
        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        /* File Upload Button */
        .custom-file-upload {
            display: inline-block;
            background: #0d6efd;
            padding: 10px 20px;
            color: #fff;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }
        .custom-file-upload:hover {
            background: #0a58ca;
        }

        #imageInput { display: none; }

        /* Image Preview */
        #preview {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 15px;
        }

        .preview-box {
            position: relative;
            width: 110px;
            height: 110px;
        }

        .preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ddd;
            box-shadow: 0 3px 6px rgba(0,0,0,0.10);
        }

        .preview-remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            border: none;
            background: rgba(255, 0, 0, 0.8);
            color: white;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            cursor: pointer;
            line-height: 1;
            font-size: 14px;
        }

        /* Saved images */
        .project-images-showcase {
            display: flex;
            flex-wrap: wrap;
            gap: 18px;
            margin-top: 15px;
        }
        .image-item {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #ddd;
            box-shadow: 0 3px 8px rgba(0,0,0,0.12);
        }
        .image-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .delete-btn {
            position: absolute;
            top: 6px;
            right: 6px;
            background: rgba(255,0,0,0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 26px;
            height: 26px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: 0.3s;
        }
        .delete-btn:hover {
            background: red;
        }

    </style>


    <main id="main" class="main">
        <section class="section">

            @if(session('success'))
                <div class="alert alert-success text-center" id="msgShow">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Upload Section --}}
            <div class="card p-4 mb-4">
                <h5 class="section-title text-center">
                    Upload Images — <strong>{{ $project->name }}</strong>
                </h5>

                <form action="{{ route('admin.projects.images.upload.store', $project->id) }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="imageInput" class="custom-file-upload">
                        Choose Images
                    </label>
                    <input type="file" name="images[]" id="imageInput" multiple onchange="previewImages(this)">

                    <div id="preview"></div>

                    <button type="submit" class="btn btn-success mt-3 px-4">Upload</button>
                </form>
            </div>

            {{-- Project Image List --}}
            <div class="card p-4">
                <h5 class="section-title">Project Images</h5>

                <div class="project-images-showcase">
                    @foreach($project->projectImage as $image)
                        <div class="image-item">
                            <img src="{{ asset($image->image) }}" alt="Project Image">

                            <form action="{{ route('admin.projects.images.delete', [$project->id, $image->id]) }}"
                                  method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-btn" onclick="confirmDelete(this)">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
    </main>


    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // 🔥 Image Preview
        function previewImages(input) {
            const preview = document.getElementById('preview');
            preview.innerHTML = "";

            Array.from(input.files).forEach((file, index) => {
                let reader = new FileReader();

                reader.onload = function(e) {
                    const box = document.createElement('div');
                    box.className = "preview-box";

                    box.innerHTML = `
                    <img src="${e.target.result}">
                    <button class="preview-remove-btn" onclick="removePreview(${index}, this)">×</button>
                `;

                    preview.appendChild(box);
                };

                reader.readAsDataURL(file);
            });
        }

        // 🔥 Remove preview and file from input
        function removePreview(index, btn) {
            const input = document.getElementById('imageInput');
            let files = Array.from(input.files);

            files.splice(index, 1);

            const dt = new DataTransfer();
            files.forEach(file => dt.items.add(file));
            input.files = dt.files;

            btn.parentElement.remove();
        }

        // 🔥 SweetAlert Delete Confirmation
        function confirmDelete(button) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This image will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.parentElement.submit();
                }
            });
        }

        // Auto hide success alert
        setTimeout(() => {
            let msg = document.getElementById('msgShow');
            if(msg){ msg.style.display = 'none'; }
        }, 1500);
    </script>

@endsection
