<?php


namespace JBernavaPrah\CocktailDB\Actions;


trait Drink
{
    public function searchDrinkByName($name)
    {

        $collection = collect($this->get("search.php", ['s' => $name])['drinks']);
        return $collection->mapInto(\JBernavaPrah\CocktailDB\Resources\Drink::class)->all();
    }

    public function searchDrinkByIngredient($ingredient)
    {
        $collection = collect($this->get("filter.php", ['i' => $ingredient])['drinks']);
        return $collection->mapInto(\JBernavaPrah\CocktailDB\Resources\Drink::class)->all();
    }

}
