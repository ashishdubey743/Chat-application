<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Center the content vertically and horizontally */
        .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Adjust height as needed */
        }
        .bg-color {
            background: #d1d7db;
            padding: 37px;
            border-radius: 17px;
        }
    </style>
</head>
<body>
    <div class="centered-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 bg-color">
                    <h2 class="mb-4 text-center">User Registration</h2>
                    <form action="verify_otp" method="post">
                        @csrf
                        <!-- OTP Field -->
                        <div class="mb-3">
                            <label for="otp" class="form-label">Enter OTP</label>
                            <input name="otp" type="text" class="form-control" id="otp" placeholder="Enter OTP">
                            @error('otp')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
