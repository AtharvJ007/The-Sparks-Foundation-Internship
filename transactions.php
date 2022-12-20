<!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User list</title>

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
                    text-align: center;
                    margin-top:1.5rem;
                    margin-bottom:1.5rem;
                    font-family: 'Roboto Slab', serif;
                    font-size:3rem;
                }

                .table-light{
                    font-size:1.2rem;
                    font-family:cursive;
                }

                .table {
                    border-radius: 5px;
                }
                th:first-of-type {
                    border-top-left-radius: 5px;
                }
                th:last-of-type {
                    border-top-right-radius: 5px;
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
                <h2>Transaction Summary</h2>

                <br>
                <div class="table-responsive-sm">
                <table class="table table-dark table-striped table-hover align-middle text-center" >
                    <thead class="table-light">
                        <tr>
                            <th>Trans Id</th>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Amount Transferred</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        include 'config.php';

                        $sql ="select * from transfers";

                        $query =mysqli_query($conn, $sql);
                        $transid=10000;

                        while($rows = mysqli_fetch_array($query))
                        {
                    ?>
                        <tr>
                        <td><?php echo $rows['id']; ?></td>
                        <td><?php echo $rows['fromuser']; ?></td>
                        <td><?php echo $rows['touser']; ?></td>
                        <td><?php echo $rows['transamount']; ?> </td>

                    <?php
                        }

                    ?>
                    </tbody>
                </table>

                </div>
            </div>

        </body>
    </html>