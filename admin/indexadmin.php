<head>
        <meta http-equiv="Content-Type" content="text/html;charset=iso-8859-2">
        <title>Magazin haine</title>

        <style type="text/css">
            body, p, td {
                font-family: Verdana, Arial, sans-serif;
                font-size: 18px;
            }
            h1 {
                font-family: Arial Black, Times, serif;
                font-size: 20px;
                font-weight: bold;
                color: #336699;
                font-style: italic;
            }
            .titlu {
                font-family: Verdana, Arial, sans-serif;
                font-size: 14px;
                font-weight: bold;
                color: #0066CC;
            }
        </style>
    </head>
    <body bgcolor="#ffffff">
        <a href="index.php"><img src="../img/logo.jpg"></a>
        <h1>Autentificare</h1>
        <form action="login.php" method="POST">
            <table>
                <tr>
                    <td align="right">Nume: </td>
                    <td><input type="text" name="nume"></td>
                </tr>
                <tr>
                    <td align="right">Parola: </td>
                    <td><input type="password" name="parola"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Autentificare"></td>
                </tr>
            </table>
        </form>
    </body>
</html>