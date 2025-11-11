<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Home & Trade Licences</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Trade Licence Hub</a>

        <div class="d-flex">
            {{-- 1. CHECK IF THE USER IS LOGGED IN --}}
            @auth
                {{-- Show the user's name and logout button --}}
                <span class="navbar-text text-white me-3">
                    Welcome, <strong>{{ Auth::user()->name ?? 'User' }}</strong>!
                </span>
                {{-- Logout Button Form (Using named route) --}}
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        Logout
                    </button>
                </form>
            @endauth

            {{-- 2. CHECK IF NO USER IS LOGGED IN --}}
            @guest
                <a href="{{ route('login') }}" class="btn btn-light btn-sm me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register</a>
            @endguest
        </div>
    </div>
</nav>

<div class="container mt-5">


    {{-- 🛑 INSERT THIS BLOCK HERE 🛑 --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- 🛑 END OF BLOCK 🛑 --}}

    {{-- ========================================================================= --}}
    {{-- CONTENT DISPLAYED ONLY IF THE USER IS AUTHENTICATED (@auth block)          --}}
    {{-- ========================================================================= --}}
    @auth
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Trade Licence Management</h1>

            <!-- Button to Add New Data -->
            <a href="{{ url('/trade_licence_resigter/')  }}" class="btn btn-success btn-lg shadow-sm">
                <i class="fas fa-plus-circle me-2"></i> Add New Licence Data
            </a>
        </div>

        <hr>

        <h2 class="mb-3">Licence List</h2>

        <!-- TRADE LICENCE LIST TABLE -->
        <div class="card shadow-lg">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col"># ID</th>
                                <th scope="col">Applicant Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Licence No.</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Placeholder for actual Laravel data loop --}}
                            @forelse ($licences as $licence)
                                <tr>
                                    <th scope="row">{{ $licence->id }}</th>
                                    <td>{{ $licence->applicant_name }}</td>
                                    <td>{{ $licence->email }}</td>
                                    <td>{{ $licence->licence_number ?? 'N/A' }}</td>
                                    <td class="text-center">
                                        {{-- View Button --}}
                                        <a href="{{ url('/trade_licence/' . $licence->id) }}" class="btn btn-info btn-sm me-2" title="View Details">
                                            Generate Trade Licence
                                        </a>

                                        {{-- Edit Button --}}
                                        <a href="{{ url('/edit_trade_licence/' . $licence->id ) }}" class="btn btn-primary btn-sm me-2" title="Edit Record">
                                            Edit
                                        </a>

                                        {{-- Delete Button (Using a form for POST/DELETE method) --}}
                                        <form action="{{ url('/trade_licence/' . $licence->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Record">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No trade licence applications found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endauth

    {{-- ========================================================================= --}}
    {{-- CONTENT DISPLAYED ONLY IF THE USER IS NOT AUTHENTICATED (@guest block)      --}}
    {{-- ========================================================================= --}}
    @guest
        <div class="text-center py-5">
            <h1 class="display-5">For Make Trade Liecnce</h1>
            <p class="lead mt-3">
                Please log in to your account to view and manage the Trade Licence database.
            </p>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3 me-2">Go to Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg mt-3">Register New Account</a>
        </div>
    @endguest

</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Placeholder for Font Awesome for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" xintegrity="sha512-u3f4T19U5W5gI3j9sE1wWJ4z9vT+O7jD+v/3m/V/A2z/0y7x2v1j4P/7x2j/4z3r/w6w4e0t/8x2p/2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
