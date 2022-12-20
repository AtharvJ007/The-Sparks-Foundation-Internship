<!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home</title>

            <!-- CSS only -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
            
            <style>
                body{
                    background-image: url(bgimg.png);
                    background-repeat:no-repeat;
                    background-size:cover;
                }
                .main-container{
                    width: 100%;
                    height: 46rem;
                    display: flex;
                    justify-content: space-around;
                    margin: auto;
                }

                .sub-container{
                    margin: 0;
                    position: absolute;
                    top: 50%;
                    -ms-transform: translateY(-50%);
                    transform: translateY(-50%);
                }

                h2{
                    font-size: 3rem;
                    font-weight: bold;
                    text-align: center;
                    font-family: Georgia, 'Times New Roman', Times, serif;
                    color: black;
                }

                p{
                    margin-top: 1.1rem;
                    margin-bottom: 1.1rem;
                    font-size: 1.5rem;
                    /* font-weight: bold; */
                    text-align: center;
                    color: brown;
                    font-family: cursive;
                }
                
                .buttons {
                    text-align: center;
                }

                .v-btn,.t-btn {
                    display: inline-block;
                    margin: 7px;
                    background-color: blueviolet;
                    color: white;
                    border: solid black 0.031px;
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

                .v-btn:hover,.t-btn:hover {
                    background: linear-gradient(rgba(11, 61, 210, 0.75), rgba(10, 127, 230, 0.75));
                    color: yellow;
                    text-decoration:none;
                }

                .v-btn{
                    margin-left:13rem;
                }

                @media only screen and (max-width:700px) {

                    h2{
                        font-size: 2.2rem;
                    }
                    p{
                        font-size: 1rem;
                    }
                    .v-btn,.t-btn{
                         display:grid;
                         width:51%;
                         margin:auto;
                         margin-bottom: 5px;
                    }
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
                            <a class="nav-link active home" aria-current="page" href="/Basic Banking System/index.php">Home</a>
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
            <div class="main-container">
                <div class="sub-container">
                <h2>Welcome to AJ's Banking System</h2>
                <p>Please perform the required operation</p>
                <div class="butns">
                    <a href="viewusers.php" class="v-btn" role="button">Transfer amount</a>
                    <a href="transactions.php" class="t-btn" role="button">View transactions</a>
                </div>
                </div>
            </div>
                

        </body>
    </html> 