<?php 
include_once 'includes/header.php';
include 'config/config.php';
include 'classes/database.php';
include 'helpers/format_helper.php';
$id = $_GET['id'];

$db = new Database;
$query = "SELECT * from posts where category= $id order by id desc;";
$posts = $db->select($query);
?>
<?php if ($posts) : ?>
<section class="container show-by-cat-page">
        <div class="row first-row">
            <?php 

            while ($rows = $posts->fetch_assoc()) :
            ?>
            <div class="col">
                <div class="card-1">
                    <img class="" src='<?php echo $rows['picture']; ?>' alt="Card image cap">
                    <?php if ($id == 1) : ?>
                    <span class="cat-type-1"><i class="fas fa-newspaper"></i></span>
                    <?php elseif ($id == 2) : ?>
                    <span class="cat-type-2"><i class="fas fa-map-marker-alt"></i></span>
                     <?php elseif ($id == 3) : ?>
                    <span class="cat-type-3"><i class="fab fa-leanpub"></i></span>
                    <?php else : ?>
                    <span class="cat-type-4"><i class="fab fa-discourse"></i></span>

            <?php endif; ?>
                    <p class="editor"><?php echo $rows['author']; ?></p>
                    <p class="text-muted date"><?php echo formatDate($rows['date']); ?></p>
                    <p class="title"><?php echo $rows['title']; ?></p>
                    <a class="read " href="post.php?id=<?php echo urlencode($rows['id']); ?>">ReadMore </a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
            <?php else : ?>
            <h1>Ops no content in this category </h1>
            <?php endif; ?>



<?php include_once 'includes/footer.php'; ?>