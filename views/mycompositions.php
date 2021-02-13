<?php 
$title = "Mie Composizioni";
$libJS = '<script src="http://code.createjs.com/createjs-2013.09.25.min.js"></script>';
$scriptJS = '<script src=/APP2/js/guitar.js></script>';
$scriptJS2 = '';

require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/partials/headers.php';
?>

<div class="container px-0">
<h1>Le tue composizioni</h1>
<table class="table table-dark table-striped mx-0">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Tablature</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody >
    <?php 
    if (!empty(mycompositions())){
      foreach( mycompositions() as $comp) { ?>
        <tr>
          <td><?php echo $comp['nome'] ?></td>
          <td><span id="<?php echo $comp['id']?>"><?php echo $comp['composizione'] ?></span></td>
          <td>
            <a href="/APP2/php/delete.php?id=<?php echo $comp['id']?>"><button class="btn btn-danger">CANC</button></a>
            <button class="play btn btn-success" compid="<?php echo $comp['id']?>">Play</button>
          </td>
        </tr>
      <?php  
      }
    } ?>
  </tbody>
</table>

</div> 

<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/APP2/partials/footer.php';
?>