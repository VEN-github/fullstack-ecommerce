<?php

namespace App\Core\Form;

use App\Core\Model;

class Label
{
  public Model $model;
  public string $attribute;

  public function __construct(Model $model, string $attribute)
  {
    $this->model = $model;
    $this->attribute = $attribute;
  }

  public function __toString(): string
  {
    return sprintf(
      '<label for="%s" class="form-label %s">%s</label>',
      $this->model->getLabel($this->attribute),
      $this->model->hasError($this->attribute) ? 'text-error' : 'text-gray-900',
      $this->model->labels()[$this->attribute] ?? $this->attribute
    );
  }
}
