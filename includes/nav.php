<?php
session_start();
$role = $_SESSION['role'];

$navItems = [
  ['label' => 'Card List', 'url' => '/card-list.php', 'roles'=> ['Customer', 'Admin']],
  ['label' => 'Card Add', 'url' => '/card-add.php', 'roles'=> ['Admin']],
  ['label' => 'Customer Profile', 'url' => '/customer-profile.php', 'roles'=> ['Customer']],
  ['label' => 'Log Out', 'url' => '/logout.php', 'roles'=> ['Customer', 'Admin']]

];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <ul>
    <?php foreach($navItems as $navItem): ?>
      <?php if (in_array($role, $navItem['roles'], true)): ?>
      <li>
      <a href="<?=htmlspecialchars($navItem['url']) ?>">
        <?=htmlspecialchars($navItem['label']) ?> </a>
    </li>
    <?php endif; ?>
    <?php endforeach; ?>
  </ul>
</nav>
