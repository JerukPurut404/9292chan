<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>9292Chan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="9292--header">
    <div class="9292--header-item">
      <img class="9292--header-icon">
      <ul class="9292--header-menus">
        <li class="9292--header-menu">
          <a class="9292--header-menu-link" href="www.github.com">Github Page</a>
        </li>
  <nav class="menu">
    <div class="menu--item">
      <h1 class="menu--title">Waar wil je heen?</h1>
      <form class="menu--form" name="form" action="connect.php" method="get">

      <div class="menu--van-naar">
        <label for="van" class="menu--label-van">Van:</label>
        <input id="van" type="text" name="fromText" placeholder="Van: Adres, station, postcode, etc." class="menu--label-van-input" autocomplete="off" data-errormessage="Van is verplicht" lang="nl-NL" data-ref-url-input-id="from-url" data-location-type="AllLocationTypes" maxlength="100" required/>
        <label for="naar" class="menu--label-naar">Naar:</label>
        <input id="naar" type="text" name="toText" placeholder="Naar: Adres, station, postcode, etc." class="menu--label-naar-input" autocomplete="off" data-errormessage="Naar is verplicht" lang="nl-NL" data-ref-url-input-id="to-url" data-location-type="AllLocationTypes" maxlength="100" required/> 
      </div>

      <div class="menu--datum-tijd">
        <fieldset>
          <legend class="menu--label-datum">Datum</legend>
          <input class="menu--label-datum-input" type="text" data-type="date" id="date" name="date" min="" max="" placeholder="dd-mm-yyyy" value="<?php echo date('d-m-Y'); ?>" required/>
        </fieldset>

        <fieldset>
          <legend class="menu--label-tijd">Tijd</legend>
          <input class="menu--label-tijd-input" type="text" data-type="time" id="time" name="time" placeholder="HH:mm" value="<?php echo date('H:i'); ?>" pattern="([01]?[0-9]{1}|2[0-3]{1}):[0-5]{1}[0-9]{1}" required/>
        </fieldset>
      </div>
      

        <div class="menu--label-buttons">
          <input type="radio" name="searchType" value="Departure" id="vertrek" checked>
          <label for="vertrek" class="menu--label-vertrek">Vertrek</label>
          <input type="radio" name="searchType" value="Arrival" id="aankomst">
          <label for="aankomst" class="menu--label-aankomst">Aankomst</label>
        </div>
        
        <button type="submit" class="menu--label-plan-btn" value="Plan mijn reis">Plan mijn reis</button> 
      </form>
    </div>
  </nav>
</body>
</html>
