<?php
    //***************Transfer Money****************************/

    $connect = mysqli_connect("localhost", "root", "", "banksystem");
    if(isset($_POST["submit_money"])) {
            $timestamp = time();
            date_default_timezone_set("Asia/Kolkata"); 
            $date_time =  date("Y-m-d H:i:s", $timestamp); 

            $from_customer = $_POST['from_customer'];
            $to_customer = $_POST['to_customer'];
            $amount = $_POST['amount'];
            
            $sql = "SELECT * from customers where name='$from_customer'";
            $query = mysqli_query($connect, $sql);
            $sql1 = mysqli_fetch_array($query); 
            
            $sql = "SELECT * from customers where name = '$to_customer'";
            $query = mysqli_query($connect, $sql);
            $sql2 = mysqli_fetch_array($query);

            
                $newbal = $sql1['balance'] - $amount;
                $sql = "UPDATE customers set balance=$newbal where name='$from_customer'";
                mysqli_query($connect, $sql);
    
                $newbal = $sql2['balance'] + $amount;
                $sql = "UPDATE customers set balance=$newbal where name='$to_customer'";
                mysqli_query($connect, $sql);
                $query = "INSERT INTO `transaction`( `from_customer`, `to_customer`, `amount`,`date_time`) VALUES ( '$from_customer', '$to_customer', '$amount', '$date_time')";
                if(!mysqli_query($connect,$query)) {
                    echo '<script>alert("Not inserted. ")</script>';
                }
                else{
                if(count($_POST)>0) {
                    $last_id = mysqli_insert_id($connect);
                    echo "<script>  alert('Congratulations! Transaction successful. '); 
                    </script>";
                }

                $lastdata = "SELECT * FROM Transaction WHERE id = $last_id";
                $showLastData = mysqli_query($connect,$lastdata);
                if(mysqli_num_rows($showLastData)>0){
                    while ($row = mysqli_fetch_assoc($showLastData)) {
                        ?>
                        
                        <div class="container">
                        <div class="col-lg-6">
                            <div class="card chapterCard" style="margin:35% 0 0 5%">
                                <div class="card-body" >
                                <h3 class="text-center" style="margin:3%" >Payment Details</h3><hr>
                                <p class="text-center">Transaction ID :<?php echo $row['id'];?></p><hr>
                                    <form>
                                        <div class="form-group">
                                            <label class=" col-lg-4">Sender :</label>
                                            <input type="text" class=" col-lg-6" value ="<?php echo $row['from_customer'];?>" id="from_customer" name="from_customer"> <br><br>
                                            <label class=" col-lg-4">Receiver :</label>
                                            <input type="text" class=" col-lg-6" value ="<?php echo $row['to_customer'];?>" id="from_customer" name="from_customer"> <br><br>
                                            <label class=" col-lg-4">Amount :</label>
                                            <input type="number" class="col-lg-6" value ="<?php echo $row['amount'];?>" name="amount" > <br><br>
                                            <hr>
                                            <p class="text-center"><?php echo $date_time;?></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> 
                        </div>
                        <?php
                    }
                }
            }
            
            $newbal = 0;
            $amount = 0;
    }
?>

<?php
    //*********************Contact us***********************/
    $connect = mysqli_connect("localhost", "root", "", "banksystem");
    if(isset($_POST["submit_feedback"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $feedback = $_POST['feedback'];
        $query = "INSERT INTO `contact`( `name`, `email`, `feedback`) 
        VALUES ( '$name', '$email', '$feedback')";
        if(!mysqli_query($connect,$query)) {
            echo '<script>alert("Not inserted. ")</script>';
        }
        else
            echo '<script>alert("Feedback Saved Successfully. ");
                </script>';
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="css/main.css">
        <title>Bank Management System</title>
    </head>
    <body>
        <?php include('navbar.php') ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    </body>
</html>