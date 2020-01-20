<?php declare(strict_types=1);

class Controller {
    private $request;

    public function __construct()
    {
        session_start();
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet(): bool
    {
        return $this->request === 'GET';
    }

    protected function isPost(): bool
    {
        return $this->request === 'POST';
    }

    protected function render(string $template = null, array $variables = [])
    {
        $templatePath = $template ? dirname(__DIR__).'/views/'.get_class($this).'/'. $template.'.php' : '';
        //$templatePath = $template ? dirname(__DIR__) . '/views/' . $template.'.php' : '';
        $output = 'File not found';

        if(file_exists($templatePath)){
            extract($variables);

            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }
    protected function checkSession()
    {
        if(!isset($_SESSION['id']) && !isset($_SESSION['idPlace'])){
            $url = "http://$_SERVER[HTTP_HOST]/kelner/";
            header("Location: {$url}");
            return;
        }
    }
    protected function mainPage(){
        $url = "http://$_SERVER[HTTP_HOST]/kelner/";
        header("Location: {$url}");
        return;
    }
}