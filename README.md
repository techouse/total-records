# Total Records

##### A Laravel Nova card that displays the total number of records of a specific model.

When you simply want to display the total number of some model's database records. Nothing less nothing more.

![Total Records](./screenshot.png)


## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require techouse/total-records
```

## Usage

To add this card to the dashboard simply open up `App\Providers\NovaServiceProvider` and add it to the `cards` method like this:

```php
<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\{Nova, NovaApplicationServiceProvider};
use Techouse\TotalRecords\TotalRecords;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
       /**
         * Get the cards that should be displayed on the Nova dashboard.
         *
         * @return array
         */
        protected function cards()
        {
            return [
                /**
                  * PARAMETERS:
                  * 
                  * The 1st parameter is required and represents the model you want to get the total count of.
                  * The 2nd parameter is the label you want to display in the Nova Card before the model count.
                  */
                new TotalRecords(App\Contact::class, __('Total contacts'))
            ];
        }
}
```