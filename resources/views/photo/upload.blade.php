<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Photo Upload/Replace</title>

    {{-- 1. Bootstrap CSS Link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">

    {{-- 2. Custom Styles (Cleaned up for Bootstrap integration) --}}
    <style>
        /* Styles for the side-by-side container - Using Bootstrap's d-flex now, but keeping this for specificity */
        .display-container {
            /* Bootstrap handles 'display: flex' and 'gap' */
            align-items: center; /* Aligns items to the center vertically */
        }

        /* Style for the QR code wrapper */
        .qr-code-wrapper {
            /* Replacing inline styles with Bootstrap classes where possible */
            border: 1px solid #ccc;
            padding: 40px !important;
            /* Ensures the SVG itself is centered within its container if it's smaller */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .image-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Print styles */
        @media print {
            body > *:not(.printable-section) {
                display: none;
            }
            .printable-section {
                width: 100%;
                margin: 0;
                padding: 20px;
            }
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
                    {{-- Note: 'route('login')' and 'route('register')' must be defined in your routes --}}
                    <a href="{{ route('login') }}" class="btn btn-light btn-sm me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register</a>
                @endguest
            </div>
        </div>
    </nav>



    {{-- Main Content Container --}}
    {{-- Main Content Container --}}
<div class="container my-5">

    <h1 class="mb-4">{{ $photo ? 'Replace Existing Photo' : 'Upload New Photo' }}</h1>

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

    @if ($photo)
        {{-- Conditional logic to determine file type --}}
        @php
            $extension = strtolower(pathinfo($photo->file_path, PATHINFO_EXTENSION));
            $is_pdf = $extension === 'pdf';
            // Set consistent preview dimensions for image/pdf
            $preview_style = 'max-width: 950px; height: auto;';
            $pdf_embed_style = 'width: 950px; height: 700px;'; // A larger dedicated size for PDF viewing
        @endphp

       <h2 class="mt-5 mb-3">
                Current Photo QR URL :
                <a href="{{ 'http://photo_to_qr_code.test/dakhila-print/' . $photo->qr_url }}" target="_blank">
                    {{ 'http://photo_to_qr_code.test/dakhila-print/' . $photo->qr_url }}
                </a>
            </h2>
        {{-- FLEXBOX CONTAINER for side-by-side layout --}}
        <div class="display-container d-flex gap-4 mb-4">

            {{-- 1. IMAGE/PDF DISPLAY AREA --}}
            <div class="image-wrapper">
                <h3 class="h5">Uploaded File Preview</h3>

                {{-- CONDITIONAL RENDERING: IMAGE vs. PDF PREVIEW --}}
                @if ($is_pdf)
                    {{-- PDF EMBED PREVIEW using iframe --}}
                    <div class="border p-1 bg-light" style="{{ $pdf_embed_style }}">
                        <iframe src="{{ asset($photo->file_path) }}"
                                style="width: 100%; height: 100%; border: none;">
                            <p class="text-center text-danger mt-3">Your browser does not support embedded PDF files.
                                <a href="{{ asset($photo->file_path) }}" target="_blank">Click here to download/view the PDF.</a>
                            </p>
                        </iframe>
                    </div>
                @else
                    {{-- IMAGE VIEW --}}
                    <img src="{{ asset($photo->file_path) }}"
                        alt="{{ $photo->original_name }}"
                        class="img-fluid border p-1"
                        style="{{ $preview_style }}">
                @endif

                <p class="mt-2 text-muted">Original File Name: <strong>{{ $photo->original_name }}</strong></p>
            </div>

            {{-- 2. QR CODE DISPLAY AREA (Commented out in original, kept as reference) --}}
            @if ($qrCode)
                <div class="qr-code-wrapper">
                    <h3 class="h5">QR Code Link</h3>
                    {!! $qrCode !!}
                    <p class="text-center text-muted mt-2 small">Scan to view the photo.</p>
                </div>
            @endif
        </div>

        <hr class="my-4">
    @endif

    {{-- File Upload Form (unchanged) --}}

    {{-- ... rest of the form code remains the same ... --}}

        <h2 class="mt-4 mb-3">Photo Upload/Replacement</h2>

        {{-- File Upload Form --}}
        @if(isset($photo) && $photo)
            <form action="{{ route('photo.update', $photo) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        @else
            <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        @endif

            {{-- Using Bootstrap form controls --}}
            <div class="mb-3">
                <label for="photo_file" class="form-label">Choose Photo:</label>
                <input type="file" name="photo_file" id="photo_file" class="form-control" required>
            </div>

            {{-- Using Bootstrap button class --}}
            <button type="submit" class="btn btn-primary">
                {{ $photo ? 'Replace Photo' : 'Upload Photo' }}
            </button>

                {{-- Back to Gallery Button --}}

        <a href="{{ route('gallery.index') }}" class="btn btn-warning btn-sm w-50" style="font-weight: bold; color: #000;">
            <i class="fas fa-arrow-left me-2" style="font-size: 1.2em;"></i>Back to Gallery
        </a>

        </form>
    </div>

    {{-- 3. Bootstrap JavaScript Bundle (Optional, but good practice) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

</body>
</html>
