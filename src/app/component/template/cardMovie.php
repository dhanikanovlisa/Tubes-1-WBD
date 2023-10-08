<?php
require_once DIRECTORY . '/../middlewares/AuthenticationMiddleware.php';
$authMiddleware = new AuthenticationMiddleware();

$link = "/login"; // Default link

if ($authMiddleware->isAuthenticated()) {
    $link = "watch/{$film['film_id']}";
} elseif ($authMiddleware->isAdmin()) {
    $link = "detail-film/{$film['film_id']}";
}

?>

<a href="<?php echo $link; ?>">
    <div class="card">
        <img src="storage/poster/<?php echo htmlspecialchars($film['film_poster']); ?>" alt="Film Poster" />
    </div>
</a>
