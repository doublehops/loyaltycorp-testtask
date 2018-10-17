<?php
declare(strict_types=1);

namespace App\Database\Entities\MailChimp;

use App\Database\Entities\Entity;

abstract class MailChimpEntity extends Entity
{
    /**
     * Get validation rules for mailchimp entity.
     *
     * @return array
     */
    abstract public function getValidationRules(): array;

    /**
     * Get array representation of entity.
     *
     * @return array
     */
    abstract public function toArray(): array;

    /**
     * Get mailchimp array representation of entity.
     *
     * @return array
     */
    public function toMailChimpArray(): array
    {
        $array = [];

        // This method only works for a one dimensional array and doesn't handle merge_fields.
        foreach ($this->toArray() as $property => $value) {
            if ($value === null) {
                continue;
            }

            // @todo: Find a way to handle this outside of the base entity.
            if ($field = $this->isMergeField($property)) {
                $array['merge_fields'][$field] = $value;
                continue;
            }

            $array[$property] = $value;
        }

        return $array;
    }

    /**
     * Define merge fields here to populate a second dimension.
     *
     * @param string $field
     *
     * @return array
     */
    protected function isMergeField($field)
    {
        $fields = ['fname' => 'FNAME',
                   'lname' => 'LNAME',
        ];

        if (!array_key_exists($field, $fields)) {
            return false;
        }

        return $fields[$field];
    }
}
