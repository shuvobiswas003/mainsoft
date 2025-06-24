<?php
require "../interdb.php";
function addClass() {
    global $link; // Access the global $link variable
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $pub_name= $_POST['pub_name'];
        $sql ="INSERT INTO libary_publisher(pub_name) VALUES ('$pub_name') "; 
        if(mysqli_query($link, $sql)){
            echo "<h3 style='color:green;'>Publisher Added</h1>.";
        } else{
            echo "<h3 style='color:red;'>Publisher Already Exists</h1>";
        }
        
    }
}

function viewClasses() {
    global $link; // Access the global $link variable

    $sel_query="SELECT * FROM libary_publisher";
    $result = mysqli_query($link, $sel_query);

    ?>
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Publisher Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["pub_name"]; ?></td>
                <td>
                    <a href="edit_publisher.php?id=<?php echo $row['id']; ?>">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <a href="delete_publisher.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this Publisher?');">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                    
                </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
    <?php  
}

function deleteClass($classId) {
    global $link; // Access the global $link variable
    
    // Prevent SQL injection
    $classId = mysqli_real_escape_string($link, $classId);

    // Construct the SQL query to delete the class
    $sql = "DELETE FROM libary_publisher WHERE id = '$classId'";
    
    // Execute the query
    return mysqli_query($link, $sql);
}

function editPublisherForm($publisherId) {
    global $link; // Access the global $link variable
    
    // Prevent SQL injection
    $publisherId = mysqli_real_escape_string($link, $publisherId);

    // Retrieve the publisher data from the database
    $query = "SELECT * FROM libary_publisher WHERE id = '$publisherId'";
    $result = mysqli_query($link, $query);
    $publisher = mysqli_fetch_assoc($result);
    ?>
    <form action="edit_publisher.php" method="POST">
        <input type="hidden" name="publisher_id" value="<?php echo $publisher['id']; ?>">
        <div class="form-group">
            <label for="pub_name">Publisher Name:</label>
            <input type="text" class="form-control" id="pub_name" name="pub_name" value="<?php echo $publisher['pub_name']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Publisher</button>
    </form>
    <?php
}

function editPublisher($publisherId, $publisherName) {
    global $link; // Access the global $link variable
    
    // Prevent SQL injection
    $publisherId = mysqli_real_escape_string($link, $publisherId);
    $publisherName = mysqli_real_escape_string($link, $publisherName);

    // Construct the SQL query to update the publisher
    $sql = "UPDATE libary_publisher SET pub_name = '$publisherName' WHERE id = '$publisherId'";
    
    // Execute the query
    $result = mysqli_query($link, $sql);
    
    // Check for errors
    if (!$result) {
        echo "Error: " . mysqli_error($link);
        return false;
    }
    
    return true;
}

function getPublishers() {
    global $link; // Access the global $link variable
    $publishers = [];
    $query = "SELECT * FROM libary_publisher";
    $result = mysqli_query($link, $query);

    if ($result) {

        while ($row = mysqli_fetch_assoc($result)) {
            $publishers[] = $row;
        }
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($link);
    }
    return $publishers;
}

//author_part

function add_Author() {
    global $link; // Access the global $link variable
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $author_name= $_POST['author_name'];
        $sql ="INSERT INTO libary_author(author_name) VALUES ('$author_name') "; 
        if(mysqli_query($link, $sql)){
            echo "<h3 style='color:green;'>Publisher Added</h1>.";
        } else{
            echo "<h3 style='color:red;'>Publisher Already Exists</h1>";
        }
        
    }
}


function viewAuthor() {
    global $link; // Access the global $link variable

    $sel_query="SELECT * FROM libary_author";
    $result = mysqli_query($link, $sel_query);

    ?>
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Author Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["author_name"]; ?></td>
                <td>
                    <a href="edit_author.php?id=<?php echo $row['id']; ?>">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <a href="delete_author.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this Publisher?');">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                    
                </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
    <?php  
}

function deleteAuthor($classId) {
    global $link; // Access the global $link variable
    
    // Prevent SQL injection
    $classId = mysqli_real_escape_string($link, $classId);

    // Construct the SQL query to delete the class
    $sql = "DELETE FROM libary_author WHERE id = '$classId'";
    
    // Execute the query
    return mysqli_query($link, $sql);
}


