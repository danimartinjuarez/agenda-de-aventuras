<?php

namespace App\models;
use App\Database;
use mysqli;

class Adventures {
    private ?int $id;
    private string $activity;
    private string $place;
    private ?string $date_time;
    private string $number_of_persons;
    private string $observations;
    private string $date_quote;
    private $database;
    private $table= 'quotes';

    public function __construct( int $id = null, string $activity = '', string $place ='', string $date_time = null){
        $this->id= $id;
        $this->activity = $activity;
        $this->place = $place;
        $this->date_time = $date_time;


        if(!$this->database){
            $this->database = new Database();
        }
    }
    public function all(){
        $query= $this->database->mysql->query("SELECT * FROM {$this->table}");
        $adventureArray= $query->fetchAll();
        $adventureList = [];
        foreach ($adventureArray as $adventure) {
            $adventureItem = new Adventures($adventure["id"], $adventure["activity"], $adventure["place"], $adventure["date_time"]);
            array_push($adventureList, $adventureItem);
        }
        return $adventureList;
    }
    public function getID(){
        return $this->id;
    }
    public function getActivity(){
        return $this->activity;
    }
    public function getPlace(){
        return $this->place;
    }
    public function getDate_time(){
        return $this->date_time;
    }
    public function findById($id){
        $query = $this->database->mysql->query("SELECT * FROM `{$this->table}` WHERE `id` = {$id}" );
        $result =$query->fetchAll();
        return new Adventures($result[0]["id"], $result[0]["activity"], $result[0]["place"], $result[0]["date_time"],);
    }
    public function delete(){
        $query = $this->database->mysql->query("DELETE FROM `{$this->table}` WHERE `{$this->table}`.`id`={$this->id}" );
    }
    public function save(){
        $this->database->mysql->query("INSERT INTO `{$this->table}`(`activity`,`place`) VALUES ('$this->activity' , '$this->place');");
    }
    public function rename($place) {
        $this->place= $place;
    }
    public function update(){
        $this->database->mysql->query("UPDATE `{$this->table}` SET `place`='{$this->place}' WHERE `id`= '{$this->id}' ");
    }
}