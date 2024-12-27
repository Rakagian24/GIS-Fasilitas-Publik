<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Datum | CRM Admin Dashboard Template</title>

    <!-- Favicon -->
    {{-- <link rel="shortcut icon" href="images/favicon.ico" /> --}}
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" /> --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.awesome-markers@2.0.5/dist/leaflet.awesome-markers.css">
    {{-- <link rel="stylesheet" href="css/backend-plugin.min.css">
    <link rel="stylesheet" href="css/backend.css?v=1.0.0"> --}}
    <link rel="stylesheet" href="{{ asset('css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }}">
    <style>
        #map {
            width: 70%;
            height: 500px;
        }
    </style>
</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
