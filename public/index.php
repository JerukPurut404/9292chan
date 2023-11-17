<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>9292Chan</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="menu--9292--header">
    <div class="menu--9292--header-item">
      <img src="https://9292.nl/static/images/logo.png" class="menu--9292--header-icon" >
      <ul class="menu--9292--header-menus">
        <li class="menu--9292--header-menu">
          <a href="https://github.com/JerukPurut404/9292chan">
            <!-- github icon by Free Icons (https://free-icons.github.io/free-icons/) -->
            <svg class="github--icon" xmlns="http://www.w3.org/2000/svg" height="3em" fill="currentColor" viewBox="0 0 496 484">
              <path d="M 166 389 Q 165 393 161 393 Q 155 393 155 389 Q 156 386 160 386 Q 165 386 166 389 L 166 389 Z M 135 385 Q 134 388 139 390 Q 144 391 145 388 Q 146 384 141 383 Q 136 382 135 385 L 135 385 Z M 179 383 Q 174 384 174 388 Q 175 391 180 391 Q 185 389 185 386 Q 184 383 179 383 L 179 383 Z M 245 0 Q 138 2 70 70 L 70 70 Q 2 138 0 244 Q 1 329 47 393 Q 93 457 170 483 Q 188 484 187 471 Q 187 467 187 456 Q 187 433 187 410 Q 185 410 168 412 Q 150 413 130 408 Q 110 402 102 380 Q 102 378 94 364 Q 86 351 74 343 Q 72 342 66 335 Q 59 329 76 328 Q 77 327 90 332 Q 103 336 114 354 Q 132 381 153 381 Q 175 381 187 375 Q 191 351 203 341 Q 159 339 126 319 Q 93 300 91 230 Q 91 210 97 197 Q 102 184 114 172 Q 112 166 110 148 Q 108 130 117 104 Q 135 101 159 115 Q 184 128 186 131 Q 186 131 186 131 Q 216 122 249 122 Q 281 122 312 131 Q 312 130 325 122 Q 337 114 353 108 Q 369 101 381 104 Q 390 130 388 148 Q 386 166 383 172 Q 395 184 402 197 Q 409 210 409 230 Q 408 278 392 301 Q 375 323 349 331 Q 323 339 294 341 Q 310 352 311 387 Q 311 424 311 453 Q 311 466 311 471 Q 310 484 328 483 Q 404 457 450 393 Q 495 329 496 244 Q 495 174 462 119 Q 428 64 372 32 Q 315 1 245 0 L 245 0 Z M 97 345 Q 95 347 98 350 Q 101 353 103 351 Q 105 349 102 346 Q 100 343 97 345 L 97 345 Z M 86 337 Q 86 339 89 341 Q 92 342 93 340 Q 94 338 91 336 Q 88 335 86 337 L 86 337 Z M 119 372 Q 117 375 120 379 Q 124 382 127 380 Q 128 377 125 373 Q 121 370 119 372 L 119 372 Z M 107 358 Q 105 360 107 364 Q 110 367 113 366 Q 115 364 113 360 Q 110 356 107 358 L 107 358 Z" />
            </svg>
          </a>
        </li>
    </div>
  </header>
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
