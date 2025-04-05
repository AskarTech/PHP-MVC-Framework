<?php
function show($stuff){
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}
function splitURL(){
    $URL=$_GET['url']?? 'home';
    $URL=trim($URL,'/');
    $URL=explode('/',$URL);
    return $URL;
}

function loadController()
{
    $URL=splitURL();
    $controllerName=ucfirst($URL[0]).'Controller';
    $controllerPath='../app/controllers/'.$controllerName.'.php';
    if(file_exists($controllerPath)){
        require_once $controllerPath;
        
    }else{
        $controllerPath='../app/controllers/404.php';
        require_once $controllerPath;
    }

}
loadController();
// function loadView($viewName,$data=[]){
//     $viewPath='views/'.$viewName.'.php';
//     if(file_exists($viewPath)){
//         require_once $viewPath;
//     }else{
//         echo "View not found";
//     }
// }
// function loadController($controllerName,$methodName,$params){
//     $controllerName=ucfirst($controllerName).'Controller';
//     $controllerPath='controllers/'.$controllerName.'.php';
//     if(file_exists($controllerPath)){
//         require_once $controllerPath;
//         $controller=new $controllerName;
//         if(method_exists($controller,$methodName)){
//             call_user_func_array([$controller,$methodName],$params);
//         }else{
//             echo "Method not found";
//         }
//     }else{
//         echo "Controller not found";
//     }
// }
// function loadModel($modelName){
//     $modelName=ucfirst($modelName).'Model';
//     $modelPath='models/'.$modelName.'.php';
//     if(file_exists($modelPath)){
//         require_once $modelPath;
//         return new $modelName;
//     }else{
//         echo "Model not found";
//     }
// }