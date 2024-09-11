<?php
    require_once "header.php";
    // require_once "database.php";
    // require_once "productClass.php";
    require_once "navbar.php";
?>
    <style>
        .rating {
            color: #ffd700;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Navbar -->

<!-- Farmers List Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Farmers Available for Work</h2>
    <div class="row">
        <!-- Farmer Card -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Farmer Image">
                <div class="card-body">
                    <h5 class="card-title">John Doe</h5>
                    <p class="card-text">Experienced farmer specializing in organic farming and sustainable practices.</p>
                    <div class="rating">
                        <span data-rating="1">&#9733;</span>
                        <span data-rating="2">&#9733;</span>
                        <span data-rating="3">&#9733;</span>
                        <span data-rating="4">&#9733;</span>
                        <span data-rating="5">&#9733;</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Another Farmer Card -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Farmer Image">
                <div class="card-body">
                    <h5 class="card-title">Jane Smith</h5>
                    <p class="card-text">Specializes in crop management and has extensive knowledge in pest control.</p>
                    <div class="rating">
                        <span data-rating="1">&#9733;</span>
                        <span data-rating="2">&#9733;</span>
                        <span data-rating="3">&#9733;</span>
                        <span data-rating="4">&#9733;</span>
                        <span data-rating="5">&#9733;</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Another Farmer Card -->
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Farmer Image">
                <div class="card-body">
                    <h5 class="card-title">Robert Johnson</h5>
                    <p class="card-text">Expert in greenhouse farming and irrigation systems.</p>
                    <div class="rating">
                        <span data-rating="1">&#9733;</span>
                        <span data-rating="2">&#9733;</span>
                        <span data-rating="3">&#9733;</span>
                        <span data-rating="4">&#9733;</span>
                        <span data-rating="5">&#9733;</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="app.js"></script>
<script>
// JavaScript to handle rating
document.querySelectorAll('.rating span').forEach(star => {
    star.addEventListener('click', function() {
        const rating = this.getAttribute('data-rating');
        alert(`You rated this farmer ${rating} stars!`);
        
        // Clear existing ratings
        this.parentNode.querySelectorAll('span').forEach(s => s.style.color = '#ffd700');

        // Highlight selected ratings
        for (let i = 0; i < rating; i++) {
            this.parentNode.children[i].style.color = '#ff8000';
        }
    });
});
</script>
<?php
require_once "footer.php";
?>
</html>
