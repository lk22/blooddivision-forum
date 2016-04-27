<?php 
	namespace Blooddivision\Transformers;

	abstract class Transformer {

		public function transformCollection($items) {

			$return = [];

			foreach($items as $item)
				$return[] = $this->transform($item);

			return $return;

			return array_map([$this, $this->tranform], $items);

		}

		public abstract function transform($item);
	}
 ?>