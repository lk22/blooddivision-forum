<?php

namespace Blooddivision;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use \Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;

use Eloquence\Database\Traits\UUIDModel;

class Thread extends Model implements SluggableInterface
{
	/**
	 * sluggable trait
	 */
   
	  use SluggableTrait;

	/**
	 * soft deletes trait
	 */

	  use SoftDeletes;

	/**
	 * use uuid trait
	 */

	  // use UUIDModel { boot as bootuuid; }

	/**
	 * define table
	 *
	 * @var $table string
	 */
   
      	protected $table = 'threads';

	/**
	 * define fields for mass assignment
	 *
	 * @var $fillable array
	 */
   
	  protected $fillable = [ 'name', 'user_id' ];

	/**
	 * define guarded files 
	 *
	 * @var $guarded array
	 */

	  protected $guarded = [ 'id' ];

	/**
	 * define dates
	 *
	 * @var $dates array
	 */

	  protected $dates = [ 'deleted_at' ];

	/**
	 * booting
	 */
	// protected static function boot(){
	// 	parent::bootuuid();
	// }
      
      /**
       * Relationships
       */

      	/**
      	 * belongs to many users
      	 *
      	 * @return <type>
      	 */
         
         	public function users(){
         		return $this->belongsToMany('Blooddivision\User');
         	}

      	/**
      	 * has many posts
      	 *
      	 * @return <type>
      	 */

         	public function posts(){
         		return $this->hasMany('Blooddivision\Post');
   	     }

      /**
       * Mutators
       */
      
         /**
          * deleted at attribute
          */
      
            /**
             * Set the deleted at attribute.
             */
         
               public function setDeletedAtAttribute(){
                  $this->attributes['deleted_at'] = (new Carbon())->format('Y-m-d');
               }

            /**
             * Get the deleted at attribute.
             *
             * @return     <type>
             */

               public function getDeletedAtAttribute($value){
                  return $this->value;
               }

         /**
          * name attribute
          */
         
            /**
             * Get the name attribute.
             *
             * @param      <type>  $value  (description)
             *
             * @return     <type>
             */

               public function getNameAttribute($value){
                  return $value;
               }

         /**
          * Scopes
          */
         
            /**
             * order by
             */
            
               public function scopeOrderBy($query, $field, $order){
                  return $query->orderBy( $field, $order );
               }

}
