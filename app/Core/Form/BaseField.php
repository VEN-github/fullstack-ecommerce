<?php

namespace App\Core\Form;

use App\Core\Model;

/**
 * BaseField
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Form
 */
abstract class BaseField
{
  public Model $model;
  public string $attribute;

  public function __construct(Model $model, string $attribute)
  {
    $this->model = $model;
    $this->attribute = $attribute;
  }

  abstract public function renderInput(): string;

  public function __toString(): string
  {
    $error = $this->model->hasError($this->attribute) ? sprintf('<span class="text-error text-sm mt-1">%s</span>', $this->model->getFirstError($this->attribute)) : '';

    return sprintf(
      '%s%s',
      $this->renderInput(),
      $error
    );
  }
}
