<?php
declare(strict_types=1);

class Student extends User
{
    private const TABLE_NAME_STUDENT = 'Student';
    private int $class;

    /**
     * Student constructor.
     * @param string $nameFirst
     * @param string $nameLast
     * @param string $email
     * @param string $classID
     * @param string $ID
     */
    public function __construct(string $nameFirst, string $nameLast, string $email, $classID, string $ID = '')
    {
        parent::__construct($nameFirst, $nameLast, $email, $ID);
        $this->class = (int)$classID;
    }

    public static function list(): array
    {
        $sql = 'SELECT s.ID, name_first, name_last, email, c.name AS className FROM ' . self::TABLE_NAME_STUDENT . ' AS s LEFT OUTER JOIN class AS c ON s.classID = c.ID';
        $db  = new DatabaseConnection();
        return $db->Select($sql);
    }

    public function create($student): string
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME_STUDENT . '(name_first , name_last, email, classID) values ( :name_first, :name_last, :email, :classID)';
        return $this->databaseConnection->Insert($sql, [
            'name_first' => $student->getNameFirst(),
            'name_last'  => $student->getNameLast(),
            'email'      => $student->getEmail(),
            'classID'    => $this->class,
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
        $sql = 'UPDATE ' . self::TABLE_NAME_STUDENT . ' SET name_first = :name_first, name_last = :name_last, email = :email, classID = :classID WHERE id = :id';
        $this->databaseConnection->Update($sql, [
            'id'         => $student->getID(),
            'name_first' => $student->getNameFirst(),
            'name_last'  => $student->getNameLast(),
            'email'      => $student->getEmail(),
            'classID'    => $this->class,
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