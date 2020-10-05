<?php
declare(strict_types=1);

class User
{
    private $nameFirst;
    private $nameLast;
    private $email;

    public function __construct(string $nameFirst, $nameLast, $email)
    {
        $this->nameFirst = $nameFirst;
        $this->nameLast  = $nameLast;
        $this->email     = $email;
    }

    public function getName(): string
    {
        return $this->nameFirst . ' ' . $this->nameLast;
    }
}