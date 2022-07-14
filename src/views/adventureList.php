<html>
    <?php
        require_once ("components/layout.php");
    ?>
    <body>
        <?php
        require_once ("components/header.php");
        ?>
        <main>
            <div class="card-header py-3">
                <h1 class="font-weight-bold text-black titulo-pagina">RESERVAS </h1>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Aventuria</th>
                    <th scope="col">Lugar</th>
                    <th scope="col">fecha</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($data["adventure"] as $adventure){
                echo "                  
                
                    <tr>
                        <th>{$adventure->getID()}</th>
                        <td>{$adventure->getActivity()}</td>
                        <td>{$adventure->getPlace()}</td>
                        <td>{$adventure->getDate_time()}</td>
                    </tr>";
                } ?>
                </tbody>
            </table>
        </main>
        <?php
            require_once ("Components/footer.php");
        ?>
    </body>
</html>