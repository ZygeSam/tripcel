<?php
namespace App\Enums;
class TransactionStatus
{
    const INITIATED = 'initiated';
    const PENDING = 'pending';
    const DELIVERED = 'successful';
    // Add more status options as needed

    public static function getConstants()
    {
        $reflectionClass = new \ReflectionClass(__CLASS__);
        return $reflectionClass->getConstants();
    }
}