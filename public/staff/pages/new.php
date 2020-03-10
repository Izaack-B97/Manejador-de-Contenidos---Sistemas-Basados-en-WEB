<?php

require_once('../../../private/initialize.php');

$page_set = find_all_pages();
$page_count = mysqli_num_rows($page_set);
mysqli_free_result($page_set);

$subject_set = find_all_subjects();
$subject_count = mysqli_num_rows($subject_set);

$page = [];
$page['position'] = $page_count;

$subject = [];
$subject['position'] = $subject_count;


?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page new">
    <h1>Create Page</h1>

    <form action="<?php echo url_for('/staff/pages/create.php'); ?>" method="post">
      <dl>
        <dt>Subject ID</dt>
        <dd>
          <select name="subject_id">
            <?php 
              for ($i=1; $i <= $subject_count ; $i++) { 
                echo "<option value=\"{$i}\"";
                if ($subject['position'] == $i) {
                    echo " selected";
                }
                echo ">{$i}</option>";
              }
            ?>
          </select>
        </dd>
      </dl>     
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php 
              for ($i=1; $i <= $page_count ; $i++) { 
                echo "<option value=\"{$i}\"";
                if ($page['position'] == $i) {
                    echo " selected";
                }
                echo ">{$i}</option>";
              }
            ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><input type="text" name="content" value=""></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
