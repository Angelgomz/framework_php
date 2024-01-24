<?php
use App\Http\Response;
if(!function_exists('view')){
    function view($data){
      return new Response($data);
    }
}
if (!function_exists('viewPath')){
    function viewPath($view, $data = [])
    {
        return __DIR__ . "/../views/$view.php";
    }
}