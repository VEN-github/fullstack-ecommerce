<?php

namespace App\Core\Form;

use App\Core\Model;

/**
 * InputField
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Form
 */
class InputField extends BaseField
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_EMAIL = 'email';
    public const TYPE_FILE = 'file';
    public const TYPE_NUMBER = 'number';
    public const TYPE_DATE = 'date';

    public string $type;

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute);
    }

    public function renderInput(): string
    {
        return sprintf(
            '<input type="%s" id="%s" name="%s" value="%s" placeholder="%s" class="form-input %s">',
            $this->type,
            $this->attribute,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->getPlaceholder($this->attribute),
            $this->model->hasError($this->attribute) ? 'border-error' : 'border-gray-300'
        );
    }

    public function emailField(): string
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

    public function passwordField(): string
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
}
