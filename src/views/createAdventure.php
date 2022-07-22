<?php require_once("components/Layout.php");
require_once("components/header.php") ?>

<body>
    <main>
        <a href="./index.php"><button class="btn btn-primary text-center" id="btn-cancel" type="button">Cancela</button></a>
        <form action="?action=store" method="post" id="create-form">
            <div class="form-floating mb-3">
                <label for="adventure"><img src='public/parapente.webp' alt='parapente' class='activity-image'></label>
                <input type="radio" name="adventure" value="parapente">
                <label for="adventure"><img src='public/soñar.jpg' alt='soñar' class='activity-image'></label>
                <input type="radio" name="adventure" value="soñar"></br>
                <label for="floatingInput2">Lugar</label>
                <input type="text" class="form-control" id="floatingInput2" placeholder="Bustiello, por ejemplo" name="place">
                <label for="floatingInput3">Fecha</label>
                <input type="date" class="form-control" id="floatingInput3" placeholder="Recuerda la fecha es lo más importante" name="date_quote" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date('Y-m-d'); ?>">>
                <label for="floatingInput4">Personas</label>
                <input type="number" class="form-control" id="floatingInput4" placeholder="solo numero, cualquier otro dato a observaciones" name="number_of_persons">
                <label for="floatingInput5">Observaciones</label>
                <input type="text" class="form-control" id="floatingInput5" placeholder="A tener en cuenta" name="observations">
                <button class="btn btn-primary text-center btn-submit" type="submit" value="Crear">Crear</button>
                <button class="btn btn-primary text-center" type="reset" value="Reset">Reset</button>
            </div>
        </form>
    </main>
    <?php
    require_once("components/footer.php");
    ?>