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

function method()
{
    return $_SERVER['REQUEST_METHOD'];
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

function abort($code = 404)
{
    http_response_code($code);
    $error = view("errors/$code.view.php");
    if (file_exists($error)) {
        require $error;
    } else {
        require view("errors/404.view.php");
    }
    die();
}

function authorize($condition)
{
    if ($condition) {
        abort(Response::FORBIDDEN);
    }
}

function redirect($path)
{
    header('Location: ' . currentDomain() . DIRECTORY_SEPARATOR . trim($path, '/'));
    die();
}

function showMessageInView($name = 'errors', $type = 'danger')
{
    if (!empty($_SESSION[$name])) :
        echo sprintf("<div class='alert alert-%s'>" , $type);
        echo $_SESSION[$name];
        session_destroy();
        echo "</div>";
    endif;
}

function newFeedback($message)
{
    $_SESSION['message'] = $message;
}