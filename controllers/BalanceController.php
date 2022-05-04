<?php

class BalanceController
{



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



