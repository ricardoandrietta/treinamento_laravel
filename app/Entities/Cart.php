<?php

namespace CodeCommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Cart extends Model implements Transformable
{
    use TransformableTrait;

	private $items;
}
