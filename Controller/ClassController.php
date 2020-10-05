<?php
declare(strict_types = 1);

class ClassController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $class = new Classgroup('Ghent Y 3.21');

        //load the view
        require 'View/class.php';
    }
}