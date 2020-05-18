<?php


namespace JBernavaPrah\CocktailDB\Actions;


trait Ingredient
{
    public function listOfIngredients()
    {
        //https://www.thecocktaildb.com/api/json/v1/1/list.php?i=list

        return collect($this->get("list.php", ['i' => 'list'])['drinks'])->flatten()->sort()->all();
    }
}
