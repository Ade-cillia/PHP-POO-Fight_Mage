<main>
    <?php if (isset($_GET['round'])) : ?>
        <?php if ($_GET['round']) : ?>
            <?php while ($round == 'start') : ?>
                <div class='round'>
                <p><span class="name"><?=$player1->persoName."</span> : ".$player1->getHealthPoints()?> PV</p>
                <p><span class="name"><?=$player2->persoName."</span> : ".$player2->getHealthPoints()?> PV</p>
                <?php
                if ($roundForPlayer == 1) {
                    $player1->action($player2);
                    $roundForPlayer = 2;
                }else{
                    $player2->action($player1);
                    $roundForPlayer = 1;
                } ?>
                <?php if ($player1->getHealthPoints() <= 0) :?>
                    <?php $round = 'Finish';?>
                    <br><p><span class="name"><?=$player2->persoName?></span> Gagne !</p><br>
                <?php elseif ($player2->getHealthPoints() <= 0 ) :?>
                    <?php $round = 'Finish';?>
                    <br><p><span class="name"><?=$player1->persoName?></span> Gagne !</p><br>
                <?php endif;?>
                <br>
                </div>
            <?php endwhile; ?>
            <div class='round'>
                <p>Points de vie de <span class="name"><?=$player1->persoName."</span> : ".$player1->getHealthPoints()?></p>
                <p>Points de vie de <span class="name"><?=$player2->persoName."</span> : ".$player2->getHealthPoints()?></p>
            </div>

        <?php endif; ?>
    <?php endif; ?>
</main>
