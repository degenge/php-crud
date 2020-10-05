<?php
declare(strict_types=1);

class Student extends User
{

    public function list(): array
    {
        return $this->databaseConnection->Select('SELECT * FROM student');
    }

}