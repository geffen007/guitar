<?php 
$title = "Registrati";
$libJS = '';
$scriptJS = '';
$scriptJS2 = '';


require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/partials/headers.php';
?>

<div class="container login">
  <div class="form">
    <h1>Registrati</h1>
    <form class="p-4" method="post" action="/guitar/php/register.php">
      <div class="mb-3">
        <label for="FormEmail" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" minlength="5" maxlength="20" required>
      </div>
      <div class="mb-3">
        <label for="FormPassword" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" minlength="5" maxlength="20" required>
      </div>
      <button type="submit" class="btn btn-light">Sign in</button>
    </form>
  </div>
</div>
  
<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/partials/footer.php';
?>