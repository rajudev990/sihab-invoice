<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayad Global Consulting - Visa Agency</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Gradient button */
        .gradient-btn {
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
            border: none;
            transition: 0.3s;
        }

        .gradient-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Hero text shadow */
        .hero-section h1,
        .hero-section p {
            text-shadow: 1px 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Navbar fix */
        header {
            margin-bottom: 0;
        }

        .header-banner {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            padding: 120px 0;
            text-align: center;
        }

        .section-title {
            margin-bottom: 60px;
            text-align: center;
        }

        .gradient-btn {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            border: none;
        }

        .team-member img {
            border-radius: 50%;
        }

        footer {
            background: #222;
            color: #fff;
            padding: 40px 0;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            color: #00f2fe;
        }

        .card-shadow {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .portfolio-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .testimonial {
            background: #f1f9ff;
            padding: 40px;
            border-radius: 10px;
            margin: 20px 0;
        }
    </style>
</head>

<body>

    <!-- Header + Navigation -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">Ayad Global Consulting</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item"><a class="nav-link active" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#process">Process</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Banner / Hero Section -->
    <section class="hero-section d-flex align-items-center"
        style="min-height: 100vh; background: linear-gradient(to right, #4facfe, #00f2fe);">
        <div class="container text-center text-white">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold">Your Trusted Visa & Immigration Partner</h1>
                    <p class="lead my-4">Helping students, professionals, and families achieve their dreams abroad with
                        expert guidance and hassle-free visa processing.</p>
                    <a href="#contact" class="btn btn-lg gradient-btn text-white px-5 py-3 shadow-lg">Get Free
                        Consultation</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/600x450" class="img-fluid rounded shadow-lg"
                        alt="Visa Consulting">
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="section-title">
                <h2>About Us</h2>
                <p>Helping clients achieve their dream of studying, working, or living abroad.</p>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/500x350" class="img-fluid rounded" alt="About Us">
                </div>
                <div class="col-md-6">
                    <p>Ayad Global Consulting is a premier visa agency providing complete guidance and assistance for
                        immigration, student visa, work visa, and business visa processes. Our expert team ensures
                        smooth and reliable service for all clients.</p>
                    <ul>
                        <li>Expert Guidance</li>
                        <li>Trusted by Numerous Companies</li>
                        <li>Transparent Processing</li>
                        <li>24/7 Customer Support</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-shadow p-3 text-center">
                        <i class="fas fa-passport fa-3x mb-3 text-primary"></i>
                        <h5>Visa Processing</h5>
                        <p>We handle all visa types with complete documentation and expert guidance.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-shadow p-3 text-center">
                        <i class="fas fa-university fa-3x mb-3 text-primary"></i>
                        <h5>Student Visa</h5>
                        <p>Assistance for studying abroad including admission guidance and visa processing.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-shadow p-3 text-center">
                        <i class="fas fa-briefcase fa-3x mb-3 text-primary"></i>
                        <h5>Work Visa</h5>
                        <p>Professional help for work permits and employment visas overseas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-5">
        <div class="container">
            <div class="section-title">
                <h2>Success Stories</h2>
                <p>Some of the clients we’ve successfully assisted.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 portfolio-item">
                    <img src="https://via.placeholder.com/400x250" alt="Client 1">
                </div>
                <div class="col-md-4 portfolio-item">
                    <img src="https://via.placeholder.com/400x250" alt="Client 2">
                </div>
                <div class="col-md-4 portfolio-item">
                    <img src="https://via.placeholder.com/400x250" alt="Client 3">
                </div>
            </div>
        </div>
    </section>

    <!-- Processing System / How it Works -->
    <section id="process" class="py-5 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Our Process</h2>
                <p>Simple steps to get your visa approved successfully.</p>
            </div>
            <div class="row text-center g-4">
                <div class="col-md-3">
                    <div class="card card-shadow p-3">
                        <i class="fas fa-file-alt fa-2x mb-2 text-primary"></i>
                        <h6>Step 1: Documentation</h6>
                        <p>Prepare all required documents with our guidance.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-shadow p-3">
                        <i class="fas fa-user-check fa-2x mb-2 text-primary"></i>
                        <h6>Step 2: Expert Review</h6>
                        <p>Our experts review your documents carefully.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-shadow p-3">
                        <i class="fas fa-plane fa-2x mb-2 text-primary"></i>
                        <h6>Step 3: Submission</h6>
                        <p>Submit your application to the respective authorities.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-shadow p-3">
                        <i class="fas fa-smile-beam fa-2x mb-2 text-primary"></i>
                        <h6>Step 4: Approval</h6>
                        <p>Receive your visa with our end-to-end assistance.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Companies / Clients -->
    <section id="clients" class="py-5">
        <div class="container">
            <div class="section-title">
                <h2>Our Clients</h2>
                <p>Trusted by multiple companies and organizations.</p>
            </div>
            <div class="row g-4 text-center">
                <div class="col-md-2">
                    <img src="https://via.placeholder.com/100x50" alt="Client Logo">
                </div>
                <div class="col-md-2">
                    <img src="https://via.placeholder.com/100x50" alt="Client Logo">
                </div>
                <div class="col-md-2">
                    <img src="https://via.placeholder.com/100x50" alt="Client Logo">
                </div>
                <div class="col-md-2">
                    <img src="https://via.placeholder.com/100x50" alt="Client Logo">
                </div>
                <div class="col-md-2">
                    <img src="https://via.placeholder.com/100x50" alt="Client Logo">
                </div>
                <div class="col-md-2">
                    <img src="https://via.placeholder.com/100x50" alt="Client Logo">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-5 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Testimonials</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"Ayad Global helped me get my student visa with ease and guidance throughout the process."
                        </p>
                        <h6>- John Doe</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"Professional and reliable! My work visa process was smooth and fast."</p>
                        <h6>- Sarah Khan</h6>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <p>"Excellent service and support. Highly recommend for anyone seeking visa assistance."</p>
                        <h6>- Ahmed Ali</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section id="team" class="py-5">
        <div class="container">
            <div class="section-title">
                <h2>Our Team</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-3 text-center team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member">
                    <h6>Jane Smith</h6>
                    <p>Visa Expert</p>
                </div>
                <div class="col-md-3 text-center team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member">
                    <h6>Ali Raza</h6>
                    <p>Consultant</p>
                </div>
                <div class="col-md-3 text-center team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member">
                    <h6>Maria Khan</h6>
                    <p>Documentation Officer</p>
                </div>
                <div class="col-md-3 text-center team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member">
                    <h6>David Lee</h6>
                    <p>Operations Manager</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog -->
    <section id="blog" class="py-5 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Blog</h2>
                <p>Latest news and updates about visa & immigration.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card card-shadow">
                        <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Blog 1">
                        <div class="card-body">
                            <h6>Tips for Student Visa 2025</h6>
                            <p>Read essential tips to ensure your student visa approval.</p>
                            <a href="#" class="text-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-shadow">
                        <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Blog 2">
                        <div class="card-body">
                            <h6>Top Work Visa Countries</h6>
                            <p>Discover the best countries offering work visas for professionals.</p>
                            <a href="#" class="text-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-shadow">
                        <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Blog 3">
                        <div class="card-body">
                            <h6>Immigration Process Simplified</h6>
                            <p>How to prepare your documents for smooth visa processing.</p>
                            <a href="#" class="text-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form with Google Map -->
    <section id="contact" class="py-5">
        <div class="container">
            <div class="section-title">
                <h2>Contact Us</h2>
                <p>Get in touch for a free consultation.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn gradient-btn">Send Message</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.902865738715!2d90.39137641543138!3d23.750903594199875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b85c1b0e6f49%3A0x9b12e1c45d5f5e8b!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1698407591234!5m2!1sen!2sbd"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5>Ayad Global Consulting</h5>
                    <p>Providing trusted visa & immigration services worldwide.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Info</h5>
                    <p>Email: info@ayadglobal.com</p>
                    <p>Phone: +880123456789</p>
                    <p>Address: Dhaka, Bangladesh</p>
                    <div>
                        <a href="#"><i class="fab fa-facebook fa-lg me-2"></i></a>
                        <a href="#"><i class="fab fa-twitter fa-lg me-2"></i></a>
                        <a href="#"><i class="fab fa-linkedin fa-lg me-2"></i></a>
                        <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4">
            <p class="text-center mb-0">&copy; 2025 Ayad Global Consulting. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>