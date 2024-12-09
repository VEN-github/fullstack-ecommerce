<?php

namespace App\Core\Form;

use App\Core\Model;

/**
 * Form
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Form
 */
class Form
{
  public static function begin($action, $method)
  {
    echo sprintf('<form action="%s" method="%s">', $action, $method);
    return new Form();
  }

  public static function end()
  {
    echo '</form>';
  }

  public function label(Model $model, $attribute)
  {
    return new Label($model, $attribute);
  }

  public function field(Model $model, $attribute)
  {
    return new InputField($model, $attribute);
  }

  public function textarea(Model $model, $attribute)
  {
    return new TextareaField($model, $attribute);
  }

  public function number(Model $model, $attribute)
  {
    return new NumberField($model, $attribute);
  }
}
