<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Documento</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        body > div:first-child {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        h1 {
            width: 100%;
            text-align: center;
        }

        body > div:last-child > h2 {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <div>
        <h1>{{ $objetoAtual->titulo }}</h1>
        <x-markdown>{!! $objetoAtual->descricao !!}</x-markdown>
    </div>
    <div>
        @foreach ($textos as $texto)
            <h2>{{ $texto->texto->titulo }}</h2>
            <x-markdown>{!!$texto->texto->descricao !!}</x-markdown>
        @endforeach
    </div>
</body>

</html>
