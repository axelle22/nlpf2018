<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class PerellaPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class PerellaPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------

     

        $opponentLast_Choice = $this->result->getChoicesFor($this->opponentSide);
        $myLast_Choice = $this->result->getChoicesFor($this->mySide);

        $playRock = $this->result->getStatsFor($this->opponentSide)['rock'];
        $playScissors = $this->result->getStatsFor($this->opponentSide)['scissors'];
        $playPaper = $this->result->getStatsFor($this->opponentSide)['paper'];


        $opponentLast_score = $this->result->getLastScoreFor($this->mySide);
        $myLast_score = $this->result->getLastScoreFor($this->mySide);

        $getNumber_rounds = $this->result->getNbRound();

        if ($getNumber_rounds == 0)
        {
            return parent::rockChoice();
        }
        else
        {
            if (($playRock / $getNumber_rounds) * 100 > 90)
            {
                return parent::paperChoice();
            }
            else if (($playPaper /$getNumber_rounds) * 100 > 90)
            {
                return parent::scissorsChoice();
            }
            else if (($playScissors / $getNumber_rounds) * 100 > 90)
            {
                return parent::rockChoice();
            }
            else if ($opponentLast_score > $myLast_score)
            {
                 return $opponentLast_Choice;
            }
             else
                  return $myLast_Choice;
        }


        return $choice;
    }
};