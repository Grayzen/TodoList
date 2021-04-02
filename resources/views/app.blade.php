<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Workflow 8') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>
            html,
            body {
              height: 100%;
            }

            @media (min-width: 640px) {
              table {
                display: inline-table !important;
              }

              thead tr:not(:first-child) {
                display: none;
              }
            }

            td:not(:last-child) {
              border-bottom: 0;
            }

            th:not(:last-child) {
              border-bottom: 2px solid rgba(0, 0, 0, .1);
            }
          </style>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
