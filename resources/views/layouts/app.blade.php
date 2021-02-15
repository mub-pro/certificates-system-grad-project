<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>

    
    @yield('content')


    <!-- <script>
        const button = document.getElementById('button');
        const dropdown = document.getElementById('dropdown');
        window.addEventListener('click', function(event) {
            if (!dropdown.classList.contains('hidden')) {
                if (event.target.matches('#button') || event.target.matches('#svg')) {} else {
                    dropdown.classList.add('hidden');
                }
            }
        });

        function dropTheList() {
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
            } else {
                dropdown.classList.add('hidden');
            }
        }
    </script> -->
</body>

</html>