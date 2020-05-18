<?php


namespace JBernavaPrah\CocktailDB\Resources;

use Illuminate\Support\Str;

/**
 * Class Cocktail
 * @package JBernavaPrah\CocktailDB\Resources
 *
 * @property string $idDrink
 * @property string $drinkThumb
 * @property string $drink
 * @property string $ingredients
 * @property string $measures
 */
class Drink extends Resource
{


    protected function fill()
    {


        foreach ($this->attributes as $key => $value) {

            if (Str::startsWith($key, 'strIngredient')) {
                if ($value) {
                    $this->ingredients[(int)Str::afterLast($key, 'strIngredient')] = $value;
                }
                unset($this->attributes[$key]);
            }
            if (Str::startsWith($key, 'strMeasure')) {
                if ($value) {
                    $this->measures[(int)Str::afterLast($key, 'strMeasure')] = $value;
                }
                unset($this->attributes[$key]);
            }
        }

        parent::fill();

    }
}
