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
                            } else if ($_GET['fejl'] == "fejl_sql") {
                                echo '<p>Der opstod en fejl ved din forespørgsel... Prøv venligst igen eller kontakt supporten</p>';
                        } else if ($_GET['fejl'] == "fejl_forkertPassword") {
                            echo '<p>Din indtastede adgangskode er forkert...</p>';
                    } else if ($_GET['fejl'] == "fejl_ingenMatchendeBruger") {
                        echo '<p>Dit indtastede brugernavn stemte ikke overens med en eksisterende bruger... Dette betyder at der ikke findes nogen konto med de indtastede login informationer...</p>';
                }
                        }

                        if (isset($_SESSION['userUsername'])) {
                            echo '<form action="core/logout.core.php" method="post">
                                <h2>Velkommen</h2>
                                <button type="submit" name="submit/logout">Log ud</button>
                                </form> 
                                <button onClick="getBooksPage()">Lån bog</button>
                                <button onClick="returnBooksPage()">Aflever bog</button>';
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
            </section>
        </div>
        <script>
            function getBooksPage() {
                window.location.href='getBooks.php';
            }
            function returnBooksPage() {
                window.location.href='returnBooks.php';
            }
        </script>
    </main>

<?php 
    require "footer.php";

?>
