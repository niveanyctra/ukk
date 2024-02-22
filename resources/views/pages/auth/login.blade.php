<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('login.proccess') }}" method="post">
        @csrf
        <table>
            <tr>
                <td>
                    <input type="text" name="username" placeholder="username">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="password" id="" placeholder="password">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="login">
                </td>
            </tr>
        </table>
    </form>
    <a href="{{ route('register') }}">Belum punya akun?</a>
</body>

</html>
