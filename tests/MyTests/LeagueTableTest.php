<?php
namespace Tests\MyTests;

use PHPUnit\Framework\TestCase;
use App\Testdome\LeagueTable;

class LeagueTableTest extends TestCase {

    public function testlegalScores() {
         $table = new LeagueTable(array('Mike', 'Chris', 'Arnold', 'Bobo'));
        $table->recordResult('Mike', 2);
        $table->recordResult('Mike', 3);
        $table->recordResult('Arnold', 5);
        $table->recordResult('Chris', 5);
        $table->recordResult('Bobo', 6);
        $table->createRankList();
        $result = $table->playerRank(1);
        $this->assertSame($result, 'Bobo');
    }

    public function testSameMaxScores() {
        $table = new LeagueTable(array('Mike', 'Chris'));
        $table->recordResult('Mike', 2);
        $table->recordResult('Mike', 3);
        $table->recordResult('Chris', 5);
        $table->createRankList();
        $result = $table->playerRank(1);
      
        $this->assertSame($result, 'Chris');
    }
}