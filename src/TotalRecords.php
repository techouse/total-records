<?php

namespace Techouse\TotalRecords;

use Laravel\Nova\Card;

class TotalRecords extends Card
{
    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $title;

    /**
     * TotalRecords constructor.
     *
     * @param string      $model
     * @param string      $title
     * @param string|null $component
     */
    public function __construct(string $model, ?string $title = null, ?string $component = null)
    {
        $this->model = $model;

        $this->title = $title ?? __('Total');

        parent::__construct($component);
    }

    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component(): string
    {
        return 'total-records';
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_merge([
            'model' => $this->model,
            'title' => $this->title,
        ], parent::jsonSerialize());
    }
}
