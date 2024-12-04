<?php

namespace App\Core\Form;

use App\Core\Model;

/**
 * TextareaField
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Form
 */
class TextareaField extends BaseField
{
  public function __construct(Model $model, string $attribute)
  {
    parent::__construct($model, $attribute);
  }

  public function renderInput(): string
  {
    return sprintf(
      '<textarea id="%s" name="%s" value="%s" class="form-input %s"></textarea>',
      $this->attribute,
      $this->attribute,
      $this->model->{$this->attribute},
      $this->model->hasError($this->attribute) ? 'border-error' : 'border-gray-300',
    );
  }
}
