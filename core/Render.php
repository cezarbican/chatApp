<?php

namespace chatapp\core;

/**
 * Render
 */
class Render{
    
    /**
     * renderView
     *
     * @param  mixed $view
     * @param  mixed $params
     * @return void
     */
    public function renderView($view, $params = null) : void
    {
        if($params){
            foreach($params as $key => $value){
                $$key = $value;
            }
        }
        require_once "../templates/views/$view.php";
    }
    
    /**
     * renderLayout
     *
     * @param  mixed $layout
     * @return void
     */
    public function renderLayout($layout = null) : void
    {
        if($layout){
            require_once "../templates/layouts/$layout.php";
        }else{
            require_once "../templates/layouts/main.php";
        }
    }
    
    /**
     * render
     *
     * @param  mixed $view
     * @param  mixed $title
     * @param  mixed $params
     * @param  mixed $layout
     * @return string
     */
    public function render($view, $title, $params = null, $layout = null) : string
    {
        ob_start();
        $this->renderLayout($layout);
        $layoutBuffer = ob_get_clean();
        $layoutBuffer = str_replace('{{TITLE}}', $title, $layoutBuffer);

        ob_start();
        $this->renderView($view, $params);
        $viewBuffer = ob_get_clean();
        
        return str_replace('{{CONTENT}}', $viewBuffer, $layoutBuffer);
    }
}