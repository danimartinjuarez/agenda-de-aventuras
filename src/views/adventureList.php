<html>
    <?php
        require_once ("components/layout.php");
    ?>
    <body id="body-agend">
        <?php
        require_once ("components/header.php");
        ?>
        <main  id="agend">
            <div class="card-header py-3" >
                <h1 class="font-weight-bold text-black agend-header">RESERVAS </h1>
            </div>
                <a href="?action=create">
                <button class="btn btn-primary text-center" type="button" id="btn-create">crear nueva aventuria</button></a>
            <div class="scroll-table">
                <table class="table" id="agend-table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col" class='action-column'>actions</th>
                        <th scope="col">Aventuria</th>
                        <th scope="col">Lugar</th>
                        <th scope="col">fecha</th>
                        <th scope="col">foto</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($data["adventure"] as $adventure){
                            echo "                
                                <tr>
                                    <td class='id-column'>{$adventure->getID()}</td>
                                    <td class='action-column'>
                                        <a href='?action=delete&id={$adventure->getID()}'>🗑️</a>
                                        <a href='?action=edit&id={$adventure->getID()}'>📝</a>
                                    </td>
                                    <td>{$adventure->getActivity()}</td>
                                    <td>{$adventure->getPlace()}</td>
                                    <td>{$adventure->getDate_time()}</td>
                                    
                                    <td >";if ($adventure->getActivity()== "soñar") {
                                            echo "<img src='public/soñar.jpg' alt='soñar' class='activity-image'>" ;
                                        }
                                        if ($adventure->getActivity()== "parapente") {
                                            echo "<img src='public/parapente.webp' alt='parapente' class='activity-image'>" ;
                                        }
                                    echo "</td>
                                </tr>";
                    } ?>
                    </tbody>
                </table>
            </div>
        </main>
        <?php
            require_once ("Components/footer.php");
        ?>
    </body>
</html>