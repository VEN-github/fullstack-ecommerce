<?php

namespace App\Core\Form;

use App\Core\Model;

/**
 * NumberField
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Form
 */
class NumberField extends BaseField
{
  public function __construct(Model $model, string $attribute)
  {
    parent::__construct($model, $attribute);
  }

  public function renderInput(): string
  {
    return sprintf(
      '<input type="number" id="%s" name="%s" value="%s" step="%s" min="%s" class="form-input %s"></input>',
      $this->attribute,
      $this->attribute,
      $this->model->{$this->attribute},
      $this->model->getStep($this->attribute),
      $this->model->getMin($this->attribute),
      $this->model->hasError($this->attribute) ? 'border-error' : 'border-gray-300',
    );
  }
}
