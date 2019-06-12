# Total Records

[![Latest Version on Packagist](https://img.shields.io/packagist/v/techouse/total-records.svg?style=flat)](https://packagist.org/packages/techouse/total-records)
[![Total Downloads](https://img.shields.io/packagist/dt/techouse/total-records.svg?style=flat)](https://packagist.org/packages/techouse/total-records)
[![Licence](https://img.shields.io/packagist/l/techouse/total-records.svg)](https://packagist.org/packages/techouse/total-records)
[![PHP version](https://img.shields.io/packagist/php-v/techouse/total-records/dev-master.svg)](https://packagist.org/packages/techouse/total-records)

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
                  * @param string             $model   required - the model you want to get the total count of
                  * @param string             $title   optional - the label you want to display in the Nova Card before the model count
                  * @param \DateTimeInterface $expires optional - the cache expiry time
                  */
                new TotalRecords(\App\User::class),                                            // minimum required parameters
                new TotalRecords(\App\Event::class, __('Total events')),                       // with custom label
                new TotalRecords(\App\Contact::class, __('Total contacts'), now()->addHour()), // cached for 1 hour
            ];
        }
}
```
