<?php


namespace JBernavaPrah\CocktailDB\Actions;


trait Drink
{
	/**
	 * Search Drinks by Name
	 * @param $name
	 * @return array
	 */
	public function searchDrinksByName($name)
	{

		$collection = collect($this->get("search.php", ['s' => $name]));
		return $collection->only('drinks')->flatten(1)
			->reject(function ($value) {
				return empty($value);
			})
			->mapInto(\JBernavaPrah\CocktailDB\Resources\Drink::class)->all();

	}

	public function searchDrinksByIngredient($ingredient)
	{

		$collection = collect($this->get("filter.php", ['i' => $ingredient]));
		return $collection->only('drinks')->flatten(1)
			->reject(function ($value) {
				return empty($value);
			})->mapInto(\JBernavaPrah\CocktailDB\Resources\Drink::class)->all();
	}

	public function getDrinkById($id)
	{
		//https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i=11007
		$collection = collect($this->get("lookup.php", ['i' => $id]));
		return $collection->only('drinks')->flatten(1)
			->reject(function ($value) {
				return empty($value);
			})->mapInto(\JBernavaPrah\CocktailDB\Resources\Drink::class)->first();
	}

}
