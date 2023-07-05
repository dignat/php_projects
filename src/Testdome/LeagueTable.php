<?php
namespace App\Testdome;
class LeagueTable
{
    private $standings = [];
    private $rankList = [];

    private $players = [];
    public function __construct(array $players)
    {
        $this->players = $players;
        foreach ($this->players as $index => $p) {
            $this->standings[$p] = [
                'index'        => $index,
                'games_played' => 0,
                'score'        => 0
            ];
        }
    }

    public function recordResult(string $player, int $score): void
    {
        $this->standings[$player]['games_played']++;
        $this->standings[$player]['score'] += $score;
    }

    public function playerRank(int $rank): string
    {
       foreach ($this->rankList as $key => $players) {
            if ($players['rank'] == $rank) {
                return $key;
            }
       }
        return '';
    }

    private function getMax($array, $deepKey) {
        $max = 0;
        if (is_array($array)) {
            foreach($array as $key => $value) {
                if (is_array($value)) {
                    $max = max(array($max, $value[$deepKey]));
                } else {
                    $max = max(array($max, $array[$key]));
                }
                
            }
        }

        return $max;
    }

    private function getMin($array, $deepKey) {
        $min = 1; // at least one game
        if (is_array($array)) {
            foreach($array as $key => $value) {
                if (is_array($value)) {
                    $min = min(array($min, $value[$deepKey]));
                } else {
                    $min = min(array($min, $array[$key]));
                }
                
            }
        }
        return $min;
    }

    

    public function createRankList() {
        $max = $this->getMax($this->standings, 'score');
        $games = $this->getMin($this->standings, 'games_played');
        $rank = 1;
        $fliped_array = array_flip($this->players);

        foreach($this->standings as $player => $meta) {
           $this->rankList[$player]['index_position'] = $fliped_array[$player];
            
            if($this->standings[$player]['score'] < $max || ($this->standings[$player]['score'] == $max && $this->standings[$player]['games_played'] > $games)) {
                $this->rankList[$player]['rank'] = ++$rank;

            }
            
            if (($this->standings[$player]['score'] == $max && $this->standings[$player]['games_played'] == $games)) {
                $rank = 1;
                $this->rankList[$player]['rank'] = $rank;
            } 
            

            

            
                   
           

            // else if ($this->standings[$player]['score'] >= $max  && $this->standings[$player]['games_played'] == $games) {
               
            //     $games = $this->standings[$player]['games_played'];
            //     $this->rankList[$player]['rank'] = $rank;

            // } 
            // if ($this->standings[$player]['games_played'] > $games && $this->standings[$player]['score'] >= $max) {
               
            //     $this->rankList[$player]['rank'] = $rank;
            // }
            //$rank = 1;
        }
       
        var_dump($this->rankList);
    }
}

$table = new LeagueTable(array('Mike', 'Chris', 'Arnold'));
$table->recordResult('Mike', 2);
$table->recordResult('Mike', 3);
$table->recordResult('Arnold', 5);
$table->recordResult('Chris', 5);

$table->createRankList();
echo $table->playerRank(1);