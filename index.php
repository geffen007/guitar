<?php
$title = "homepage";
$libJS = '<script src="http://code.createjs.com/createjs-2013.09.25.min.js"></script>';
$scriptJS = '<script src=js/guitar.js></script>';
$scriptJS2 = '';

require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/partials/headers.php';
?>

<div class="container main">
  <div class="guitar mb-4">

  </div>
  <?php //if(isLogged()){ ?>
    <div class="title">
      <label for="name">Titolo Composizione</label>
      <input type="text" name="name" id="nameC" required minlength="4" maxlength="30">
    </div>
  <?php //} ?>
  <div class="tab mb-4 mx-0">
    <textarea name="tab" id="tab"  cols="147" rows="6" readonly></textarea>
  </div>
  <div class="button" >
  <?php //if(isLogged()){ ?>
    <button class="btn btn-light REGISTRA" id="rec">Avvia Registrazione</button>
    <button class="btn btn-light" id="saveCom">SALVA</button>
  <?php //} ?>
    <button class="btn btn-light" id="refresh">AZZERA</button>
  </div>
</div>

<div class="template">
  <div class="string">
    <div class="chord">

    </div>
  </div>
  <div id="fret">
    <div class="fret"></div>
  </div>

</div>

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/partials/footer.php';
?>
