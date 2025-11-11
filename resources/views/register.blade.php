<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        /* Optional: Basic styling to vertically center the form content */
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg p-4">
                    <h2 class="card-title text-center mb-4 text-primary">Registration Form</h2>

                   <form action="/register" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input name="name"
               type="text"
               class="form-control"
               id="name"
               placeholder="e.g., John Doe"
               required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input name="email"
               type="email"
               class="form-control"
               id="email"
               placeholder="name@example.com"
               required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password"
               type="password"
               class="form-control"
               id="password"
               placeholder="Enter your password"
               required>
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input name="password_confirmation"
               type="password"
               class="form-control"
               id="password_confirmation"
               placeholder="Confirm your password"
               required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">Register</button>
    </div>

    <p class="text-center mt-3 mb-0">
        Already have an account? <a href="/login" class="text-decoration-none">Login here</a>
    </p>
</form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
