<?php


namespace JBernavaPrah\CocktailDB\Actions;


trait Ingredient
{
    public function ingredients()
    {
        //https://www.thecocktaildb.com/api/json/v1/1/list.php?i=list

        return collect($this->get("list.php", ['i' => 'list'])['drinks'])->flatten()->sort()->all();
    }
}
