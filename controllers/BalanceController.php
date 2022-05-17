<?php

class BalanceController
{

    public function process_login()
    {
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];

        if ($user == "admin" && $pwd == "admin") {
            setcookie("password", 9999, time() + 1200);
        }

        header('Location: index.php');
    }

    public function login()
    {

        $title = 'Bilancio Facile | login';

        ob_start();

        include __DIR__ . '/../templates/login.html.php';

        $output = ob_get_clean();

        return [
            'output' => $output,
            'title' => $title
        ];
    }


    public function home()
    {

        $title = 'Bilancio Facile';

        ob_start();

        include __DIR__ . '/../templates/home.html.php';

        $output = ob_get_clean();

        return [
            'output' => $output,
            'title' => $title
        ];
    }



    public function start()
    {

        $title = 'Bilancio Facile | Nuovo Bilancio';

        ob_start();

        include __DIR__ . '/../templates/start.html.php';

        $output = ob_get_clean();

        return [
            'output' => $output,
            'title' => $title
        ];
    }
}