function editAuthorForm($publisherId) {
    global $link; // Access the global $link variable
    
    // Prevent SQL injection
    $publisherId = mysqli_real_escape_string($link, $publisherId);

    // Retrieve the publisher data from the database
    $query = "SELECT * FROM libary_author WHERE id = '$publisherId'";
    $result = mysqli_query($link, $query);
    $publisher = mysqli_fetch_assoc($result);
    ?>
    <form action="edit_author.php" method="POST">
        <input type="hidden" name="publisher_id" value="<?php echo $publisher['id']; ?>">
        <div class="form-group">
            <label for="pub_name">Author Name:</label>
            <input type="text" class="form-control" id="pub_name" name="pub_name" value="<?php echo $publisher['author_name']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Publisher</button>
    </form>
    <?php
}

function editAuthor($publisherId, $publisherName) {
    global $link; // Access the global $link variable
    
    // Prevent SQL injection
    $publisherId = mysqli_real_escape_string($link, $publisherId);
    $publisherName = mysqli_real_escape_string($link, $publisherName);

    // Construct the SQL query to update the publisher
    $sql = "UPDATE libary_author SET author_name = '$publisherName' WHERE id = '$publisherId'";
    
    // Execute the query
    $result = mysqli_query($link, $sql);
    
    // Check for errors
    if (!$result) {
        echo "Error: " . mysqli_error($link);
        return false;
    }
    
    return true;
}

function getAuthors() {
    global $link; // Access the global $link variable
    $authors = [];
    $query = "SELECT * FROM libary_author";
    $result = mysqli_query($link, $query);

    if ($result) {

        while ($row = mysqli_fetch_assoc($result)) {
            $authors[] = $row;
        }
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($link);
    }
    return $authors;
}


//bookPart
function add_Book() {
    global $link; // Access the global $link variable
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $publisher_name= $_POST['publisher_name'];
        $author_name= $_POST['author_name'];
        $book_name= $_POST['book_name'];
        $book_barcode= $_POST['book_barcode'];


        $sql ="INSERT INTO libary_book_list(publisher_name,author_name,book_name,book_barcode) VALUES ('$publisher_name','$author_name','$book_name','$book_barcode') "; 
        if(mysqli_query($link, $sql)){
            echo "<h3 style='color:green;'>Book Added</h1>.";
        } else{
            echo "<h3 style='color:red;'>Book Already Exists</h1>";
        }
        
    }
}


function viewBooklist() {
    global $link; // Access the global $link variable

    $sel_query="SELECT * FROM libary_book_list";
    $result = mysqli_query($link, $sel_query);

    ?>
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Publisher Name</th>
                <th>Author Name</th>
                <th>Book Name</th>
                <th>Barcode</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["publisher_name"]; ?></td>
                <td><?php echo $row["author_name"]; ?></td>
                <td><?php echo $row["book_name"]; ?></td>
                <td><?php echo $row["book_barcode"]; ?></td>
                <td>
                    <a href="edit_book.php?id=<?php echo $row['id']; ?>">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    <a href="delete_book_list.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this Publisher?');">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                    
                </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
    <?php  
}


