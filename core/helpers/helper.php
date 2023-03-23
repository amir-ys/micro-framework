<?php

require base_path('core/helpers/constant.php');

function base_path($url): string
{
    return BASE_PATH . DIRECTORY_SEPARATOR . $url;
}

function dump(...$value): void
{
    echo '<pre>';
    echo print_r(...$value) . PHP_EOL;
    echo '</pre>';
}

function dd(...$value): void
{
    dump(...$value);
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

function showMessageInView($name = 'error', $type = 'danger')
{
    if (empty($_SESSION[$name])) {
        return;
    }

    if (count($_SESSION[$name]) > 1) {
        foreach ($_SESSION[$name] as $message):
            echo sprintf("<div class='alert alert-%s'>", $message['type']);
            echo $message['title'];
            if (!empty($message['body'])) {
                echo '<br><small>' . $message['body'] . '</smaall>';
            }
            echo "</div>";
        endforeach;
    } else {
        echo sprintf("<div class='alert alert-%s'>", $_SESSION[$name][0]['type']);
        echo $_SESSION[$name][0]['title'];
        if (!empty($_SESSION[$name][0]['body'])) {
            echo '<br><small>' . $_SESSION[$name][0]['body'] . '</smaall>';
        }
        echo "</div>";
    }
    session_destroy();
}

function newFeedback($title = "عملیات با موفقیت انجام شد.", $type = 'message', $body = '')
{
    $name = $type == "message" ? 'message' : 'error';
    $cssClass = $type == "message" ? 'success' : 'danger';

    $session = $_SESSION[$name] ?? [];
    $session[] = ['title' => $title, 'body' => $body, 'type' => $cssClass];
    $_SESSION[$name] = $session;
}