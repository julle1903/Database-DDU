
<?php 
    require "header.php";
    require "core/dbconn.core.php";
    if (!isset($_SESSION['userUsername'])) {
        header("Location: ../index.php");
    } 


    if(isset($_POST["submitGetBook"])) {
        $bookId = $_POST["books"];
        $userId = $_SESSION["userId"];
        
        $sqlInsert = "Insert into trades (idUser,idBook) 
            values ('$userId', '$bookId')";
        $result = mysqli_query($conn, $sqlInsert) or die(mysqli_error($conn));

        echo "User with id: $userId is now borrowing book with id: $bookId";
    }
?>
    <main>
        <div> 
            <section>
                <div>
                    <form action="" method="post">
                        <label for="books">Choose a book:</label>
                        <select name="books" id="books" required>
                        <?php

                        $sqlBooks = "SELECT b.id as id, b.title as title, b.author as author FROM books b LEFT JOIN trades t ON t.idBook = b.id WHERE t.idBook IS NULL";
                        $result = mysqli_query($conn, $sqlBooks) or die(mysqli_error($conn));

                        while($rowBooks = mysqli_fetch_array($result)){
                            extract($rowBooks);

                        ?>
                            <option value="<?php echo $id; ?>"><?php echo "$title, $author";?></option>
                        <?php
                        }
                        ?>
                        </select>
                        <br><br>
                        <input type="submit" name="submitGetBook" value="Lån">
                    </form>
                </div>
            </section>
        </div>
    </main>
<?php 
    require "footer.php";
?>










