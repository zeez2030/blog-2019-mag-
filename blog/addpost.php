<?php include_once 'includes/header.php';
?>
    <form action="includes/addpost.inc.php" class="form-group container addpost-form" method="POST">
        <input type="text" name="author" class="form-control" placeholder="Author Name">
        <input type="text" name="title" class="form-control mt-3"  placeholder="title">
        <textarea rows="5" cols="50"  class="form-control mt-3" name="content" placeholder="Write your Dreams"></textarea>
        <input type="submit" class="btn btn-primary mt-5" name="submit">

    </form>



<?php include_once 'includes/footer.php'; ?>