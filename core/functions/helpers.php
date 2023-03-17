<?php

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
    return  CURRENT_DOMAIN . $_SERVER['REQUEST_URI'];
}

function url($url): string
{
    $domain = trim(CURRENT_DOMAIN, '/');
    return $domain . '/' . trim($url, '/');
}

function asset($url): string
{
    $domain = trim(CURRENT_DOMAIN, '/');
    return $domain . '/template/' . trim($url, '/');
}

function view($view): string
{
    return $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . trim($view, '/ ');
}

function isUrl($url) :int
{
    return $_SERVER['REQUEST_URI'] == $url;
}