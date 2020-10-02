<?php 
    require "header.php";
    require "core/dbconn.core.php"
    if (!isset($_SESSION['userUsername'])) {
        header("Location: ../index.php");
    } 
?>



    <main>
        <div>
            <section>
                <div>
                </div>
            </section>
        </div>
    </main>

<?php 
    require "footer.php";

?>
