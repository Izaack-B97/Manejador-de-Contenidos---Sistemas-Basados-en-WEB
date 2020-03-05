<?php 

require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}

$id = $_GET['id'];

$subject  = find_subject_by_id($id);

if (is_post_request()) {
    $result = delete_subject($id);
    redirect_to(url_for('/staff/subjects/index.php'));
} else {
    $subject = find_subject_by_id($id);
}

?>

<?php $page_title = "Delect Subject"; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
    <form action="" method="post">
        <div class="subject delete">
            <h1>Delete Subject</h1>
            <p>Are you sure want to delete this subject <?php echo $id ;?> ?</p>
            
            <?php echo $subject['menu_name']; ?>
            <div id="operations">
                <input type="submit" value="Delete Subject">
            </div>
        </div>
    </form>
</div>
