<?php require_once("components/layout.php");
require_once("components/header.php") ?>

<body>
<main>
    <a href="./index.php"><button class="btn btn-primary text-center" type="button" >Cancela</button></a> 
    <form action="?action=store" method="post">
        <div class="form-floating mb-3">
            <label for="floatingInput">Aventuria</label>
            <input type="text" class="form-control" id="floatingInput" placeholder="Aqui tu aventura" name="adventure">
            <label for="floatingInput2">Lugar</label>
            <input type="text" class="form-control" id="floatingInput2" placeholder="Bustiello, por ejemplo" name="place">
        
            <center><button class="btn btn-primary text-center" type="submit" value="Crear">Crear</button>
            <center><button class="btn btn-primary text-center" type="reset" value="Reset">Reset</button>
        </div>
    </form>
</main>
    <?php
    require_once("components/footer.php"); ?>
</body>
