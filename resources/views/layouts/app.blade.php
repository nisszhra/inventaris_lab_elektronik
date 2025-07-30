<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Inventaris Lab Elektronik' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @fluxStyles {{-- <=== Tambahkan ini untuk CSS Flux --}}
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen">
        {{ $slot }}
    </div>

    @fluxScripts {{-- <=== Tambahkan ini untuk JS Flux --}}
</body>
</html>
