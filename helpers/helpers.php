<?php

use Core\Response;

require base_path('Helpers/constant.php');

function base_path($url): string
{
    return BASE_PATH . DIRECTORY_SEPARATOR . $url;
}

function dump(...$value): void
{
    echo '<pre>';
    echo var_dump($value) . PHP_EOL;
    echo '</pre>';
}

function dd(...$value): void
{
    dump($value);
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

function view($view, $attribute = [])
{
    extract($attribute);
    return require base_path('views' . DIRECTORY_SEPARATOR . trim("$view.view.php", ' /'));
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    if (file_exists(base_path("/views/errors/$code.view.php"))) {
        return view("errors/$code");
    } else {
        return view("errors/" . Response::NOT_FOUND);
    }
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

function back()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

function showMessageInView()
{
    $feedbacks = ['success_feedback', 'error_feedback', 'validation_feedback'];
    if (empty($_SESSION[$feedbacks[0]]) && empty($_SESSION[$feedbacks[1]]) && empty($_SESSION[$feedbacks[2]])) {
        return;
    }

    foreach ($feedbacks as $feedback) {
        if (isset($_SESSION[$feedback]) && count($_SESSION[$feedback]) > 1) {
            foreach ($_SESSION[$feedback] as $message):
                echo sprintf("<div class='alert alert-%s'>", $message['type']);
                echo $message['title'];
                if (!empty($message['body'])) {
                    echo '<br><small>' . $message['body'] . '</smaall>';
                }
                echo "</div>";
            endforeach;
        } else {
            if (isset($_SESSION[$feedback])) {
                echo sprintf("<div class='alert alert-%s'>", $_SESSION[$feedback][0]['type']);
                echo $_SESSION[$feedback][0]['title'];
                if (!empty($_SESSION[$feedback][0]['body'])) {
                    echo '<br><small>' . $_SESSION[$feedback][0]['body'] . '</smaall>';
                }
                echo "</div>";
            }
        }
    }

    session_destroy();
}

function feedback($name, $title, $type, $body)
{
    $session = $_SESSION[$name] ?? [];
    $session[] = ['title' => $title, 'body' => $body, 'type' => $type];
    $_SESSION[$name] = $session;
}

function successFeedback($title = "عملیات با موفقیت انجام شد.", $body = '')
{
    feedback('success_feedback', $title, 'success', $body);
}

function errorFeedback($title = "عملیات ناموفق.", $body = '')
{
    feedback('error_feedback', $title, 'danger', $body);
}

function validationFeedback($title, $body = null)
{
    feedback('validation_feedback', $title, 'danger', $body);
}


function hasAnyFeedback($type = 'error')
{
    $type = $type . '_feedback';
    if (isset($_SESSION[$type]) && count($_SESSION[$type]) > 0) {
        return true;
    }
    return false;
}

function request(): \Core\Request
{
    return $GLOBALS["request"];
}

function now(): string
{
   return date('Y-m-d H:i:s');
}