<?php


namespace application\core;


/**
 * Class View
 * @package application\core
 */
class View
{
    // путь по которому лежит View
    /**
     * Path to file template
     * @var string
     */
    public $path;
    // шаблон
    /**
     * layot
     * @var string
     */
    public $layout = 'default';
    // для доступа к route из шаблона(передаем в базовом контроллере)
    /**
     * @var
     */
    public $route;

    /**
     * View constructor.
     * @param $route
     */
    public function __construct($route)
    {
        // определяем маршрут переданный из контролллера
        $this->route = $route;
        // нахоим путь к маршруту
        $this->path = $route['controller'] . '/' . $route['action'];

    }

    /**
     * Render function
     * @param $title
     * @param array $vars
     */
    function render($title, $vars = [])
    {
        extract($vars);

        $pathView = 'application/views/' . $this->path . '.php';
        if (file_exists($pathView)) {
            // перед загрузкой контента запускаем ob_start
            ob_start();
            // подключаем вид
            require $pathView;
            // подгружаем саму вьюху в переменную
            $content = ob_get_clean();
        } else {
            self::errorCode(404, 'View ' . $this->path . ' not found');
        }
        $pathLayout = 'application/views/layouts/' . $this->layout . '.php';

        // подключаем шаблон
        if (file_exists($pathLayout)) {
            require $pathLayout;
        } else {
            self::errorCode(404, 'Layout ' . $this->layout . ' not found');
        }

    }

    /**
     * Show Error with user message
     * @param $code
     * @param string $msg
     */
    public static function errorCode($code, $msg = '')
    {
        $path = 'application/views/errors/' . $code . '.php';
        //Chrome debug  Status Code: 404 Not Found
        http_response_code($code);
        //подключаем файл c ошибкой
        if (file_exists($path)) {
            require $path;
            // выводим сообщение об ошибке (пользовательское)
            echo '<br>' . $msg;
        }
        exit;
    }

    /**
     * Redirect function
     * @param $url
     */
    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }

    /**
     * Return message for JS
     * @param $status
     * @param $message
     */
     public function message($status,$message){
         exit(json_decode(['status'=>$status,'message'=>$message]));
     }

    /**
     * Redirect for JS
     * @param $status
     * @param $message
     */
    public function location($url){
        exit(json_encode(['url'=>$url]));
    }
}