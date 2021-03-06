<?php
session_start();
require 'hangedman.php';
$_SESSION['words_to_guess_dashes'] = implode(" ", $_SESSION['wordToGuessArray']);
$_SESSION['total_life_dashes'] = implode(" ", $_SESSION['letterUsed']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Hangman</title>
</head>

<body class="bg-light">

    <div class="bodyh">

        <?php require 'partials/header.php' ?>


        <div class="game-container">
            <form class='hangman' id="gameData" action="captureHangman.php" method="post">
                <div class="">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Game Progress</span>
                    </h4>
                    <div id="hangmanPhoto">
                        <?php
                        $hangman_photo = $hang[$_SESSION['letterUsedCount']];
                        echo $hangman_photo;
                        ?>
                    </div>


                </div>
                <div class="remaining-guesses">
                    <strong>Remaining Guesses: <?php echo $_SESSION['totalLife'] - $_SESSION['letterUsedCount']; ?></strong>
                </div>
                <div>
                    <label>Word to guess (Total Letters: <?php echo $_SESSION['wordToGuessLetterCount']  ?>)</label>
                    <div class="list-group-item" id="wordToGuess"><?php echo $_SESSION['words_to_guess_dashes']; ?></div>
                </div>
                <div>
                    <label>Letters guessed</label>
                    <div class="list-group-item" id="letterUsed"><?php echo $_SESSION['total_life_dashes']; ?></div>
                </div>
                <div class="guess-label">
                    <label>Enter your guess</label><br />
                </div>
                <div class="guess">
                    <input class='guess' id="letterInput" name="letterInput" value="" autofocus>
                </div>
                <div class="result" id="result"><?php echo $_SESSION['message']; ?></div>
                <div>
                    <?php if (!$_SESSION['gameOver']) : ?>
                        <input type="submit" value="Submit">
                    <?php endif; ?>
                    <?php if ($_SESSION['gameOver']) : ?>
                        <div class="play-again">

                            <a href="setup.php">Play Again?</a>
                        </div>
                        <div class="scores">
                            <a href="scores.php">View top 10 scores for words of same length</a>
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</body>

</html>