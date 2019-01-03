<?php

namespace Techouse\TotalRecords;

use DateTimeInterface;
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
     * @var
     */
    protected $expires;

    /**
     * TotalRecords constructor.
     *
     * @param string                  $model
     * @param string                  $title
     * @param \DateTimeInterface      $expires
     * @param string                  $component
     */
    public function __construct(string $model, ?string $title = null, ?DateTimeInterface $expires = null, ?string $component = null)
    {
        $this->model = $model;

        $this->title = $title ?? __('Total');

        $this->expires = $expires ? $expires->format('c') : null;

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
            'name'    => hash('md4', $this->model . $this->title . $this->expires),
            'model'   => $this->model,
            'title'   => $this->title,
            'expires' => $this->expires,
        ], parent::jsonSerialize());
    }
}
