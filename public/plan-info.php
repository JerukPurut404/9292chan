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
          <!-- github icon by Free Icons (https://free-icons.github.io/free-icons/) -->
          <svg class="github--icon" xmlns="http://www.w3.org/2000/svg" height="3em" fill="currentColor" viewBox="0 0 496 484">
            <path d="M 166 389 Q 165 393 161 393 Q 155 393 155 389 Q 156 386 160 386 Q 165 386 166 389 L 166 389 Z M 135 385 Q 134 388 139 390 Q 144 391 145 388 Q 146 384 141 383 Q 136 382 135 385 L 135 385 Z M 179 383 Q 174 384 174 388 Q 175 391 180 391 Q 185 389 185 386 Q 184 383 179 383 L 179 383 Z M 245 0 Q 138 2 70 70 L 70 70 Q 2 138 0 244 Q 1 329 47 393 Q 93 457 170 483 Q 188 484 187 471 Q 187 467 187 456 Q 187 433 187 410 Q 185 410 168 412 Q 150 413 130 408 Q 110 402 102 380 Q 102 378 94 364 Q 86 351 74 343 Q 72 342 66 335 Q 59 329 76 328 Q 77 327 90 332 Q 103 336 114 354 Q 132 381 153 381 Q 175 381 187 375 Q 191 351 203 341 Q 159 339 126 319 Q 93 300 91 230 Q 91 210 97 197 Q 102 184 114 172 Q 112 166 110 148 Q 108 130 117 104 Q 135 101 159 115 Q 184 128 186 131 Q 186 131 186 131 Q 216 122 249 122 Q 281 122 312 131 Q 312 130 325 122 Q 337 114 353 108 Q 369 101 381 104 Q 390 130 388 148 Q 386 166 383 172 Q 395 184 402 197 Q 409 210 409 230 Q 408 278 392 301 Q 375 323 349 331 Q 323 339 294 341 Q 310 352 311 387 Q 311 424 311 453 Q 311 466 311 471 Q 310 484 328 483 Q 404 457 450 393 Q 495 329 496 244 Q 495 174 462 119 Q 428 64 372 32 Q 315 1 245 0 L 245 0 Z M 97 345 Q 95 347 98 350 Q 101 353 103 351 Q 105 349 102 346 Q 100 343 97 345 L 97 345 Z M 86 337 Q 86 339 89 341 Q 92 342 93 340 Q 94 338 91 336 Q 88 335 86 337 L 86 337 Z M 119 372 Q 117 375 120 379 Q 124 382 127 380 Q 128 377 125 373 Q 121 370 119 372 L 119 372 Z M 107 358 Q 105 360 107 364 Q 110 367 113 366 Q 115 364 113 360 Q 110 356 107 358 L 107 358 Z" />
          </svg>
        </li>
    </div>
  </header>
  <div class="plan-info">
    <h1 class="plan-info-title">Planners Information</h1>
    <h2>Plans from: <?php echo $fromLocation ?> to: <?php echo $toLocation ?> </h2>
    <ul>
      <?php foreach ($resp['journeys'] as $index => $journey): ?>
        <li class="plan--list">
          <div class="journey--section">
            <h3 class="journey-title">Option <?php echo $index + 1; ?></h3>
            <p class="departure-time">Departure Time: <?php echo $journeyDepartTime[$index]; ?></p>
            <p class="arrival-time">Arrival Time: <?php echo $journeyArrivalTime[$index]; ?></p>
            <p class="duration">Duration: <?php echo $journeyMinuteDuration[$index]; ?> minutes</p>
            <h4 class="legs-title">Step:</h4>
          </div>
          <ul>
            <?php foreach ($journeyLegs[$index] as $legIndex => $leg): ?>
              <li class="legs--list">
                <div class="legs--section">
                  <h5 class="leg-title">Step <?php echo $legIndex + 1; ?></h5>
                  <p class="leg-departure-time"><?php if ($legIndex == 0) echo "Departure Time: "; ?><?php echo $leg['departureTime']; ?></p>
                  <p class="leg-arrival-time"><?php if ($legIndex == 0) echo "Arrival Time: "; ?><?php echo $leg['arrivalTime']; ?></p>
                  <p class="leg-duration"><?php if ($legIndex == 0) echo "Duration: "; ?><?php echo $leg['duration']; ?> minutes</p>
                  <p class="leg-from"><?php if ($legIndex == 0) echo "From: "; ?><?php echo $leg['from']; ?></p>
                  <p class="leg-to"><?php if ($legIndex == 0) echo "To: "; ?><?php echo $leg['to']; ?></p>
                  <p class="leg-modality-group"><?php if ($legIndex == 0) echo "Modality Group: "; ?><?php echo $leg['modalityGroup']; ?></p>
                  <p class="leg-modality-code"><?php if ($legIndex == 0) echo "Modality Description: "; ?><?php echo $leg['modalityDescription']; ?></p>
                  <p class="leg-service"><?php if ($legIndex == 0) echo "Service Number: "; ?><?php echo $leg['service']; ?></p>
                  <p class="leg-platforms"><?php if ($legIndex == 0) echo "Platforms: "; ?><?php echo $leg['platform']; ?></p>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>