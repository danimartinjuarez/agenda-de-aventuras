<?php require_once("components/Layout.php");
require_once("components/header.php") ?>

<body>
    <main>
        <a href="./index.php"><button class="btn btn-primary text-center" id="btn-cancel" type="button">Cancela</button></a>
        <form action=?action=update&id=<?php echo $data["adventure"]->getID() ?> method="post" id="create-form">
            <div class="form-floating mb-3">
                <label for="floatingInput2">Lugar</label>
                <input type="text" class="form-control" id="floatingInput2" required value='<?php echo $data["adventure"]->getPlace() ?>' name="place">
                <button class="btn btn-primary text-center btn-submit" type="submit" value="Crear">Crear</button>
                <button class="btn btn-primary text-center" type="reset" value="Reset">Reset</button>
            </div>
        </form>
    </main>
    <?php
    require_once("components/footer.php");
    ?>