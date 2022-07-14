<?php

namespace App\models;
use App\Database;

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
}