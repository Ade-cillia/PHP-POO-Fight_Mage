<?php
abstract class Character
{
    private $healthPoints = 100;
    public $manaPoints = 10;
    public function __construct($persoName, $attackPoints){
        $this->persoName = $persoName;
        $this->attackPoints = $attackPoints;

    }

    public function dicelaunched(){
        $randomDiceAttack = rand(1,100);
        echo "<p>lancement de dés : ".$randomDiceAttack."</p>";
        if ( 1 <= $randomDiceAttack && $randomDiceAttack <= 5) {
            echo "<p>Réussite critique !</p>";
            $diceStatus=1;
        }elseif (5 < $randomDiceAttack && $randomDiceAttack < 95) {
            echo "<p>Paf, Réussite</p>";
            $diceStatus=2;
        }else {
            echo "<p>Echec critique !!</p>";
            $diceStatus=3;
        }
        return $diceStatus;
    }



    public function ajustDamage($damagePoints){
        if ($damagePoints > $this->healthPoints) {
            return $this->healthPoints;
        }else {
            return $damagePoints;
        }
    }

    public function action($attackedUser){
        $diceStatus = $this->dicelaunched();
        $damagePoints = $this->attackPrivate($attackedUser, $diceStatus);
        $damagePoints =  $attackedUser->ajustDamage($damagePoints);
        $attackedUser->takeDamage($damagePoints, $this);
    }
    public function getHealthPoints(){
        return $this->healthPoints;
    }

    public function instantHealth(){
        $this->healthPoints+= 15;
    }
    public function setHealthPoints($healthPoints){
        $this->healthPoints -= $healthPoints;
    }
};
