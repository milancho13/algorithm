<?php

class Maze
{
    public $maze; //迷路の配列
    public $reached; //探索した地点を表す配列
    public $isGoal; //ゴール出来たらtrue;
    const MAX_W = 6;
    const MAX_H = 4;

    public function __construct($filePath)
    {
        $this->maze = self::createMazeFromCSV($filePath);
        $this->reached = [];
        $this->isGoal = false;
    }

    //迷路のcsvファイルを読み取って、迷路の配列を作成する
    public function createMazeFromCSV($filePath)
    {
        $maze = [];

        $data = file_get_contents($filePath);
        $lines = explode("\r\n", $data);
        foreach ($lines as $line) {
            $maze[] = explode(",", $line);
        }
        return $maze;
    }

    public function search($row, $col)
    {
        //goalしていたらskip
        if ($this->isGoal) {
            return true;
        }

        //迷路の外側か壁の場合は何もしない
        if ($row < 0 || self::MAX_H <= $row || $col < 0 || self::MAX_W <= $col || $this->maze[$row][$col] == 'X') {
            return false;
        }

        //既に到達している場合は何もしない
        if (isset($this->reached[$row][$col]) && $this->reached[$row][$col] == true) {
            return false;
        }

        //今いる地点にチェックしたことを記録する
        $this->reached[$row][$col] = true;

        if ($this->maze[$row][$col] == 'G') {
            //exit('ゴール');
            $this->isGoal = true;
            //echo'<pre>';
            //var_dump($this->reached);
            //echo '</pre>';
            return true;
        }
        self::search($row, $col + 1); //右に進む
        //var_dump('実行した？');
        self::search($row, $col - 1); //左に進む
        //var_dump('実行した？');
        self::search($row + 1, $col); //上に進む
        //var_dump('実行した？');
        self::search($row - 1, $col); //下に進む

        //最終結果
        if ($this->isGoal) {
            return true;
        } else {
            return false;
        }
    }
}
