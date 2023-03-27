<?php 
namespace App;

use App\Controllers\HomeController;
use App\Controllers\ClientsController;

class App {

    public static function process()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($url);
        
        return self::router($url);
        

    }


    private static function router(array $url)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'GET' && count($url) == 1 && $url[0] === ''){
            return (new HomeController)->home();
        }

        if ($method == 'GET' && count($url) == 2 && $url[0] === 'clients' && $url[1] === 'create'){
            return (new ClientsController)->create();
        }

        if ($method == 'POST' && count($url) == 2 && $url[0] === 'clients' && $url[1] === 'create'){
            return (new ClientsController)->store();
        }

        if ($method == 'GET' && count($url) == 1 && $url[0] === 'clients'){
            return (new ClientsController)->index();
        }

        if ($method == 'GET' && count($url) == 3 && $url[0] === 'clients' && $url[1] === 'show'){
            return (new ClientsController)->show($url[2]);
        }

        if ($method == 'GET' && count($url) == 3 && $url[0] === 'clients' && $url[1] === 'edit') {
            return (new ClientsController)->edit($url[2]);
        }

        if ($method == 'POST' && count($url) == 3 && $url[0] === 'clients' && $url[1] === 'edit') {
            return (new ClientsController)->update($url[2]);
        }

        else {
            return '<h1>404 PAGE NOT FOUND</h1>';
        }
    }

    public static function views($template, $data = [])
    {
        $path = __DIR__ . '/../views/';
        extract($data);

        ob_start();
        require $path . 'top.php';
        require $path . $template . '.php'; 
        require $path . 'bottom.php';
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
    
    public static function redirect($url)
    {
      header('Location:' . URL . $url);
      return '';
    }
}