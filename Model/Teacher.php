<?php
declare(strict_types=1);

class Teacher extends User
{

    private const TABLE_NAME_TEACHER = 'teacher';
    private const TABLE_NAME_TEACHER_CLASSGROUP = 'class_teacher';

    /**
     * Student constructor.
     * @param string $nameFirst
     * @param string $nameLast
     * @param string $email
     * @param string $ID
     */
    public function __construct(string $nameFirst, string $nameLast, string $email, string $ID = '')
    {
        parent::__construct($nameFirst, $nameLast, $email, $ID);
    }

    public static function list(): array
    {
        $sql = 'SELECT ID, name_first, name_last, email FROM ' . self::TABLE_NAME_TEACHER;
        //$sql = 'SELECT s.ID, name_first, name_last, email, c.name AS className FROM ' . self::TABLE_NAME_TEACHER . ' AS s LEFT OUTER JOIN class AS c ON s.classID = c.ID';
        $db = new DatabaseConnection();
        return $db->Select($sql);
    }

    public function create($teacher): string
    {
        $sql          = 'INSERT INTO ' . self::TABLE_NAME_TEACHER . '(name_first , name_last, email) values ( :name_first, :name_last, :email)';
        $lastInsertId = $this->databaseConnection->Insert($sql, [
            'name_first' => $teacher->getNameFirst(),
            'name_last'  => $teacher->getNameLast(),
            'email'      => $teacher->getEmail(),
        ]);
        return $lastInsertId;
    }

    public function createTeacherClassgroup($classID, $teacherID): string
    {
        $sql          = 'INSERT INTO ' . self::TABLE_NAME_TEACHER_CLASSGROUP . '(classID , teacherID) values ( :classID, :teacherID)';
        $lastInsertId = $this->databaseConnection->Insert($sql, [
            'classID'   => $classID,
            'teacherID' => $teacherID,
        ]);
        return $lastInsertId;
    }

    public static function getTeacherClassgroup($teacherID): array
    {
        $sql = 'SELECT c.id, c.name FROM ' . self::TABLE_NAME_TEACHER_CLASSGROUP . ' AS ct INNER JOIN class c on ct.classID = c.ID WHERE ct.teacherID = :teacherID';
        $db = new DatabaseConnection();
        return $db->Select($sql, [
            'teacherID' => $teacherID,
        ]);

    }

    public function read($id): array
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME_TEACHER . ' WHERE ID = :id';
        return $this->databaseConnection->Select($sql, [
            'id' => (int)$id,
        ]);
    }

    public function update($teacher): void
    {
        $sql = 'UPDATE ' . self::TABLE_NAME_TEACHER . ' SET name_first = :name_first, name_last = :name_last, email = :email WHERE id = :id';
        $this->databaseConnection->Update($sql, [
            'id'         => $teacher->getID(),
            'name_first' => $teacher->getNameFirst(),
            'name_last'  => $teacher->getNameLast(),
            'email'      => $teacher->getEmail(),
        ]);
    }


    public function delete($id): void
    {
        //DELETE CLASSGROUP FIRST
        $this->deleteClassgroup($id);
        $sql = 'DELETE FROM ' . self::TABLE_NAME_TEACHER . ' WHERE id = :id';
        $this->databaseConnection->Remove($sql, [
            'id' => (int)$id,
        ]);
    }

    public function deleteClassgroup($teacherID): void
    {
        $sql = 'DELETE FROM ' . self::TABLE_NAME_TEACHER_CLASSGROUP . ' WHERE teacherID = :id';
        $this->databaseConnection->Remove($sql, [
            'id' => (int)$teacherID,
        ]);
    }
}