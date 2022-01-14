<form action="index.php" method="POST">

  <input type="hidden" name="step" value="<?php echo $step+1; ?>"><br>
   <input type="hidden" name="last_q_type" value="<?php echo $key; ?>"><br>


  <input type="submit" name='answer' value="Polanski">
  <input type="submit" name='answer' value="Copolla">
  <input type="submit" name='answer' value="Spielberg">
  <input type="submit" name='answer' value="Kim ki Duk">

</form>

