<?php

namespace App\Services\AbstractClasses;


interface PostOffice
{
    public function createDelivery(array $data): string;
}
