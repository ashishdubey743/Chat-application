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
        .bg-color{
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
                    <form action="process_register" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="Enter username" >
                            @error('username')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="Enter password" >
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input name="phone" type="tel" class="form-control" id="phone" placeholder="Enter phone number" >
                            @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input name="profile" type="file" class="form-control" id="profile" accept="image/*" >
                            @error('profile')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bio" class="form-label">Bio</label>
                            <textarea name="bio" class="form-control" id="bio" rows="3" placeholder="Enter bio"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
