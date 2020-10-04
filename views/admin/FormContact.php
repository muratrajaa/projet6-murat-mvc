<?php
ob_start();
?>
<form>
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" readonly="" class="form-control-plaintext" name="email" id="email" value="email@example.com">
      </div>
    </div>
    <div class="form-group">
      <label for="nom">Nom*</label>
      <input type="text" class="form-control" name="nom" id="nom" aria-describedby="emailHelp" placeholder="Entrer Nom">
    </div>
    <div class="form-group">
      <label for="prenom">Prenom*</label>
      <input type="text" class="form-control" name="prenom"  id="exampleInputPassword1" placeholder="Entrer Prenom">
    </div>
 
    <div class="form-group">
      <label for="exampleTextarea">Example textarea</label>
      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="message">Message</label>
      <textarea class="form-control" name="message" id="message" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file" class="form-control-file" name="exampleInputFile" id="exampleInputFile" aria-describedby="fileHelp">
    </div>
    </fieldset>
   
</form>

<?php 
$content = ob_get_clean();
require_once('./views/gabarit.php');
?>
</div>