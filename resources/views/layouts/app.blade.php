<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Posts Website') - @yield('subtitle',) ')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            font-weight: bold;
        }

        .card {
            margin-bottom: 20px;
        }

        .tag {
            background-color: #e9ecef;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            margin: 2px;
            display: inline-block;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <div class="d-flex flex-row align-items-center justify-content-end w-100">
            <!-- Links -->
            <div class="navbar-nav d-flex flex-row">
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link ms-3" style="border: none;">Logout</button>
                    </form>
                    <a class="nav-link ms-3" href="{{ route('posts.create') }}">Create Post</a>
                @else
                    <a class="nav-link ms-3" href="{{ route('login') }}">Login</a>
                    <a class="nav-link ms-3" href="{{ route('register') }}">Register</a>
                @endauth
            </div>

            <!-- Posts Website -->
            <a class="navbar-brand ms-3" href="{{ route('home') }}">Posts Website</a>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>