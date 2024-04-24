<?php
// gak pakai
class Flasher
{
    public static function setFlash($subject, $message, $action, $href)
    {
        $_SESSION['flash'] = [
            'subject' => $subject,
            'message' => $message,
            'action' => $action,
            'href' => $href
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo "
            <script> 
                alert('{$_SESSION['flash']['subject']} {$_SESSION['flash']['message']} {$_SESSION['flash']['action']}!');
                document.location.href = '{$_SESSION['flash']['href']}';
            </script>";
            unset($_SESSION['flash']);
        }
    }
}
