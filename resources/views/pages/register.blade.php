<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('register.proccess') }}" method="post">
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
                    <input type="text" name="nama" placeholder="nama">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email" placeholder="email">
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="alamat" id="" cols="30" rows="10" placeholder="alamat"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="buat">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
