CocktailDB Laravel
=========

Laravel PHP Facade/Wrapper for the TheCocktailDB.com APis

## Requirements

- PHP 7.0 or higher
- Laravel 7.0 or higher

## Installation

You can pull in the package via composer:
```
composer require jbernavaprah/cocktaildb-laravel
```
The package will automatically register itself.

If you need to change the API Production Key use:

In the .env file:
```
COCKTAILDB_KEY = KEY
```

Or publish configuration:
```
$ php artisan vendor:publish --provider="JBernavaPrah\CocktailDB\CocktailDBServiceProvider"
```
and set your API key in the file:
```
/config/cocktaildb.php
```

Or you can set the key programmatically at run time :
```
CocktailDB::setApiKey('KEY');
```

## Usage

```php
use JBernavaPrah\CocktailDB\Facades\CocktailDB;

// Return an Ingredients array
$ingredients = CocktailDB::ingredients();

// Get multiple JBernavaPrah\CocktailDB\Resources\Drinks match name Margaritas
$drinks = CocktailDB::searchDrinksByName('Margarita');

// Get multiple JBernavaPrah\CocktailDB\Resources\Drinks match name Margaritas
$drinks = CocktailDB::searchDrinksByIngredient('Vodka');

// see JBernavaPrah\CocktailDB\Facades\CocktailDB to see more functions...
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.