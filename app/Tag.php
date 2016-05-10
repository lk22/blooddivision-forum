<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	/**
	 * define table to use
	 *
	 * @var $table string
	 */
	
    	protected $table = 'tags';

    /**
     * define fields for mass assignments
     *
     * @var $fillable array
     */
    
    	protected $fillable = [ 'name' ];

    /**
     * define dates attributes
     *
     * @var $dates array
     */
    
    	protected $dates = [ 'deleted_at' ];
}
