<?php 
include_once 'includes/header.php';
include 'config/config.php';
include 'classes/database.php';
include 'helpers/format_helper.php';

$db = new Database;
$query = "SELECT * from posts order by id desc;";
$posts = $db->select($query);
$counter = 1;

?>
<div class="mainpart">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">

                    <img src="img/photo1.jpg" class="d-block w-100" alt="...">
                    <div class="first-carousel-caption carousel-caption d-none d-md-block">
                        <h1>Eddison the third</h1>
                        <button>Read More</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/photo2.jpg" class="d-block w-100" alt="...">
                    <div class="first-carousel-caption carousel-caption d-none d-md-block">
                        <h1>Eddison the third</h1>
                        <button>Read More</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/photo3.jpg" class="d-block w-100" alt="...">
                    <div class="first-carousel-caption carousel-caption d-none d-md-block">
                        <h1>Eddison the third</h1>
                        <button>Read More</button>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <section class="container three-sections" id="bar">
        <ul class="d-flex justify-content-center">
            <li class="people"><a href="cat.php?id=1"><i class="fas fa-newspaper"></i> news</a></li>
            <li class="places"><a href="cat.php?id=2"><i class="fas fa-map-marker-alt"></i>events</a></li>
            <li class="eye"><a href="cat.php?id=3"><i class="fab fa-leanpub"></i>Tutorials</a></li>
            <li class="misc"><a href="cat.php?id=4"><i class="fab fa-discourse"></i>Misc</a></li>
        </ul>
    </section>
<?php
if ($posts) : ?>
    
    <section class="container">
        <div class="row first-row">
            <?php while ($row = $posts->fetch_assoc()) :
            ?>
            <div class="col">
                <div class="card-1">
                    <img class="" src='<?php echo $row['picture']; ?>' alt="Card image cap">
                    <?php if ($row['category'] == 1) : ?>
                    <span class="cat-type-1"><i class="fas fa-newspaper"></i></span>
                    <?php elseif ($row['category'] == 2) : ?>
                    <span class="cat-type-2"><i class="fas fa-map-marker-alt"></i></span>
                     <?php elseif ($row['category'] == 3) : ?>
                    <span class="cat-type-3"><i class="fab fa-leanpub"></i></span>
                    <?php else : ?>
                    <span class="cat-type-4"><i class="fab fa-discourse"></i></span>

            <?php endif; ?>
                        
                    
                    <p class="editor"><?php echo $row['author']; ?></p>
                    <p class="text-muted date"><?php echo formatDate($row['date']); ?></p>
                    <p class="title"><?php echo $row['title']; ?></p>
                    <a class="read " href="post.php?id=<?php echo urlencode($row['id']); ?>">ReadMore </a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php else : ?>
<p>there are no posts</p>
    <?php endif; ?>


    <div id="carouselExampleSlidesOnly" class="carousel slide  noslidecarousel" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">

                <img src="img/photo4.jpg" class="d-block w-100" alt="...">
                <div class="second-carousel-caption carousel-caption d-none d-md-block">
                    <h1>City full of Bitches</h1>
                    <button>Read More</button>
                </div>
            </div>

        </div>
    </div>
 <section class="container show-by-cat">
     <h1>Most popular Articles</h1>
        <div class="row first-row">
            <?php 
            $db = new Database;
            $query = "SELECT * from posts order by view desc limit 4;";
            $postss = $db->select($query);
            while ($rows = $postss->fetch_assoc()) :
            ?>
            <div class="col">
                <div class="card-1">
                    <img class="" src='<?php echo $rows['picture']; ?>' alt="Card image cap">
                    <?php if ($rows['category'] == 1) : ?>
                    <span class="cat-type-1"><i class="fas fa-newspaper"></i></span>
                    <?php elseif ($rows['category'] == 2) : ?>
                    <span class="cat-type-2"><i class="fas fa-map-marker-alt"></i></span>
                     <?php elseif ($rows['category'] == 3) : ?>
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



<?php include_once 'includes/footer.php'; ?>