<?php 

	namespace Blooddivision\Transformers;

	/**
	* Thread Transformer class
	*/
	class ThreadTransformer extends Transformer
	{
		
		public function transform($thread){

			$return = [
				'id' => (integer) $thread->id,
				'name' => (string) $thread->name,
			];

			if($thread->relationLoaded('forum')){
				$return['user'] = (string) $thread->user;
 			}

 			return $return;

		}
	}