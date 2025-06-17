<?php

namespace App\Controller;

use App\Domain\DefaultDomain;

class DefaultController
{
    protected $domain;

    public function __construct()
    {
        $this->domain = new DefaultDomain();
    }

    public function index()
    {
        return $this->domain->getDefaultResponse();
    }
}