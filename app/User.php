<?php

namespace Blooddivision;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements SluggableInterface
{

    /**
     * use sluggable trait
     */
    
        use SluggableTrait;

    /**
     * use soft deletes trait
     */
    
        use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
        protected $fillable = [
            'name', 'email', 'password', 'active', 'avatar'
        ];

    /**
     * dates attributes
     *
     * @var array
     */

        protected $dates = [ 'deleted_at' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
        protected $hidden = [
            'password', 'remember_token',
        ];

    /**
     * sluggable
     * @var array
     */
    
        protected $sluggable = array(
            'build_from' => 'name',
            'save_to'    => 'slug'
        );
}
