<?php

use App\Services\SvgSprite;
use Illuminate\Support\Facades\App;

$is_production = App::environment('production');
$icons_sprite = SvgSprite::make(public_path("icons"), 'icon-');

$title = (isset($title) ? ($title . ' | ') : '') . 'Requests';

?><!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no, minimal-ui">
        <meta name="apple-mobile-web-app-capable" content="yes">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{ $is_production ? mix('css/app.css') : '/' . 'css/app.css' . uniqid('?') }}">
    </head>
    <body>

        {!! $icons_sprite !!}

        <div id="app">
            <router-view></router-view>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue{{ $is_production ? '.min' : '' }}.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.1/vue-router.min.js"></script>
        <script src="{{ $is_production ? mix('/js/app.js') : '/js/app.js' . uniqid('?') }}"></script>
    </body>
</html>
