<?php

namespace CodeCommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;

	protected $fillable = ['name', 'description', 'slug'];

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
