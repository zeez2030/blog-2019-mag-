<?php 
include_once 'includes/header.php';
include 'config/config.php';
include 'classes/database.php';
include 'helpers/format_helper.php';

$db = new Database;
$query = "SELECT * from posts;";
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
            <li class="people"><a href="#"><i class="fas fa-users"></i> People</a></li>
            <li class="places"><a href="#"><i class="fas fa-map-marker-alt"></i>places</a></li>
            <li class="eye"><a href="#"><i class="far fa-eye"></i>experince</a></li>
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
                    <p class="editor"><?php echo $row['author']; ?></p>
                    <p class="text-muted date"><?php echo formatDate($row['date']); ?></p>
                    <p class="title"><?php echo $row['title']; ?></p>
                    <a class="read " href="post.php?id=<?php echo urlencode($row['id']); ?>">ReadMore </a>
                </div>
            </div>
            <?php endwhile; ?>
            <!-- <div class="col">
                <div class="card-2">
                    <img class="" src="img/photo2.jpg" alt="Card image cap">
                    <p class="editor">Mohammed gamal</p>
                    <p class="text-muted date">January 23, 2019</p>
                    <p class="title">The wind mystery</p>
                </div>
            </div> -->
        </div>
        <div class="row first-row">
            <div class="col">
                <div class="card-2">
                    <img class="feather" src="img/photo2.jpg" alt="Card image cap">
                    <p class="editor">Mohammed gamal</p>
                    <p class="text-muted date">January 23, 2019</p>
                    <p class="title">The wind mystery</p>
                    <a href="#" class="read">ReadMore</a>
                </div>
            </div>
            <div class="col">
                <div class="card-1">
                    <img class="" src="img/photo2.jpg" alt="Card image cap">
                    <p class="editor">Mohammed gamal</p>
                    <p class="text-muted date">January 23, 2019</p>
                    <p class="title">The wind mystery</p>
                </div>
            </div>
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




<?php include_once 'includes/footer.php'; ?>