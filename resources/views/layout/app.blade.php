<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            font-family: monospace;
        }

        .sidebar {
            z-index: 1;
            position: fixed;
            top: 0;
            left: 0;
            width: 160px;
            height: 100%;
            overflow-x: hidden;
            border-right: 1px solid black;
        }

        .sidebar ul {
            margin-top: 100px
        }

        .sidebar li {
            margin-top: 20px;
            list-style: none;
        }

        .sidebar li a {
            text-decoration: none;
            font-size: 20px;
            color: black;
            font-weight: bold;
        }

        main {
            margin-top: 80px;
            margin-left: 300px;
            margin-right: 200px;
        }

        .nav-profile {
            display: flex;
            gap: 20px;
        }

        .nav-item-profile {
            text-decoration: none;
            color: black;
            border: 1px solid;
            padding: 10px 15px;
            border-radius: 10px
        }
    </style>
    @stack('style')
</head>

<body>
    @include('components.sidebar')
    <main>
        @yield('content')
    </main>
    <script src="https://kit.fontawesome.com/4f5ac69095.js" crossorigin="anonymous"></script>
</body>

</html>
