<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./styles.css?version=51" />

    <title>Dice Game</title>
  </head>
  <body id="front">
    <main>
      <header class="mb-5">
        <h1>Random Number Generator: <br>  Dice Game</h1>
        <p class="text-info">Let's Roll Some Dice!</p>
      </header>
      <?php 
      error_reporting(E_ALL ^ E_WARNING); //catches warnings about empty variables

      function getCount() : int //gets count from the page returns 0 if the variable is empty
      {
        $dcount = $_REQUEST['dice-count'];
        if(empty($dcount))
          {
            $dcount = 0; 
            return $dcount;
          }
          else
          { 
            
            return $dcount;
          }

      }
      ?>
      <section>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>">
          <div class="mb-3">
            <label for="dice-count" class="form-label">How many dice?</label>
            <input type="number"
              name="dice-count"
              id="dice-count"
              title="dice count"
              value ="<?php echo getCount();   ?>"
              class="form-select"
            ></input>
          </div>
          <div class="mb-3">
            <label for="dice-type" class="form-label">Dice Type?</label>
            <select name="dice-type" id="dice-type" title="dice type" class="form-select">
              <option value="4">D4</option>
              <option selected value="6">D6</option>
              <option value="8">D8</option>
              <option value="10">D10</option>
              <option value="12">D12</option>
              <option value="20">D20</option>
            </select>
            <br>

          </div>
          <input type="submit" id="submit" class="btn btn-primary" value="ROLL"></input>
        </form>
      </section>

    <?php include 'dice.php'; //testing of include and making a class
          $dice  = new dice(); // new dice
          $dice->setSides($_POST['dice-type']); //sets the sides of a dice
          $dsides = $dice->getSides(); // gets the number of sides
          function RollDice(int $sides = 6) : int //returns a random number; if it didn't receive any variable set it to 6 sides
          {
            return rand(1, $sides);
          }
    ?>

    <section id="results" class="results">
      <!-- for loop, creates a div every loop with a random number in it -->
        <?php for($x = 1; $x <= getCount(); $x++){ ?>
             <div class="die"><?php echo RollDice($dsides); ?></div>
            
          <?php } ?>
      </section>
    </main>
  </body>
</html>