<?php

namespace App\Manager;

abstract class BaseManager
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
}