<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Grant Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Welcome to the Research Grant Management System</h1>
        <p class="text-center">Manage research grants and project leaders effectively.</p>

        <!-- Login Button -->
        <div class="text-center mb-4">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        </div>

        <!-- Check user role -->
        <?php
        use Illuminate\Support\Facades\Auth;
            $role = Auth::user()->role ?? 'staff';
        ?>

        <!-- Admin Links -->
        <?php if ($role == 'admin'): ?>
            <div class="list-group mt-4">
                <a href="/academicians" class="list-group-item list-group-item-action">Manage Academicians</a>
                <a href="/grants" class="list-group-item list-group-item-action">Manage Research Grants</a>

            </div>
        <?php endif; ?>

        <!-- Project Leader Links -->
        <?php if ($role == 'leader'): ?>
            <div class="list-group mt-4">
                <a href="/my-grants" class="list-group-item list-group-item-action">My Grants</a>

            </div>
        <?php endif; ?>

        <!-- Member Links -->
        <?php if ($role == 'staff'): ?>
            <div class="list-group mt-4">
                <a href="/my-projects" class="list-group-item list-group-item-action">My Projects</a>
            </div>
        <?php endif; ?>

        <!-- Guest Links -->
        <?php if ($role == 'guest'): ?>
            <div class="alert alert-warning mt-4">You must <a href="/login">log in</a> to access the system.</div>
        <?php endif; ?>

        <footer class="text-center mt-5">
            <p>&copy; 2024 UNITEN Innovation and Research Management Center (iRMC)</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
