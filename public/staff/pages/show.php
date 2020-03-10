<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$page = find_page_by_id($id); // Regresa un array associativo
$subject = find_subject_by_id($page['subject_id']); // Este igual

?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page show">
    <!-- Page ID: <?php echo h($id); ?> -->
    <div class="attributes">
      <dl>
        <dt>ID/Subject</dt>
        <dd><?php echo $page['subject_id'] . ". " . $subject['menu_name']; ?></dd>
      </dl>
      <dl>
        <dt>Menu name</dt>
        <dd><?php echo h($page['menu_name']); ?></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd><?php echo h($page['position']); ?></dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd><?php echo $page['visible'] == '1' ? 'true' : 'false'; ?></dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><?php echo $page['content'] == NULL ? '-' : $page['content']; ?></dd>
      </dl>
    </div>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
