<?php
declare(strict_types = 1);

class StudentController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $student = new Student('John', 'Doe', 'john.doe@test.com');

        //load the view
        require 'View/student.php';
    }
}