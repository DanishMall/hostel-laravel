<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel.com - University Hostel Booking</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        :root {
            --primary-color: #2C3E50;
            --secondary-color: #34495E;
            --accent-color: #3498DB;
            --background-color: #F5F6FA;
            --text-color: #2C3E50;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .logo {
            max-width: 120px;
            height: auto;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-outline {
            background-color: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .main-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .hero-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .hero-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            margin-bottom: 1rem;
        }

        .section-title {
            color: var(--primary-color);
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .section-description {
            color: var(--secondary-color);
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
            margin-top: 4rem;
            text-align: center;
        }

        @media (max-width: 768px) {
            .hero-section {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<header class="header">
    <nav class="nav-container">
        <img src="{{asset('images/hostelv3.png')}}" alt="UNISEL Logo" class="logo">
        <div class="nav-buttons">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endif
            @endauth
        </div>
    </nav>
</header>

<main class="main-content">
    <section class="hero-section">
        <div>
            <h1 class="section-title">Welcome to Hostel.com</h1>
            <p class="section-description">
                Discover comfortable and convenient accommodation options for your university stay.
                Book your perfect hostel room with ease and enjoy a seamless boarding experience.
            </p>
            <a href="{{ route('register') }}" class="btn btn-primary">Book Your Room Now</a>
        </div>
        <img src="{{ asset('images/hostel-bj.jpg') }}" alt="Hostel Building" class="hero-image">
    </section>

    <div class="features-grid">
        <div class="feature-card">
            <svg class="feature-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h3>Modern Facilities</h3>
            <p>Enjoy well-maintained rooms with modern amenities and comfortable furnishings.</p>
        </div>
        <div class="feature-card">
            <svg class="feature-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h3>24/7 Security</h3>
            <p>Round-the-clock security services to ensure your safety and peace of mind.</p>
        </div>
        <div class="feature-card">
            <svg class="feature-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 4H5C3.89543 4 3 4.89543 3 6V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V6C21 4.89543 20.1046 4 19 4Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 2V6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8 2V6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3 10H21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <h3>Easy Booking</h3>
            <p>Simple and straightforward online booking process with instant confirmation.</p>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2024 Hostel.com. All rights reserved.</p>
</footer>
</body>
</html>
