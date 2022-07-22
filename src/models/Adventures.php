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
    private ?string $date_quote;
    private $database;
    private $table= 'quotes';

    public function __construct( int $id = null, string $activity = '', string $place ='', string $date_time = null, string $number_of_persons='', string $observations = '',string $date_quote = null){
        $this->id= $id;
        $this->activity = $activity;
        $this->place = $place;
        $this->date_quote = $date_quote;
        $this->number_of_persons = $number_of_persons;
        $this->observations = $observations;
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
            $adventureItem = new Adventures($adventure["id"], $adventure["activity"], $adventure["place"], $adventure["date_time"], $adventure["number_of_persons"], $adventure["observations"], $adventure["date_quote"]);
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
    public function getDate_quote(){
        return $this->date_quote;
    }
    public function getNumber_of_persons(){
        return $this->number_of_persons;
    }
    public function getObservations()
    {
        return $this->observations;
    }
    public function findById($id){
        $query = $this->database->mysql->query("SELECT * FROM `{$this->table}` WHERE `id` = {$id}" );
        $result =$query->fetchAll();
        return new Adventures($result[0]["id"], $result[0]["activity"], $result[0]["place"], $result[0]["date_time"], $result[0]["number_of_persons"], $result[0]["observations"], $result[0]["date_quote"]);
    }
    public function delete(){
        $query = $this->database->mysql->query("DELETE FROM `{$this->table}` WHERE `{$this->table}`.`id`={$this->id}" );
    }
    public function save(){
        $this->database->mysql->query("INSERT INTO `{$this->table}`(`activity`, `place`, `number_of_persons`, `observations`, `date_quote`) VALUES ('$this->activity' , '$this->place', '$this->number_of_persons', '$this->observations', '$this->date_quote');");
    }
    public function rename($place) {
        $this->place= $place;
    }
    public function update(){
        $this->database->mysql->query("UPDATE `{$this->table}` SET `place`='{$this->place}', `activity`='{$this->activity}',`number_of_persons`='{$this->number_of_persons}', `observations`='{$this->observations}', `date_quote`='{$this->date_quote}' WHERE `id`= '{$this->id}' ");
    }
}