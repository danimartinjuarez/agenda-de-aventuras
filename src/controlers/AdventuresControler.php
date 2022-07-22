<?php
namespace App\controlers;
use App\models\Adventures;
use App\core\View;
use SebastianBergmann\Environment\Console;

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
        if (isset($_GET["action"]) && ($_GET["action"] == "edit")) {
            $this->edit($_GET["id"]);
            return;
        }
        if (isset($_GET["action"]) && ($_GET["action"] == "update")) {
            $this->update($_POST, $_GET["id"]);
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
        $newAdventure = new Adventures(Null,$request["adventure"], $request["place"], null, $request["number_of_persons"], $request["observations"], $request["date_quote"]);
        $newAdventure->save();
        $this->index();
    }
    public function edit($id){
        $adventureMod= new Adventures();
        $adventure= $adventureMod->findById($id);
        new View("editAdventure", ["adventure" =>$adventure]);
    }
    public function update(array $request, $id){
        $adventureMod=new Adventures();
        $adventure = $adventureMod->findById($id);
        $adventure->rename($request["place"]);
        $adventure->update();
        $this->index();
    }

}