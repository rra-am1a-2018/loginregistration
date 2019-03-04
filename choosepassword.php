<div class="row">
  <div class="col-6">
    <form action="./index.php?content=choosepassword-script" method="post" >
      <div class="form-group">
        <label for="InputPassword1">Kies een wachtwoord:</label>
        <input type="password" class="form-control" id="InputPassword1" placeholder="wachtwoord" name="password">
      </div>
      <div class="form-group">
        <label for="InputPassword2">Voer het wachtwoord opnieuw in:</label>
        <input type="password" class="form-control" id="InputPassword2" placeholder="wachtwoord check" name="checkpassword">
      </div>
      <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="id">
      <button type="submit" class="btn btn-warning btn-lg btn-block">Sla op!</button>
    </form>
  </div>
  <div class="col-6">
    <img src="./img/hangslot.jpg" alt="Hangslot" class="rounded mx-auto d-block img-fluid" width="40%">
  </div>
</div>

