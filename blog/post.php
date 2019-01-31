<?php
include_once 'includes/header.php';
include 'config/config.php';
include 'classes/database.php';
include 'helpers/format_helper.php';
$id = $_GET['id'];
$db = new Database;
$query = "SELECT * from posts where id=" . $id . ";";
$post = $db->select($query);
$row = $post->fetch_assoc();
$comment = $_POST['comment'];
if ($comment) {
    $query = "INSERT INTO comments(post_id , content) VALUES
    (" . $id . ",'$comment');";
    $db->insert($query);
}
$query = "SELECT * from comments where post_id=" . $id . " ORDER BY date DESC;";
$comments = $db->select($query);


?>


 <div id=" carouselExampleSlidesOnly " class=" carousel slide noslidecarousel post-carousel " data-ride=" carousel ">
        <div class=" carousel-inner ">
            <div class=" carousel-item active ">
                <img src=" <?php echo $row['picture']; ?>" class="d-block w-100" alt="...">
                <div class="post-carousel-caption carousel-caption d-none d-md-block">
                    <h1><?php echo $row['title']; ?></h1>
                    
                </div>
            </div>

        </div>
    </div>

    <section class="d-flex body container">
        <aside class="side-bar">
                <p class="post-author"><?php echo $row['author']; ?></p>
                <p class="post-date"><?php echo formatDate($row['date']); ?></p>
                <p class="share-post text-muted">Share this article</p>
                <ul class="d-flex social-mediap">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
        </aside>
        <div class="content">
            <p><?php echo $row['body']; ?></p>
        </div>


    </section>
    
    <section class="container comments" >
        <div class="comment">
            <h1></h1>
            <hr class="first-hr">
            <h3>comments</h3>
            <hr class="second-hr">
        </div>
        
    </section>
    <section class="comment-area container"> 
        <form action="post.php?id=<?php echo $id; ?>" method="POST"> 
            <textarea name="comment" id="" cols="155" rows="10" placeholder="Write your comment"></textarea>
            <input type="submit"  class ="button" name='submit' placeholder="Add comment">
        </form>  
    <?php if ($comments) : ?>
    <?php while ($comment = $comments->fetch_assoc()) : ?>
        <div class="view-comment"> 
            <div class="upper-info d-flex"> <h4>zeez</h4> <span><?php echo $comment['date']; ?></span></div>
            <p><?php echo $comment['content']; ?></p>
        </div>
<?php endwhile; ?>
<?php endif; ?>
    </section>
   


<?php include_once 'includes/footer.php'; ?>