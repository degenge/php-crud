<?php
declare(strict_types=1);

class Student extends User
{
    private const TABLE_NAME_STUDENT = 'Student';

    public static function list(): array
    {
        $sql = 'SELECT * FROM student';
        $db = new DatabaseConnection();
        return $db->Select($sql);
    }

    public function create($student): string
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME_STUDENT . '(name_first , name_last, email) values ( :name_first, :name_last, :email )';
        return $this->databaseConnection->Insert($sql, [
            'name_first' => $student->getNameFirst(),
            'name_last'  => $student->getNameLast(),
            'email'      => $student->getEmail(),
        ]);
    }

    public function read($id): array
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME_STUDENT . ' WHERE ID = :id';
        return $this->databaseConnection->Select($sql, [
            'id' => (int)$id,
        ]);
    }

    public function update($student): void
    {
        $sql = 'UPDATE ' . self::TABLE_NAME_STUDENT . ' SET name_first = :name_first, name_last = :name_last, email = :email WHERE id = :id';
        $this->databaseConnection->Update($sql, [
            'id'         => $student->getID(),
            'name_first' => $student->getNameFirst(),
            'name_last'  => $student->getNameLast(),
            'email'      => $student->getEmail(),
        ]);
    }


    public function delete($id): void
    {
        $sql = 'DELETE FROM ' . self::TABLE_NAME_STUDENT . ' WHERE id = :id';
        $this->databaseConnection->Remove($sql, [
            'id' => (int)$id,
        ]);
    }
}