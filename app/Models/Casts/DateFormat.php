<?php

namespace App\Models\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Carbon\Carbon;

class DateFormat implements CastsAttributes
{
    /**
     * private @var format
     */
    private string $getFormat = 'd/m/Y';
    private string $setFormat = 'Y-m-d';

    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return array
     */
    public function get($model, $key, $value, $attributes)
    {
        return strlen($value)
            ? Carbon::parse($value)->format($this->getFormat)
            : null;
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        dd($value);
        return strlen((string)$value)
            ? Carbon::parse($value)->format($this->setFormat)
            : null;
    }
}
