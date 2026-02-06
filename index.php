<?php
    session_start();

    require_once __DIR__. '/config/database.php';

    //index.php?ctl=home&act=recently_deleted
    $ctl = $_GET['ctl'] ?? 'home';

    $act = $_GET['act'] ?? 'home'; 
    //public function recently_deleted()
    
    $controllerFile = __DIR__ .'/controller/' .ucfirst($ctl) . 'Controller.php'; 
    // controller/HomeController.php
    
    $controllerClass = ucfirst($ctl) . 'Controller'; 
    // class NoteController 

    if(file_exists($controllerFile)){
        require_once $controllerFile;

        if(class_exists($controllerClass)){
            $controller = new $controllerClass;

            if(method_exists($controller, $act)){
                $controller -> $act();
            }else{
                echo "Khong tim thay action $act";
            }
            
        }else{
            echo "Khong tim thay class $controllerClass trong file $controllerFile";
        }

    }else{
        echo "Khong tim thay file $controllerFile";
    }
?>