<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Photo Gallery Management</title>

    {{-- Bootstrap CSS Link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">

    {{-- Font Awesome (for the trash icon) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMDJqL2rRkQz+F+sJ+d5l4/uA9J+l1/q8p1r5y3l5o3l9/f7l1q5l0o0o0o0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Custom Styles for specific layout --}}
    <style>
        /* Ensures the QR code wrapper handles alignment and border */
        .qr-code-wrapper {
            border: 1px solid #ccc;
            padding: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Added margin-left for spacing */
            margin-left: 20px;
        }

        /* NEW STYLE: Increase image size */
        .gallery-image {
            max-width: 500px; /* Significantly increased image max width */
            max-height: 500px;
            object-fit: cover;
        }

        /* NEW STYLE: Container to hold image and QR code side-by-side */
        .image-qr-row {
            display: flex;
            align-items: flex-start; /* Aligns content to the top */
            gap: 20px; /* Space between image and QR code blocks */
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/gallery') }}">Photo Management Portal</a>

            <div class="d-flex">
                @auth
                    <span class="navbar-text text-white me-3">
                        Welcome, <strong>{{ Auth::user()->name ?? 'User' }}</strong>!
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            Logout
                        </button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-light btn-sm me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register</a>
                @endguest
            </div>
        </div>
    </nav>

    <div class="container my-5">

        <h1 class="mb-4">Image Gallery Management</h1>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- NEW IMAGE UPLOAD FORM --}}
        <div class="card mb-5 shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Add New Image to Make new QR code</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('gallery.new_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="new_photos" class="form-label">Choose Multiple Photos:</label>
                        <input type="file" name="new_photos[]" id="new_photos" class="form-control" multiple >
                    </div>
                    <button type="submit" class="btn btn-success">Upload New Images</button>
                </form>
            </div>
        </div>

        {{-- EXISTING IMAGES DISPLAY (Each image takes a full row) --}}
        <h2 class="mt-5 mb-4">All Photos ({{ count($photos) }})</h2>

        @if ($photos->isEmpty())
            <div class="alert alert-info">
                No images in the gallery yet. Upload one above!
            </div>
        @endif



        {{-- Loop through photos --}}
@foreach ($photos as $photo)
    @php
        // Get the file extension and convert to lowercase
        $extension = strtolower(pathinfo($photo->file_path, PATHINFO_EXTENSION));
        // Check if it's a PDF
        $is_pdf = $extension === 'pdf';
    @endphp

    <div class="card shadow-sm mb-4">
        <div class="card-body p-4">

            <h5 class="card-title mb-3">Photo: {{ $photo->qr_url }}</h5>

            <div class="image-qr-row">

                {{-- 1. Image/PDF Preview --}}
                <div class="d-flex flex-column align-items-start">
                    <a href="{{ route('photo.edit', $photo) }}" style="cursor: pointer; text-decoration: none;">

                        {{-- CONDITIONAL RENDERING: IMAGE vs. PDF PREVIEW --}}
                        @if ($is_pdf)
                            {{-- PDF EMBED PREVIEW --}}
                            <div class="border p-2 bg-light gallery-image"
                                 style="width: 500px; height: 500px; overflow: hidden; border-radius: 4px;">

                                {{-- Iframe loads the PDF file directly --}}
                                <iframe src="{{ asset($photo->file_path) }}"
                                        style="width: 100%; height: 100%; border: none;">
                                    {{-- Fallback content for browsers that don't support iframes/PDF embedding --}}
                                    <p class="text-center text-danger mt-3">Your browser does not support embedded PDF files.
                                        <a href="{{ asset($photo->file_path) }}" target="_blank">Click here to download/view the PDF.</a>
                                    </p>
                                </iframe>
                            </div>
                        @else
                            {{-- IMAGE VIEW (Unchanged) --}}
                            <img src="{{ asset($photo->file_path) }}"
                                alt="{{ $photo->original_name }}"
                                class="img-fluid border p-2 gallery-image"
                                style="transition: opacity 0.2s; border-radius: 4px;">
                        @endif

                    </a>
                    <p class="mt-2 small text-muted">File Name: <strong>{{ $photo->original_name }}</strong></p>
                </div>

                {{-- 2. QR Code (rest of the code is unchanged) --}}
                @if (isset($qrCodes[$photo->id]))
                    <div class="qr-code-wrapper p-3">
                        <p class="small fw-bold mb-2">QR Link</p>
                        {!! $qrCodes[$photo->id] !!}
                        <p class="text-center text-muted mt-2 small">Scan to view</p>
                    </div>
                @endif
            </div>

            <hr class="my-3">

            {{-- Action buttons (unchanged) --}}
            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('photo.edit', $photo) }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-edit me-1"></i> Change Image
                </a>

                <form action="{{ route('gallery.destroy', $photo) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash me-1"></i> Delete This Image
                    </button>
                </form>
            </div>
        </div>
    </div>
@endforeach



    </div>

    {{-- Bootstrap JS Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

</body>
</html>
