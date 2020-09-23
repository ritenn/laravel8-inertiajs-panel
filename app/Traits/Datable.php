<?php
declare(strict_types=1);

namespace App\Traits;


use Carbon\Carbon;

/**
 * Trait Datable
 * @package App\Traits
 * @description: Converts new dateformat to old school
 */
trait Datable {

    /**
     * @param String $value
     * @return String|null
     */
    public function getUpdatedAtAttribute(String $value) : ?String
    {
        return $this->formatDate($value);
    }

    /**
     * @param String $value
     * @return String|null
     */
    public function getCreatedAtAttribute(String $value) : ?String
    {
        return $this->formatDate($value);
    }

    /**
     * @param String $value
     * @return String|null
     */
    private function formatDate(String $value) : ?String
    {
        return $value === null ? null : Carbon::parse($value)->format('Y-m-d H:i:s');
    }

}
