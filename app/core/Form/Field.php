<?php

namespace App\Core\Form;

use App\Core\Model;

/**
 * Field
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Form
 */
class Field
{
  public const TYPE_TEXT = 'text';
  public const TYPE_PASSWORD = 'password';
  public const TYPE_EMAIL = 'email';
  public const TYPE_FILE = 'file';
  public const TYPE_NUMBER = 'number';
  public const TYPE_DATE = 'date';

  public string $type;
  public Model $model;
  public string $attribute;

  public function __construct(Model $model, string $attribute)
  {
    $this->type = self::TYPE_TEXT;
    $this->model = $model;
    $this->attribute = $attribute;
  }

  public function __toString(): string
  {
    return sprintf(
      '<input type="%s" name="%s" value="%s" class="form-input %s">
      <span class="text-error text-sm mt-1">%s</span>',
      $this->type,
      $this->attribute,
      $this->model->{$this->attribute},
      $this->model->hasError($this->attribute) ? 'border-error' : 'border-gray-300',
      $this->model->getFirstError($this->attribute)
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
