<?php 
	namespace Blooddivision\Transformers;

	class UserTransformer extends Transformer {

		public function transform($user){

			$return = [
				'id' 		=> (integer) $user->id,
				'username' 	=> (string) $user->name,
				'email' 	=> (string) $user->email,
				'active'	=> (boolean) $user->active
			];

			return $return;

		}

	}


 ?>