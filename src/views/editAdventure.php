<?php require_once("components/Layout.php");
require_once("components/header.php") ?>

<body>
    <main>
        <a href="./index.php"><button class="btn btn-primary text-center" id="btn-cancel" type="button">Cancela</button></a>
        <form action=?action=update&id=<?php echo $data["adventure"]->getID() ?> method="post" id="create-form">
            <div class="form-floating mb-3">
                <label for="floatingInput2">Lugar</label>
                <input type="text" class="form-control" id="floatingInput2" required value='<?php echo $data["adventure"]->getPlace() ?>' name="place">
                <label for="floatingInput3">Fecha</label>
                <input type="date" class="form-control" id="floatingInput3" required value='<?php echo $data["adventure"]->getDate_quote() ?>' name="date_quote">
                <label for="floatingInput4">Numero de personas</label>
                <input type="number" class="form-control" id="floatingInput4" required value='<?php echo $data["adventure"]->getNumber_of_persons() ?>' name="number_of_persons">
                <label for="floatingInput5">Observaciones</label>
                <input type="text" class="form-control" id="floatingInput2" required value='<?php echo $data["adventure"]->getObservations() ?>' name="observations">
                <label for="adventure"><img src='public/parapente.webp' alt='parapente' class='activity-image'></label>
                <input type="radio" name="adventure" value="parapente" <?php if ($data["adventure"]->getActivity() == "parapente") {
                                                                            echo "checked";
                                                                        } ?>>
                <label for="adventure"><img src='public/soñar.jpg' alt='soñar' class='activity-image'></label>
                <input type="radio" name="adventure" value="soñar" <?php if ($data["adventure"]->getActivity() == "soñar") {
                                                                        echo "checked";
                                                                    } ?>></br>
                <button class="btn btn-primary text-center btn-submit" type="submit" value="Crear">Crear</button>
                <button class="btn btn-primary text-center" type="reset" value="Reset">Reset</button>
            </div>
        </form>
    </main>
    <?php
    require_once("components/footer.php");
    ?>