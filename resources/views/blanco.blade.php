<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">

    </div>
    <div>
        <label>Lista de inner join</label>

        <ul>
        @foreach($categorias->products as $productos)
            <li>
                {{$productos->nombre}}
   
            </li>
        @endforeach
        </ul>
    </div>
</body>
</html>