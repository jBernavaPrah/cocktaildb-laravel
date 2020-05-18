<?php

namespace JBernavaPrah\CocktailDB\Facades;

use Illuminate\Support\Facades\Facade;
use JBernavaPrah\CocktailDB\Resources\Drink;

/**
 * Class CocktailDB
 * @package JBernavaPrah\CocktailDB\Facades
 *
 * @method static array listOfIngredients()
 * @method static Drink[] searchDrinkByName(string $name)
 * @method static Drink[] searchDrinkByIngredient(string $ingredient)
 */
class CocktailDB extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cocktaildb';
    }
}
