<!DOCTYPE html>
<html>
    <head>
        <title>YesCAN.com</title>
        <style type='text/css'>
                table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>{{ $details['title'] }}</h1>
        <p>Listado de Provincias Registradas</p>       
        <table>
            <tr>
                <th>Provincia</th>
            </tr>
            @foreach ($details['body'] as $provincia)
            <tr>
                <td>{{ $provincia->nombre_provincia }}</td>                
            </tr>
            @endforeach
         </table>
    </body>
</html>