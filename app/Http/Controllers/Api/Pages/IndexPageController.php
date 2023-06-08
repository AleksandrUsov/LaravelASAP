<?php

namespace App\Http\Controllers\Api\Pages;

use App\Http\Controllers\Controller;
use App\Http\Resources\Pages\IndexPageResource;

class IndexPageController extends Controller
{
    public function __invoke()
    {
        return new IndexPageResource();
    }
}
