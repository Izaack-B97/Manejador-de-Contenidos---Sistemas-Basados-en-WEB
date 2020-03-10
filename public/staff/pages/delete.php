<?php 

require_once('../../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id'];

$page  = find_page_by_id($id);

if (is_post_request()) {
    $result = delete_page($id);
    redirect_to(url_for('/staff/pages/index.php'));
} else {
    $subject = find_subject_by_id($id);
}

?>

<?php $page_title = "Delect Page"; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>
    <form action="" method="post">
        <div class="page delete">
            <h1>Delete Page</h1>
            <p>Are you sure want to delete this page <?php echo $id ;?> ?</p>
            
            <?php echo $subject['menu_name']; ?>
            <div id="operations">
                <input type="submit" value="Delete Subject">
            </div>
        </div>
    </form>
</div>
