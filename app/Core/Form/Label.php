<?php

namespace App\Core\Form;

use App\Core\Model;

/**
 * Label
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Form
 */
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
      $this->attribute,
      $this->model->hasError($this->attribute) ? 'text-error' : 'text-gray-900',
      $this->model->getLabel($this->attribute)
    );
  }
}
