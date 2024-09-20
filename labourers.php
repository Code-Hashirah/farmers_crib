<?php
$title = "Hire Page";
require_once "header.php";
require_once "database.php"; // Database connection
require_once "navbar.php";
require_once "isAuth.php"; // Ensure user is authenticated

// Create an instance of the Database class and get the connection
$database = new Database();
$db = $database->getConnection(); // Retrieve the database connection

// Fetch labourers from the database
$query = "
    SELECT u.id, u.name, u.phone, u.image, IFNULL(AVG(r.rating), 0) AS avg_rating
    FROM users u
    LEFT JOIN farmer_ratings r ON u.id = r.farmer_id
    WHERE u.role = 'Labourer'
    GROUP BY u.id
";

// Run the query and check for errors
$result = $db->query($query);
if (!$result) {
    die("Database query failed: " . $db->error);
}

?>

<style>
    .rating {
        color: #ffd700;
        cursor: pointer;
    }
</style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Labourers Available for Work</h2>
    <div class="row">
        <?php while ($labourer = $result->fetch_assoc()): ?>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="<?= htmlspecialchars($labourer['image']) ?>" class="card-img-top" alt="Labourer Image">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($labourer['name']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($labourer['phone']) ?></p>
                    <p><strong>Average Rating: <span id="avg-rating-<?= $labourer['id'] ?>"><?= round($labourer['avg_rating'], 1) ?></span></strong></p>
                    <div class="rating" data-labourer-id="<?= $labourer['id'] ?>">
                        <span data-rating="1">&#9733;</span>
                        <span data-rating="2">&#9733;</span>
                        <span data-rating="3">&#9733;</span>
                        <span data-rating="4">&#9733;</span>
                        <span data-rating="5">&#9733;</span>
                    </div>
                </div>
                <div>
                     <a  class="text-decoration-none btn btn-outline-primary" href=" <?php echo "https://wa.me/+234".$labourer['phone'];?>">
                      Hire
                    
                    </a></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Use event delegation for better performance
    document.querySelectorAll('.rating').forEach(ratingDiv => {
        ratingDiv.addEventListener('click', function(e) {
            if (e.target.tagName === 'SPAN') {
                const rating = e.target.getAttribute('data-rating');
                const labourerId = this.getAttribute('data-labourer-id');

                // Send rating to the server via AJAX
                const formData = new FormData();
                formData.append('labourer_id', labourerId);
                formData.append('rating', rating);

                fetch('rate_labourer.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the average rating displayed on the page
                        document.getElementById(`avg-rating-${labourerId}`).innerText = data.new_average;
                        alert(`You rated this labourer ${rating} stars!`);
                    } else {
                        alert('Error submitting rating. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

                // Highlight selected ratings
                this.querySelectorAll('span').forEach(s => s.style.color = '#ffd700');
                for (let i = 0; i < rating; i++) {
                    this.children[i].style.color = '#ff8000';
                }
            }
        });
    });
});
</script>

<?php
require_once "footer.php";
?>
</html>
