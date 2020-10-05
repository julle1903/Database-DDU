<?php 
    require "header.php";
    require "core/dbconn.core.php";
    if (!isset($_SESSION['userUsername'])) {
        header("Location: ../index.php");
        
    } else {
        $userId = $_SESSION["userId"];
    }
    if(isset($_POST["submitReturnBook"])) {
        $bookId = $_REQUEST["books"];
        $sqlTrade = "SELECT * FROM trade WHERE idUser=$userId AND idBook=$bookId";
        $resulttradeId = mysqli_query($conn, $sqlTrade) or die(mysqli_error($conn));
        $rowTrade = mysqli_fetch_array($result);
        extract($rowTrade);
        $sqlDelete = "Delete FROM trades WHERE id=$tradeId";
        $result = mysqli_query($conn, $sqlDelete) or die(mysqli_error($conn));

        echo "User with id: $userId has returned book with id: $bookId";
    }

    
?>



    <main>
        <div>
            <section>
                <div>
                    <form action="" method="post">
                        <label for="books">Choose a book:</label>
                        <select name="books" id="books" required="required">
                            <?php

                               
                            $sqltrades = "SELECT * FROM trades WHERE idUser=$userId";
                            $result = mysqli_query($conn, $sqltrades) or die(mysqli_error($conn));

                            while($rowTrades = mysqli_fetch_array($result)){
                                extract($rowTrades);
                                    $sqlBooks = "SELECT * FROM books WHERE id=$idBook";
                                    $resultBooks = mysqli_query($conn, $sqlBooks) or die(mysqli_error($conn));
                                    $rowBooks = mysqli_fetch_array($resultBooks);
                                    extract($rowBooks);
                                    ?>
                                        <option name="bookId" value=" <?php echo $id;?> "> <?php echo "$title, $author";?> </option>
                                    <?php
                                }
                            ?>
                        </select>
                        <br><br>
                        <input type="submit" name="submitReturnBook" value="Aflever">
                    </form>
                </div>
            </section>
        </div>
    </main>

<?php 
    require "footer.php";

?>
