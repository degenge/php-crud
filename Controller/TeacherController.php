<?php
declare(strict_types = 1);

class TeacherController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST)
    {
        $teacher = new Teacher('Jane', 'The Teacher', 'jane.theteacher@test.com');

        //load the view
        require 'View/teacher.php';
    }
}