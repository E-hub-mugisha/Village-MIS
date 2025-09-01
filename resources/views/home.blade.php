<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Village MIS</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <meta name="robots" content="noindex, nofollow">

    <!-- Favicons -->
    <link href="https://bootstrapmade.com/content/demo/Landify/assets/img/favicon.png" rel="icon">
    <link href="https://bootstrapmade.com/content/demo/Landify/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/" rel="preconnect">
    <link href="https://fonts.gstatic.com/" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://bootstrapmade.com/content/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://bootstrapmade.com/content/vendors/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://bootstrapmade.com/content/vendors/aos/aos.css" rel="stylesheet">
    <link href="https://bootstrapmade.com/content/vendors/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="https://bootstrapmade.com/content/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="https://bootstrapmade.com/content/demo/Landify/assets/css/main.css" rel="stylesheet">


</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">BirthRecordsMIS</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            @if (Route::has('login'))
            @auth
            <a class="btn-getstarted" href="{{ url('/dashboard') }}">Dashboard</a>
            @else
            <a
                href="{{ route('login') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                Log in
            </a>

            @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                Register
            </a>
            @endif
            @endauth
            @endif
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row align-items-center">

                    <!-- Hero Text Content -->
                    <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-delay="200">
                        <div class="hero-content">
                            <h1 class="hero-title">Streamlined Birth Records Management</h1>
                            <p class="hero-description">
                                Our MIS enables efficient registration, tracking, and reporting of birth records across all districts.
                                Ensure accurate, secure, and accessible citizen data at your fingertips.
                            </p>
                            <div class="hero-actions">
                                <a href="#dashboard" class="btn-primary">View Dashboard</a>
                                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn-secondary glightbox">
                                    <i class="bi bi-play-circle"></i>
                                    <span>Watch How It Works</span>
                                </a>
                            </div>
                            <div class="hero-stats">
                                <div class="stat-item">
                                    <span class="stat-number">{{ $totalRecords ?? 0 }}</span>
                                    <span class="stat-label">Total Birth Records</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">{{ $maleRecords ?? 0 }}/{{ $femaleRecords ?? 0 }}</span>
                                    <span class="stat-label">Male / Female Ratio</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">{{ $recentRecords->count() ?? 0 }}</span>
                                    <span class="stat-label">Recent Registrations</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hero Visual Illustration -->
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="300">
                        <div class="hero-visual">
                            <div class="hero-image-wrapper">
                                <img src="https://bootstrapmade.com/content/demo/Landify/assets/img/illustration/illustration-15.webp" class="img-fluid hero-image" alt="MIS Dashboard Illustration">
                                <div class="floating-elements">
                                    <div class="floating-card card-1">
                                        <i class="bi bi-file-earmark-text"></i>
                                        <span>Accurate Records</span>
                                    </div>
                                    <div class="floating-card card-2">
                                        <i class="bi bi-bar-chart-line"></i>
                                        <span>Insightful Reports</span>
                                    </div>
                                    <div class="floating-card card-3">
                                        <i class="bi bi-shield-check"></i>
                                        <span>Secure Data</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Hero Section -->


        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-5">

                    <!-- Textual Content -->
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="content-wrapper">
                            <div class="section-header">
                                <span class="section-badge">ABOUT OUR MIS</span>
                                <h2>Efficient, Secure, and Accurate Birth Records Management</h2>
                            </div>

                            <p class="lead-text">
                                Our MIS empowers local authorities to register, track, and manage birth records digitally.
                                Reduce manual paperwork, improve data accuracy, and ensure secure access to vital citizen information.
                            </p>

                            <p class="description-text">
                                With role-based access, real-time reporting, and automated workflows, this system streamlines birth registration processes, supports insightful analytics, and enhances citizen services.
                            </p>

                            <div class="stats-grid">
                                <div class="stat-item">
                                    <div class="stat-number">{{ $totalRecords ?? 0 }}</div>
                                    <div class="stat-label">Total Records</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">{{ $maleRecords ?? 0 }}/{{ $femaleRecords ?? 0 }}</div>
                                    <div class="stat-label">Male / Female Ratio</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">{{ $recentRecords->count() ?? 0 }}</div>
                                    <div class="stat-label">Recent Registrations</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">100%</div>
                                    <div class="stat-label">Data Security</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Content -->
                    <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                        <div class="visual-section">
                            <div class="main-image-container">
                                <img src="https://bootstrapmade.com/content/demo/Landify/assets/img/about/about-8.webp" alt="Digital MIS Dashboard" class="img-fluid main-visual">
                                <div class="overlay-card">
                                    <div class="card-content">
                                        <h4>Accuracy & Compliance</h4>
                                        <p>Ensure all records are precise, verifiable, and compliant with regulations.</p>
                                        <div class="card-icon">
                                            <i class="bi bi-file-earmark-text-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="secondary-images">
                                <div class="row g-3">
                                    <div class="col-6">
                                        <img src="https://bootstrapmade.com/content/demo/Landify/assets/img/about/about-11.webp" alt="Team Monitoring Dashboard" class="img-fluid secondary-img">
                                    </div>
                                    <div class="col-6">
                                        <img src="https://bootstrapmade.com/content/demo/Landify/assets/img/about/about-5.webp" alt="Data Analytics Visualization" class="img-fluid secondary-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Features Section -->
                <div class="row mt-5">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                        <div class="features-section">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div class="feature-box">
                                        <div class="feature-icon">
                                            <i class="bi bi-shield-lock-fill"></i>
                                        </div>
                                        <h5>Secure Data</h5>
                                        <p>All records are stored safely with encrypted access and role-based permissions.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-box">
                                        <div class="feature-icon">
                                            <i class="bi bi-speedometer2"></i>
                                        </div>
                                        <h5>Fast Processing</h5>
                                        <p>Register new births, update records, and generate reports quickly with minimal manual effort.</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-box">
                                        <div class="feature-icon">
                                            <i class="bi bi-bar-chart-line-fill"></i>
                                        </div>
                                        <h5>Insightful Reports</h5>
                                        <p>Generate statistics, trends, and dashboards to support decision-making and planning.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Features Section -->
        <section id="features" class="features section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span class="description-title">Features</span>
                <h2>System Features</h2>
                <p>Our MIS offers efficient, secure, and intelligent management of birth records for authorities and administrators.</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="tabs-wrapper">
                    <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">

                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                                <div class="tab-icon">
                                    <i class="bi bi-speedometer2"></i>
                                </div>
                                <div class="tab-content">
                                    <h5>Dashboard</h5>
                                    <span>Real-time insights</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                                <div class="tab-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                                <div class="tab-content">
                                    <h5>Data Security</h5>
                                    <span>Encrypted & role-based access</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                                <div class="tab-icon">
                                    <i class="bi bi-bar-chart-line"></i>
                                </div>
                                <div class="tab-content">
                                    <h5>Analytics</h5>
                                    <span>Reports & statistics</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
                                <div class="tab-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="tab-content">
                                    <h5>User Management</h5>
                                    <span>Roles & permissions</span>
                                </div>
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                        <!-- Dashboard Tab -->
                        <div class="tab-pane fade active show" id="features-tab-1">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <div class="content-wrapper">
                                        <div class="icon-badge">
                                            <i class="bi bi-speedometer2"></i>
                                        </div>
                                        <h3>Real-Time Dashboard</h3>
                                        <p>Track total records, gender ratios, recent registrations, and system metrics all in one intuitive interface.</p>
                                        <div class="feature-grid">
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Customizable widgets</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Live statistical graphs</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Quick search and filters</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Exportable reports</div>
                                        </div>
                                        <a href="#" class="btn-primary">Learn More <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="visual-content">
                                        <img src="https://bootstrapmade.com/content/demo/Landify/assets/img/features/features-4.webp" alt="Dashboard" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Security Tab -->
                        <div class="tab-pane fade" id="features-tab-2">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <div class="content-wrapper">
                                        <div class="icon-badge"><i class="bi bi-shield-lock"></i></div>
                                        <h3>Secure Records</h3>
                                        <p>All birth records are protected with encryption, role-based access, and audit trails to ensure privacy and compliance.</p>
                                        <div class="feature-grid">
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Encrypted database storage</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Multi-factor authentication</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Access logs & audit trails</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Compliance with regulations</div>
                                        </div>
                                        <a href="#" class="btn-primary">Learn More <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="visual-content">
                                        <img src="https://bootstrapmade.com/content/demo/Landify/assets/img/features/features-2.webp" alt="Security" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Analytics Tab -->
                        <div class="tab-pane fade" id="features-tab-3">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <div class="content-wrapper">
                                        <div class="icon-badge"><i class="bi bi-bar-chart-line"></i></div>
                                        <h3>Analytics & Reports</h3>
                                        <p>Generate insightful reports and analytics for better planning and management of citizen records.</p>
                                        <div class="feature-grid">
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Gender & demographic analysis</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Birth trends over time</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Exportable CSV & PDF reports</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Interactive dashboards</div>
                                        </div>
                                        <a href="#" class="btn-primary">Learn More <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="visual-content">
                                        <img src="https://bootstrapmade.com/content/demo/Landify/assets/img/features/features-6.webp" alt="Analytics" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- User Management Tab -->
                        <div class="tab-pane fade" id="features-tab-4">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <div class="content-wrapper">
                                        <div class="icon-badge"><i class="bi bi-people"></i></div>
                                        <h3>User & Role Management</h3>
                                        <p>Control access with detailed role permissions and assign responsibilities for efficient record handling.</p>
                                        <div class="feature-grid">
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Role-based permissions</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Admin & staff dashboards</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Activity logs</div>
                                            <div class="feature-item"><i class="bi bi-check-circle-fill"></i> Audit & compliance tracking</div>
                                        </div>
                                        <a href="#" class="btn-primary">Learn More <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="visual-content">
                                        <img src="https://bootstrapmade.com/content/demo/Landify/assets/img/features/features-1.webp" alt="User Management" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /Features Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="main-headline">Empowering Accurate Civil Registration</h3>
                        <p class="main-description">Our Birth Records MIS ensures secure, efficient, and digital management of birth registrations across all regions, enhancing reliability and compliance.</p>

                        <div class="achievement-badge" data-aos="zoom-in" data-aos-delay="300">
                            <div class="achievement-content">
                                <div class="achievement-icon">
                                    <i class="bi bi-trophy-fill"></i>
                                </div>
                                <div class="achievement-details">
                                    <div class="achievement-title">Trusted System</div>
                                    <div class="achievement-subtitle">Used by 120+ government offices nationwide</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stats-grid">
                    <div class="row g-4">
                        <div class="col-xl-3 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">
                                        <span data-purecounter-start="0" data-purecounter-end="500" data-purecounter-duration="2" class="purecounter"></span>K+
                                    </div>
                                    <div class="stat-label">Registered Births</div>
                                    <div class="stat-growth">
                                        <i class="bi bi-arrow-up"></i>
                                        <span>+15% this year</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="stat-item featured">
                                <div class="stat-icon">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">
                                        <span data-purecounter-start="0" data-purecounter-end="99" data-purecounter-duration="2" class="purecounter"></span>%
                                    </div>
                                    <div class="stat-label">Accuracy Rate</div>
                                    <div class="stat-growth">
                                        <i class="bi bi-arrow-up"></i>
                                        <span>+3% improvement</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-award-fill"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">
                                        <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="2" class="purecounter"></span>
                                    </div>
                                    <div class="stat-label">Government Awards</div>
                                    <div class="stat-growth">
                                        <i class="bi bi-arrow-up"></i>
                                        <span>+2 this year</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="stat-item">
                                <div class="stat-icon">
                                    <i class="bi bi-globe"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-number">
                                        <span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="2" class="purecounter"></span>
                                    </div>
                                    <div class="stat-label">Regional Offices</div>
                                    <div class="stat-growth">
                                        <i class="bi bi-arrow-up"></i>
                                        <span>+5 new offices</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span class="description-title">Contact</span>
                <h2>Contact</h2>
                <p>Reach out to our support team for assistance with registrations or system inquiries</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="content" data-aos="fade-up" data-aos-delay="200">
                            <div class="section-category mb-3">Get in Touch</div>
                            <h2 class="display-5 mb-4">We’re Here to Help</h2>
                            <p class="lead mb-4">For assistance with registrations, technical support, or general inquiries, our team is ready to respond promptly.</p>

                            <div class="contact-info mt-5">
                                <div class="info-item d-flex mb-3" data-aos="fade-up" data-aos-delay="300">
                                    <i class="bi bi-envelope-at me-3"></i>
                                    <span><a href="mailto:support@birthrecordsmis.gov.rw">support@birthrecordsmis.gov.rw</a></span>
                                </div>

                                <div class="info-item d-flex mb-3" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-telephone me-3"></i>
                                    <span>+250 788 123 456</span>
                                </div>

                                <div class="info-item d-flex mb-4" data-aos="fade-up" data-aos-delay="500">
                                    <i class="bi bi-geo-alt me-3"></i>
                                    <span>Government Building, Kigali, Rwanda</span>
                                </div>

                                <a href="https://www.google.com/maps" target="_blank" class="map-link d-inline-flex align-items-center" data-aos="fade-up" data-aos-delay="600">
                                    Open Map
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-form card" data-aos="fade-up" data-aos-delay="300">
                            <div class="card-body p-4 p-lg-5">

                                <form action="/contact" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="600">
                                    <div class="row gy-4">

                                        <div class="col-12">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                                        </div>

                                        <div class="col-12">
                                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                                        </div>

                                        <div class="col-12">
                                            <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                                        </div>

                                        <div class="col-12">
                                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                        </div>

                                        <div class="col-12 text-center">
                                            <div class="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div class="sent-message">Your message has been sent. Thank you!</div>

                                            <button type="submit" class="btn btn-submit w-100">Submit Message</button>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Contact Section -->


    </main>

    <footer id="footer" class="footer position-relative dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <!-- About Section -->
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                        <span class="sitename">BirthRecordsMIS</span>
                    </a>
                    <p>BirthRecordsMIS provides secure, efficient, and digital management of birth registrations, helping authorities maintain accurate and compliant records.</p>
                    <div class="social-links d-flex mt-4">
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <!-- Useful Links -->
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Modules</h4>
                    <ul>
                        <li><a href="#">Registration</a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Analytics</a></li>
                        <li><a href="#">User Management</a></li>
                        <li><a href="#">Reports & Exports</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>Government Building</p>
                    <p>Kigali, Rwanda</p>
                    <p>Rwanda</p>
                    <p class="mt-4"><strong>Phone:</strong> <span>+250 788 123 456</span></p>
                    <p><strong>Email:</strong> <span><a href="mailto:info@birthrecordsmis.gov.rw">info@birthrecordsmis.gov.rw</a></span></p>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="container copyright text-center mt-4">
            <p>© <span>2025</span> <strong class="px-1 sitename">BirthRecordsMIS</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="#">Your Organization</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script data-cfasync="false" src="https://bootstrapmade.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/php-email-form/validate.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/aos/aos.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/glightbox/js/glightbox.min.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="https://bootstrapmade.com/content/vendors/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="https://bootstrapmade.com/content/demo/Landify/assets/js/main.js"></script>

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"68c5ca450bae485a842ff76066d69420","server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
</body>

</html>