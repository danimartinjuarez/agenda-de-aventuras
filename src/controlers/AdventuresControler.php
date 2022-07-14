<?php
namespace App\controlers;
use App\models\Adventures;
use App\core\View;

class AdventuresControler{
   public function __construct(){
        $this->index();
    }

    public function index(){
        $adventure = new Adventures();
        $adventures= $adventure->all();
        new View("adventureList", ["adventure" => $adventures]);
        
    }
}