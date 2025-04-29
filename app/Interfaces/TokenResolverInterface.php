<?php

namespace App\Interfaces;

interface TokenResolverInterface
{
    public function getToken(): string;
}