function editBookForm($id) {
    global $link; // Access the global $link variable
    
    // Prevent SQL injection
    $id = mysqli_real_escape_string($link, $id);

    // Retrieve the publisher data from the database
    $query = "SELECT * FROM libary_book_list WHERE id = '$id'";
    $result = mysqli_query($link, $query);
    $book_list = mysqli_fetch_assoc($result);
    ?>
    <form action="edit_book.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $book_list['id']; ?>">
        <div class="form-group">
            <label class="col-md-3 control-label" for="publisher_name">Select Publisher</label>
            <div class="col-md-9">
                <select name="publisher_name" id="publisher_name" required="1" class="select2">
                    
                    <option value="<?php echo $book_list['publisher_name']; ?>"><?php echo $book_list['publisher_name']; ?>(Already Selected)</option>
                    <?php
                        $publishers = getPublishers(); // Fetch publishers from database
                        foreach ($publishers as $publisher) {
                            echo "<option value='{$publisher['pub_name']}'>{$publisher['pub_name']}</option>";
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="author_name">Select Author</label>
            <div class="col-md-9">
                <select name="author_name" id="author_name" required="1" class="select2">
                    <option value="<?php echo $book_list['author_name']; ?>"><?php echo $book_list['author_name']; ?>(Already Selected)</option>
                    <?php
                        $authors = getAuthors(); // Fetch authors from database
                        foreach ($authors as $author) {
                            echo "<option value='{$author['author_name']}'>{$author['author_name']}</option>";
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="book_name">Book Name</label>
            <div class="col-md-9">
                <input type="text" name="book_name" required class="form-control" autofocus value="<?php echo $book_list['book_name']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="book_barcode">Book Barcode</label>
            <div class="col-md-9">
                <input type="text" name="book_barcode" required class="form-control" value="<?php echo $book_list['book_barcode']; ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>
    <?php
}

function editBookList($id, $publisher_name, $author_name, $book_name, $book_barcode) {
    global $link; // Access the global $link variable
    
    // Prevent SQL injection
    $id = mysqli_real_escape_string($link, $id);
    $publisher_name = mysqli_real_escape_string($link, $publisher_name);
    $author_name = mysqli_real_escape_string($link, $author_name);
    $book_name = mysqli_real_escape_string($link, $book_name);
    $book_barcode = mysqli_real_escape_string($link, $book_barcode);

    // Construct the SQL query to update the book list
    $sql = "UPDATE libary_book_list SET publisher_name = '$publisher_name', author_name = '$author_name', book_name = '$book_name', book_barcode = '$book_barcode' WHERE id = '$id'";
    
    // Execute the query
    $result = mysqli_query($link, $sql);
    
    // Check for errors
    if (!$result) {
        echo "Error: " . mysqli_error($link);
        return false;
    }
    
    return true;
}

function deleteBooklist($id) {
    global $link; // Access the global $link variable
    
    // Prevent SQL injection
    $id = mysqli_real_escape_string($link, $id);

    // Construct the SQL query to delete the class
    $sql = "DELETE FROM libary_book_list WHERE id = '$id'";
    
    // Execute the query
    return mysqli_query($link, $sql);
}


function viewBook_stock() {
    global $link; // Access the global $link variable

    $sel_query="SELECT * FROM libary_book_stock";
    $result = mysqli_query($link, $sel_query);

    ?>
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Publisher Name</th>
                <th>Author Name</th>
                <th>Book Name</th>
                <th>Barcode</th>
                <th>Amount</th>
                <th>Running Amount</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $row["bookid"]; ?></td>
                <td><?php echo $row["publisher_name"]; ?></td>
                <td><?php echo $row["author_name"]; ?></td>
                <td><?php echo $row["book_name"]; ?></td>
                <td><?php echo $row["book_barcode"]; ?></td>
                <td><?php echo $row["total"]; ?></td>
                <td><?php echo $row["running_amount"]; ?></td>
                
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
    <?php  
}

function issue_book() {
    global $link; // Access the global $link variable
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sdate = $_POST['sdate'];
        $start_date = date("Y-m-d", strtotime($sdate));

        $edate = $_POST['edate'];
        $end_date = date("Y-m-d", strtotime($edate));

        $book_barcode = $_POST['book_barcode'];
        $rfid_number = $_POST['rfid_number'];

        //getting Student Data
        $stuid = "";
        $sel_query = "SELECT * FROM rfid WHERE CAST(rfid AS UNSIGNED) = " . (int)$rfid_number;
        $result = mysqli_query($link, $sel_query);
        while($row = mysqli_fetch_assoc($result)) {
            $stuid = $row['stuid'];
        }

        $student_name = "";
        $class = "";
        $section = "";
        $mobile = "";

        $sel_query = "SELECT * FROM student WHERE uniqid ='$stuid'";
        $result = mysqli_query($link, $sel_query);
        while($row = mysqli_fetch_assoc($result)) {
            $student_name = $row['name'];
            $class = $row['classnumber'];
            $section = $row['secgroup'];
            $mobile = $row['mobile'];
        }

        //finding book information
        $bookid = "";
        $publisher_name = "";
        $author_name = "";
        $book_name = "";

        $sel_query = "SELECT * FROM libary_book_list WHERE book_barcode ='$book_barcode'";
        $result = mysqli_query($link, $sel_query);
        while($row = mysqli_fetch_assoc($result)) {
            $bookid = $row['id'];
            $publisher_name = $row['publisher_name'];
            $author_name = $row['author_name'];
            $book_name = $row['book_name'];
        }

        // Calculate the difference in seconds between the two dates
        $date_diff_seconds = strtotime($end_date) - strtotime($start_date);

        // Convert the difference to days
        $total_days = floor($date_diff_seconds / (60 * 60 * 24));

        $return_date = null;
        $status = "to_lend";

        $insert_query = "
    INSERT INTO library_book_issue 
    (bookid, publisher_name, author_name, book_name, book_barcode, date_of_issue, date_of_expiry, return_date, total_days, student_id, student_name, class, section, mobile, status,rfid_card) 
    VALUES 
    ('$bookid', '$publisher_name', '$author_name', '$book_name', '$book_barcode', '$start_date', '$end_date', '$return_date', '$total_days', '$stuid', '$student_name', '$class', '$section', '$mobile', '$status',$rfid_number) 
    ON DUPLICATE KEY UPDATE 
    bookid = VALUES(bookid), 
    publisher_name = VALUES(publisher_name), 
    author_name = VALUES(author_name), 
    book_name = VALUES(book_name), 
    date_of_issue = VALUES(date_of_issue), 
    date_of_expiry = VALUES(date_of_expiry), 
    return_date = VALUES(return_date), 
    total_days = VALUES(total_days), 
    student_id = VALUES(student_id), 
    student_name = VALUES(student_name), 
    class = VALUES(class), 
    section = VALUES(section), 
    mobile = VALUES(mobile), 
    status = VALUES(status),
    rfid_card = VALUES(rfid_card)
";

        if (!empty($stuid) && !empty($bookid)) {
            if(mysqli_query($link, $insert_query)) {
                    echo "<h1 style='color:green'>Book issued successfully.</h1>";

                    $update_query = "UPDATE libary_book_stock SET running_amount = running_amount - 1 WHERE book_barcode = '$book_barcode'";
        
                    if(mysqli_query($link, $update_query)) {
                        echo "<h1 style='color:green'>Book Stock Updated</h1>";
                    } else {
                        echo "Error updating running amount: " . mysqli_error($link);
                    }

                } else {
                    echo "Error: " . mysqli_error($link);
                }
        }

       
    }
}


function viewBookIssue() {
    global $link; // Access the global $link variable

    $sel_query="SELECT * FROM library_book_issue";
    $result = mysqli_query($link, $sel_query);

    ?>
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Class</th>
                <th>Section</th>
                <th>Student Name</th>
                <th>Student ID</th>
                <th>RFID</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Issue Date</th>
                <th>Expiry Date</th>
                <th>Return Date</th>
                <th>Barcode</th>
                <th>Mobile</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    <?php
    while($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["class"]; ?></td>
                <td><?php echo $row["section"]; ?></td>
                <td><?php echo $row["student_name"]; ?></td>
                <td><?php echo $row["student_id"]; ?></td>
                <td><?php echo $row["rfid_card"]; ?></td>
                <td><?php echo $row["book_name"]; ?></td>
                <td><?php echo $row["author_name"]; ?></td>
                <td><?php echo $row["date_of_issue"]; ?></td>
                <td><?php echo $row["date_of_expiry"]; ?></td>
                <td><?php echo $row["return_date"]; ?></td>
                <td><?php echo $row["book_barcode"]; ?></td>
                <td><?php echo $row["mobile"]; ?></td>
                <td>
                    <?php
                    if ($row['status'] == "to_lend") {
                    ?>
                    <a href="delete_issued_book.php?id=<?php echo $row['id']; ?>&book_barcode=<?php echo $row['book_barcode']; ?>" onclick="return confirm('Are you sure you want to delete this Publisher?');">
                        <button type="button" class="btn btn-danger">Delete</button>
                    </a>
                    <?php 
                    }else{
                        echo "Returned";
                    }
                    ?>
                
                </td>
            </tr>
    <?php
    }
    ?>
        </tbody>
    </table>
    <?php  
}


function deleteIssuedBook($id, $book_barcode) {
    global $link; // Access the global $link variable
    
    // Prevent SQL injection
    $id = mysqli_real_escape_string($link, $id);
    $book_barcode = mysqli_real_escape_string($link, $book_barcode);

    // Construct the SQL query to delete the issued book
    $sql = "DELETE FROM library_book_issue WHERE id = '$id'";
    
    // Execute the deletion query
    $delete_result = mysqli_query($link, $sql);
    
    // Check if deletion was successful
    if ($delete_result) {
        // If deletion was successful, update the book stock
        $update_query = "UPDATE libary_book_stock SET running_amount = running_amount + 1 WHERE book_barcode = '$book_barcode'";
        
        // Execute the update query
        $update_result = mysqli_query($link, $update_query);
        
        // Check if update was successful
        if ($update_result) {
            // Both deletion and update were successful
            return true;
        } else {
            // If update fails, display an error message
            echo "Error updating book stock: " . mysqli_error($link);
            return false;
        }
    } else {
        // If deletion fails, display an error message
        echo "Error deleting issued book: " . mysqli_error($link);
        return false;
    }
}


?>
