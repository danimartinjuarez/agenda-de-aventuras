<?php
namespace App\controlers;
use App\models\Adventures;
use App\core\View;

class AdventuresControler{
    public function __construct(){
        if(isset($_GET["action"])&& ($_GET["action"] == "delete")){
            $this->destroy($_GET["id"]);
            return;
        }
        if(isset($_GET["action"])&& ($_GET["action"] == "create")){
            $this->create();
            return;
        }
        if(isset($_GET["action"])&& ($_GET["action"] == "store")){
            $this->store($_POST);
            return;
        }
        $this->index();
    }

    public function index(){
        $adventure = new Adventures();
        $adventures= $adventure->all();
        new View("adventureList", ["adventure" => $adventures]);
        
    }
    public function destroy($id){
        $adventureFinish= new Adventures();
        $adventure = $adventureFinish->findById($id);
        $adventure->delete();
        $this->index();
    }
    public function create(){
        new View("createAdventure");
    }
    public function store(array $request){
        $newAdventure = new Adventures(Null,$request["adventure"], $request["place"]);
        $newAdventure->save();
        $this->index();
    }
}