<!-- Don't add admin/ in link as it cannot look from outside directory -->
<?php require "section/header.php"; ?>

<!-- The $this keyword refers to the current object, and is only available inside methods. -->
<?php $this->load->view('admin/pages/'.$page.'.php'); ?>

<?php require "section/footer.php"; ?>