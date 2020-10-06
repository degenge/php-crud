<?php
declare(strict_types=1);

class User
{
    protected DatabaseConnection $databaseConnection;
    private $ID;
    private $nameFirst;
    private $nameLast;
    private $email;

    public function __construct(string $nameFirst, $nameLast, $email, $ID = '')
    {
        $this->ID                 = $ID;
        $this->nameFirst          = $nameFirst;
        $this->nameLast           = $nameLast;
        $this->email              = $email;
        $this->databaseConnection = new DatabaseConnection();
    }

    /**
     * @return mixed|string
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @return string
     */
    public function getNameFirst(): string
    {
        return $this->nameFirst;
    }

    /**
     * @return DatabaseConnection
     */
    public function getDatabaseConnection(): DatabaseConnection
    {
        return $this->databaseConnection;
    }

    /**
     * @return mixed
     */
    public function getNameLast()
    {
        return $this->nameLast;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


}