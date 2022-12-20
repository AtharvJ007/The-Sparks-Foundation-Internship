<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $toUser = $_POST['to'];
    $amnt = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from customers where id=$toUser";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

 if($amnt > $sql1['amount'])
    {
        echo '<script type="text/javascript">';
        echo ' alert("Insufficient Balance")'; 
        echo '</script>';
    }

     else if($amnt == 0){
         echo "<script type='text/javascript'>alert('Enter Amount Greater than Zero');
    </script>";
     }
    else {

        $newCredit = $sql1['amount'] - $amnt;
        $sql = "UPDATE customers set amount=$newCredit where id=$from";
        mysqli_query($conn,$sql);

        $newCredit = $sql2['amount'] + $amnt;
        $sql = "UPDATE customers set amount=$newCredit where id=$toUser";
        mysqli_query($conn,$sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transfers VALUES (rand()*10000,'$sender','$receiver','$amnt')";
        $tns=mysqli_query($conn,$sql);
        if($tns){
           echo "<script type='text/javascript'>
                    alert('Transaction Successful. Please check transaction history for details');
                    window.location='transactions.php'; 
                </script>";
        }
        $newCredit= 0;
        $amnt =0;
    }

}
?>

<!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Transfer</title>

            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

            <style>
                body{
                    background-image: linear-gradient(to bottom right,rgb(115, 200, 229),rgb(243, 243, 127));
                    height:100vh;
                }

                h2{
                    font-size: 2.5rem;
                    font-weight: bold;
                    text-align: center;
                    font-family: Georgia, 'Times New Roman', Times, serif;
                    color: #000000;
                    margin-top:10px;
                }

                label{
                    font-weight: bold;
                    font-family:cursive;
                }

                .option {
                background-color: #c8f3df;
                font-family: cursive;
                }

                select:hover,input:hover{
                    background-color: #c8f3df;
                    cursor: pointer;
                }

                .bttn {
                    display: inline-block;
                    margin: 0 auto;
                    background: #1deb8b;
                    font-size: 16px;
                    padding: 10px 30px;
                    border: none;
                    cursor: pointer;
                    border-radius: 10px;
                    font-weight: bold;
                    transition: 0.6s;
                    font-family: cursive;
                    text-decoration:none;
                }

                .bttn:hover {
                    background: linear-gradient(rgba(11, 61, 210, 0.75), rgba(10, 127, 230, 0.75));
                    color: white;
                    text-decoration:none;
                }

            </style>

        </head>

        <body>
            <div class="nav-container">
                <nav class="navbar navbar-expand-sm navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="/Basic Banking System/logo.png" alt="logo" width="30" height="25"
                            class="d-inline-block align-top">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/Basic Banking System/index.php">Home</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        </div>
                    </div>
                </nav>
            </div> 

            <div class="container divStyle">
                <h2>Transaction here</h2>
                    <?php
                        include 'config.php';
                        $sid=$_GET['id'];
                        $sql = "SELECT * FROM  customers where id=$sid";
                        $query=mysqli_query($conn,$sql);
                        if(!$query)
                        {
                            echo "Error ".$sql."<br/>".mysqli_error($conn);
                        }
                        $rows=mysqli_fetch_array($query);
                    ?>
                <form method="post" name="tamount" class="tabletext" ><br/>
                <label> From: </label><br/>
                <div class="table-responsive-sm ">
                    <table class="table table-success table-striped table-hover align-middle text-center"  >
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Account Balance</th>
                        </tr>
                        <tr>
                            <td><?php echo $rows['id'] ?></td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo $rows['email'] ?></td>
                            <td><?php echo $rows['amount'] ?></td>
                        </tr>
                    </table>
                </div>
                <br/><br/><br/>
                <label>To:</label>
                <select class=" form-control decorated"   name="to" style="margin-bottom:5%; " required>
                    <option value="" disabled selected> </option>
                    <?php
                        include 'config.php';
                        $sid=$_GET['id'];
                        $sql = "SELECT * FROM customers where id!=$sid";
                        $query=mysqli_query($conn,$sql);
                        if(!$query)
                        {
                            echo "Error ".$sql."<br/>".mysqli_error($conn);
                        }
                        while($rows = mysqli_fetch_array($query)) {
                    ?>
                        <option class="option align-middle text-center" value="<?php echo $rows['id'];?>" >

                            <?php echo $rows['name'] ;?>

                        </option>
                    <?php
                        }
                    ?>
                </select> <br/><br/><br/>
                    <label>Amount:</label>
                    <input type="number" id="amm" class="form-control align-middle text-center" name="amount" min="0" required  />  <br/><br/>
                        <div class="text-center btn3" >
                    <button class="bttn" name="submit" type="submit" id="myBtn">Proceed</button>
                    </div>
                </form>
            </div>

        </body>
    </html>
