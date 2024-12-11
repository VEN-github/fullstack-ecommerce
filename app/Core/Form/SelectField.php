<?php

namespace App\Core\Form;

use App\Core\Model;

/**
 * SelectField
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Form
 */
class SelectField extends BaseField
{
    public array $options = [];

    public function __construct(Model $model, string $attribute, array $options = [])
    {
        parent::__construct($model, $attribute);
        $this->options = $options;
    }

    public function renderInput(): string
    {
        return sprintf(
            '
      <select id="%s" name="%s" class="form-input %s">
        <option disabled selected>%s</option>
        %s  
      </select>',
            $this->attribute,
            $this->attribute,
            $this->model->hasError($this->attribute) ? 'border-error' : 'border-gray-300',
            $this->model->getPlaceholder($this->attribute),
            $this->renderOption()
        );
    }

    public function renderOption(): string
    {
        $renderedOptions = '';
        foreach ($this->options as $option) {
            $selected = $this->model->{$this->attribute} == $option->id ? 'selected' : '';

            $renderedOptions .= sprintf(
                '<option value="%s" %s>%s</option>',
                htmlspecialchars($option->id),
                $selected,
                htmlspecialchars($option->name)
            );
        }

        return $renderedOptions;
    }
}
