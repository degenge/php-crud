<?php
declare(strict_types=1);

class User
{
    private $nameFirst;
    private $nameLast;
    private $email;
    protected DatabaseConnection $databaseConnection;

    public function __construct(string $nameFirst, $nameLast, $email)
    {
        $this->nameFirst = $nameFirst;
        $this->nameLast  = $nameLast;
        $this->email     = $email;
        $this->databaseConnection = new DatabaseConnection();
    }

    public function getName(): string
    {
        return $this->nameFirst . ' ' . $this->nameLast;
    }
}