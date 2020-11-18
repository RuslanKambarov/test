<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <table>        
            <tr>
                <form action="{{route('product.destroy', $product->id)}}" method="post">
                @csrf
                @method('DELETE')
                <td>{{$product->title}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->eId}}</td>
                <td>
                    <input type="submit" value="delete">
                </td>
                </form>
            </tr>
        
        </table>
    </body>
</html>
