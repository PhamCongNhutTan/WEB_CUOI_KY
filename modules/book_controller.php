<?php
class BookController
{
    public static function getBooks()
    {
        global $mysqli;
        $books = array(); // Store retrieved tours here


        $query = "SELECT B.*, UF.Username, Tour.Name, Tour.BasePrice  From Booking B, User_Info UF, Tour WHERE B.User_ID = UF.User_ID AND B.Tour_ID = Tour.Tour_ID";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $book = new Book();
                $book->setBookID($row["Booking_ID"]);
                $book->setTourID($row["Tour_ID"]);
                $book->setUserID($row["User_ID"]);
                $book->setUsername($row["Username"]);
                $book->setTourname($row["Name"]);
                $book->setAmount($row["Amount"]);
                $book->setBookDay($row["Book_Day"]);
                $book->setTotalPrice($row["BasePrice"] * $book->getAmount());
                $books[] = $book;
            }
        }
        return $books;
    }
    public static function addBook($userID, $tourID, $amount, $bookDay)
    {
        global $mysqli;
        $query = "INSERT Into Booking(Tour_ID, User_ID, Amount, Book_Day) VALUES (" . $tourID . ", " . $userID . ", " . $amount . ", '" . $bookDay . "')";
        $result = mysqli_query($mysqli, $query);
        return $result;
    }
}
