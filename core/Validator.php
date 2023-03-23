<?php

class Validator
{
    public static function required(...$fields)
    {
        if (!empty($fields)) {
            foreach (func_get_args() as $field) {
                if (empty($_REQUEST[$field])) {
                    validationFeedback("The $field field is required");
                }
            }

            if (hasAnyFeedback('validation')) {
                back();
            }
        }
    }

    public static function min($field, $min)
    {
        if (!empty($field)) {
            if (strlen($_REQUEST[$field]) < $min) {
                validationFeedback("The $field must be at least $min characters.");
                back();
            }
        }
    }
}