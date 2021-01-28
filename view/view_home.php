<main>
    <?php if (isset($_GET['round'])) : ?>
        <?php if ($_GET['round']) : ?>
            <div class='general'>
            <?php while ($round == 'start') : ?>
                <div class='round'>
                <p>Points de vie de <?=$player1->persoName." : ".$player1->getHealthPoints()?></p>
                <p>Points de vie de <?=$player2->persoName." : ".$player2->getHealthPoints()?></p>
                <?php
                if ($roundForPlayer == 1) {
                    $player1->action($player2);
                    $roundForPlayer = 2;
                }else{
                    $player2->action($player1);
                    $roundForPlayer = 1;
                }
                ?>
                <?php if ($player1->getHealthPoints() <= 0) :?>
                    <?php $round = 'Finish';?>
                    <br><p><?=$player2->persoName?> Gagne !</p><br>
                <?php elseif ($player2->getHealthPoints() <= 0 ) :?>
                    <?php $round = 'Finish';?>
                    <br><p><?=$player1->persoName?> Gagne !</p><br>
                <?php endif;?>
                <br>
                </div>
            <?php endwhile; ?>
            <div class='round'>
            <p>Points de vie de <?=$player1->persoName." : ".$player1->getHealthPoints()?></p>
            <p>Points de vie de <?=$player2->persoName." : ".$player2->getHealthPoints()?></p>
            </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</main>
