<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #0d1117;
            margin: 0;
        }

        .card {
            background: #161b22;
            border: 1px solid #1f6feb;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            color: white;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px 5px #1f6feb;
        }

        .card a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 1rem;
            height: 100%;
        }

        .card a:hover {
            text-decoration: none;
        }

        .card-title {
            font-weight: bold;
        }

        .card-description {
            font-size: 14px;
        }

        .container {
            width: 80%;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <a href="#">
                        <h5 class="card-title">Manage Roles & Permissions (Per user)</h5>
                        <p class="card-description">Here you can manage roles and permissions for each users.</p>
                    </a>
                </div>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <a href="#">
                        <h5 class="card-title">Our Users</h5>
                        <p class="card-description">Here you can see all the users associated with the application.</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <a href="#">
                        <h5 class="card-title">Roles</h5>
                        <p class="card-description">Here you can see all the roles associated with the application.</p>
                    </a>
                </div>
            </div>
            <div class="col col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card">
                    <a href="#">
                        <h5 class="card-title">Permissions</h5>
                        <p class="card-description">Here you can see all the permissions associated with the application.</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="card">
                    <a href="#">
                        <h5 class="card-title">Telescope</h5>
                        <p class="card-description">Access all Metrices of your Backend.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
