<?php
declare(strict_types=1);

class Classgroup
{

    private const TABLE_NAME_CLASS = 'class';

    private DatabaseConnection $databaseConnection;
    private $ID;
    private string $name;
    private string $location;

    /**
     * Classgroup constructor.
     * @param string $name
     * @param $location
     * @param string $ID
     */
    public function __construct(string $name, $location, $ID = '')
    {
        $this->ID                 = $ID;
        $this->name               = $name;
        $this->location           = $location;
        $this->databaseConnection = new DatabaseConnection();
    }

    public static function list(): array
    {
        $sql = 'SELECT ID, name, location FROM ' . self::TABLE_NAME_CLASS;
        $db  = new DatabaseConnection();
        return $db->Select($sql);
    }

    public function create($class): string
    {
        $sql = 'INSERT INTO ' . self::TABLE_NAME_CLASS . '(name , location) values ( :name, :location)';
        return $this->databaseConnection->Insert($sql, [
            'name'     => $class->getName(),
            'location' => $class->getLocation(),
        ]);
    }

    public function read($id): array
    {
        $sql = 'SELECT * FROM ' . self::TABLE_NAME_CLASS . ' WHERE ID = :id';
        return $this->databaseConnection->Select($sql, [
            'id' => (int)$id,
        ]);
    }

    public function update($class): void
    {
        $sql = 'UPDATE ' . self::TABLE_NAME_CLASS . ' SET name = :name, location = :location WHERE id = :id';
        $this->databaseConnection->Update($sql, [
            'id'       => $class->getID(),
            'name'     => $class->getName(),
            'location' => $class->getLocation(),
        ]);
    }

    public function delete($id): void
    {
        $sql = 'DELETE FROM ' . self::TABLE_NAME_CLASS . ' WHERE id = :id';
        $this->databaseConnection->Remove($sql, [
            'id' => (int)$id,
        ]);
    }

    /**
     * @return string
     */
    public function getID(): string
    {
        return $this->ID;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}