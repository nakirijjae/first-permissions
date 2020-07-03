<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * selecting from the products table.
     *
     * @var string
     */
    protected $table = 'products';
}
