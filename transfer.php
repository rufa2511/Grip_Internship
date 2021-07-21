<!DOCTYPE html>
<html lang="en">
    <?php 
        @session_start();
        if (isset($_SESSION['id'])){
            $id = $_SESSION['id'];
        }
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <title>Bank Management System</title>
    </head>
    
    <body>
    <?php include('navbar.php') ?>

    <!--*************************Selected User Detail**************************-->
    
    <div class="container">
        <h2 class="text-center" style="margin-bottom:7%">Account Details</h2>
        <?php
            echo '<div id="table_align" class="table-responsive">  
            <table class="table table-bordered" >  
                <tr>
                    <th>ID</th>  
                    <th>Name</th>
                    <th>Email</th>  
                    <th>Current Balance</th>  
                </tr>';

                function fetchData(){
                    $connect = mysqli_connect("localhost", "root", "", "banksystem");  
                    $sql = "SELECT * FROM Customers where id='" . $_GET['id'] . "' "; 
                    $output = '';  
                    $result = mysqli_query($connect, $sql);  
                    while($row = mysqli_fetch_array($result)){
                        $output .= '<tr>
                                    <td>'.$row["id"].'</td>
                                    <td id="1">'.$row["name"].'</td>  
                                    <td>'.$row["email"].'</td>  
                                    <td>'.$row["balance"].'</td> 
                                    </tr>';
                    }
                    return $output;
                }
                echo fetchData();  
            echo '</table> </div> <br />';
        ?>

        <!--************************* Transfer Money **************************-->

        
        
        <div class="col-lg-6">
            <h3 style="margin:4%" class="text-center">Transfer Money</h3>
                <div class="card chapterCard" >
                    <div class="card-body" >
                    
                        <form action="insert.php" method="POST">
                        <div class="form-group">
                        <div class="row ">
                            <label class=" col-lg-4">Sender :</label>
                            <input type="text" class="form-control col-lg-8" value ="" id="from_customer" name="from_customer"> <br><br>
                            <!--div class=" col-lg-2"></div-->
                            <label class=" col-lg-4">Receiver :</label>
                            <select class="dropClass form-control col-lg-8" value=" " name="to_customer" required>
                                <option disabled selected>-- Select Receiver --</option>
                                <?php
                                    $connect = mysqli_connect("localhost", "root", "", "banksystem");
                                    $records = mysqli_query($connect, "SELECT name From Customers");  
                                    while($data = mysqli_fetch_array($records)){
                                        echo "<option value='". $data['name'] ."'>" .$data['name'] ."</option>";  // displaying data in option menu
                                    }	
                                ?>  
                            </select>
                            </select><br><br>
                            <!--div class=" col-lg-2"></div-->
                            <label class=" col-lg-4">Amount :</label>
                            <input type="number" class="col-lg-8 form-control" placeholder="Enter amount" autocomplete="off" value ="" name="amount" required> <br><br>
                            <div class=" col-lg-4"></div>
                            <button type="submit" class="btn btnprimary col-lg-4" id="submit_money" name="submit_money">Submit</button>
                            </div>
                            </div>
                        </form>
                    
                </div>
            </div>
        </div>
    
        <div class="col-lg-2">
        </div>
    
        <script>
            var test = document.getElementById('1').innerHTML;
            document.getElementById("from_customer").value = test;
        </script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    </body>
</html>