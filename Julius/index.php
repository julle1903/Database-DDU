<?php 
    require "header.php";
?>

    <main>
        <div>
        <section>
            <div>
                <?php
                    if (isset($_GET['fejl'])) {
                        if ($_GET['fejl'] == "fejl_tommeFelter") {
                            echo '<p>Du har ikke udfyldt alle felter...</p>';

                        } #else if ($_GET[]) {

                    # }
                    }

                    if (isset($_SESSION['userUsername'])) {
                        echo '<form action="core/logout.core.php" method="post">
                            <h2>Log ud</h2>
                            <button type="submit" name="submit/logout">Log ud</button>
                            </form> 
                            <button onClick="">Lån bog</button>
                            <button onClick="">Aflever bog</button>';
                    } else {
                        echo '<form action="core/login.core.php" method="post">
                            <h2>Log ind</h2>
                            <p>Brugernavn</p>
                            <input type="text" name="username" placeholder="Brugernavn">
                            <p>Password</p>
                            <input type="password" name="password" placeholder="Adgangskode">
                            <button type="submit" name="submit/login">Log ind</button>
                            </form>';
                    }
                    ?>
            </div>

                <?php 
                    if (isset($_SESSION['userUsername'])) {
                        echo '<p>Du er logged ind</p>';
                    } else {
                        echo '<p>Du er logged ud</p>';
                    }
                ?>
            </section>
        </div>
        <script>
            function getBooksPage() {
                <?php 
                    header("Location: ../getBooks.php");
                ?>

            }
        </script>
    </main>

<?php 
    require "footer.php";

?>
