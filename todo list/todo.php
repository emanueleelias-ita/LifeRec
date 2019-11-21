
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="todo.css">
    <title>LifeRec</title>
</head>
<body>
    <header>
        <h1>LifeRec</h1>
        <h3>Promemoria per smemorati</h1>
          <br>
        <hr>
    </header>
    <div id="corpo">
      <div id="menu">
          <p id="data"></p>
          <script>
              n= new Date();
              g = n.getDate();
              m= n.getMonth() + 1;
              a= n.getFullYear();
          document.getElementById("data").innerHTML = "Data di oggi: " + g + " / "+ m + " / " + a;
          </script>
           <form action="insert.php" method="post" id="form">
           
               <label for="titolo">Nome promemoria:</label>
               <br>
               <input type="text" id="titolo" name="titolo" maxlength="18" required>
               <br>
               <label for="contenuto">Contenuto:</label>

               <br>
               <textarea id="contenuto" name="contenuto" maxlength="35" rows="2" style="resize: none;" required></textarea>
               <br>

               <label for="date">Per quando:</label>
  <br>
               <input type="date" id="date" name="date" required>
               <br>
               <input type="submit" value="+" id="button">




              </form>

      </div>
      <div id="lista">
        <h2>I tuoi promemoria</h2>
        <br>
        <?php require "connect.php"; ?>
      <div id="responsive">
      <table>
      <?php if($count == 0): ?>
      <tr><td>Non hai promemoria</td></tr>
      <?php endif; ?>

      <?php while ($row = mysqli_fetch_array($result)) { 
        $date =$row['date']; 
        $date=date("d-m-Y", strtotime($date));
        $stato = $row['stato'];
       ?>
    

        <?php if( $stato == 0) : ?>
        <tr><td id="messaggio">
    <?php 
echo "<b>" . $row['titolo'] . "</b> <br>" . $row['contenuto'] . " <i>" . $date . "</i>"; 
      ?></td>
    <td><a href="insert.php?del_task=<?php echo $row['id']; ?>" id="completato" class="completato">&#10004;</a></td>
        </tr>
        <?php else : ?>
 <tr><td style="  text-decoration: line-through;" id="messaggio"><?php 
echo "<b>" . $row['titolo'] . "</b> <br>" . $row['contenuto'] . " <i>" . $date . "</i>"; 
      ?></td><td><a href="insert.php?cancella=<?php echo $row['id']; ?>" id="cancella" class="cancella">canc</a></td></tr>
    <?php endif; ?>
           <?php } ?>
    </table>
      </div>

      </div>
    
    </div>

    <footer>
<h1>Made by Emanuele Elias</h1>
<h3>Contact me <a href="mailto:emanueleelias@icloud.com">HERE</a></h3>
    </footer>

</body>
</html>
