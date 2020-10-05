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
        $sqlTradeFinal = "SELECT * FROM trades WHERE idUser=$userId AND idBook=$bookId";
        $resultTradeId = mysqli_query($conn, $sqlTradeFinal) or die(mysqli_error($conn));
        $rowTrade = mysqli_fetch_array($resultTradeId);
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

                               
                            $sqlTrades = "SELECT * FROM books WHERE idUser=$bookId";
                            $resultTrades = mysqli_query($conn, $sqlTrades) or die(mysqli_error($conn));
                            if ($row = mysqli_fetch_assoc($resultTrades)) {
                                $title = $row["title"];
                                $author = $row["author"];
                            }

                            $sqlBooks = "SELECT * FROM trades WHERE idUser=$userId";
                            $resultBooks = mysqli_query($conn, $sqlBooks) or die(mysqli_error($conn));
                            if ($row = mysqli_fetch_assoc($resultBooks)) {
                                $bookId = $row["idBook"];
                            }
                            // $sqlBooks = "SELECT * FROM books WHERE id=$idBook";
                            // $resultBooks = mysqli_query($conn, $sqlBooks) or die(mysqli_error($conn));

    
                                    ?>
                                        <option name="bookId" value=" <?php echo $bookId;?> "> <?php echo "$title, $author";?> </option>

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
