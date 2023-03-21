<?php

require base_path('core/helpers/constant.php');

function base_path($url): string
{
    return BASE_PATH . DIRECTORY_SEPARATOR . $url;
}

function dd($value): void
{
    echo '<pre>';
    echo print_r($value, true) . PHP_EOL;
    echo '</pre>';

    die();
}

function protocol(): string
{
    return strpos('https', $_SERVER['SERVER_PROTOCOL']) ? 'https://' : 'http://';
}

function currentDomain(): string
{
    return protocol() . $_SERVER['HTTP_HOST'];
}

function currentUrl(): string
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function isUrl($url): int
{
    return $_SERVER['REQUEST_URI'] == $url;
}

function asset($url): string
{
    return currentDomain() . DS . 'template' . DS . $url;
}

function view($view, $attribute = []): string
{
    extract($attribute);
    return base_path('views' . DS . trim($view, ' /'));
}

function abort($code = 404){
    http_response_code($code);
    $error = view("errors/$code.view.php");
    if (file_exists($error)){
        require $error;
    }else {
        require view("errors/404.view.php");
    }
    die();
}

function authorize($condition){
    if ($_GET['id'] == 1){
        abort(Response::FORBIDDEN);
    }
}