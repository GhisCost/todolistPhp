<?php

namespace Form;


class BaseHandleRequest
{
    private $errors;

    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    public function getErrors()
    {
        return $this->errors;
    }
    public function isValid()
    {
        $result = empty($this->errors) ? true : false;
        return $result;
    }
    public function isSubmitted()
    {
        $result = empty($_POST) ? false : true;
        return $result;
    }
}