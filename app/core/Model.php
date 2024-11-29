<?php

namespace App\Core;

/**
 * Model
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
abstract class Model
{
  public const RULE_REQUIRED = 'required';
  public const RULE_EMAIL = 'email';
  public const RULE_MIN = 'min';
  public const RULE_MAX = 'max';
  public const RULE_MATCH = 'match';
  public const RULE_UNIQUE = 'unique';

  public array $errors = [];

  public function loadData($data)
  {
    foreach ($data as $key => $value) {
      if (property_exists($this, $key)) {
        $this->$key = $value;
      }
    }
  }

  abstract public function rules(): array;

  public function labels(): array
  {
    return [];
  }

  public function getLabel(string $attribute): string
  {
    return $this->labels()[$attribute] ?? $attribute;
  }

  public function validate()
  {
    foreach ($this->rules() as $attribute => $rules) {
      $value = $this->$attribute;
      foreach ($rules as $rule) {
        $ruleName = $rule;

        if (!is_string($ruleName)) {
          $ruleName = $rule[0];
        }

        if ($ruleName === self::RULE_REQUIRED && !$value) {
          $this->addErrorForRule($attribute, $ruleName, ['field' => $this->getLabel($attribute)]);
        }

        if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
          $this->addErrorForRule($attribute, $ruleName, ['field' => $this->getLabel($attribute)]);
        }

        if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
          $this->addErrorForRule($attribute, $ruleName, ['min' => $rule['min'], 'field' => $this->getLabel($attribute)]);
        }

        if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
          $this->addErrorForRule($attribute, $ruleName, ['max' => $rule['max'], 'field' => $this->getLabel($attribute)]);
        }

        if ($ruleName === self::RULE_MATCH && $value !== $rule['match']) {
          $this->addErrorForRule($attribute, $ruleName, ['match' => $this->getLabel($rule['match']), 'field' => $this->getLabel($attribute)]);
        }

        if ($ruleName === self::RULE_UNIQUE) {
          $className = $rule['class'];
          $uniqueAttr = $rule['attribute'] ?? $attribute;
          $tableName = $className::tableName();

          $db = Application::$app->db;
          $statement = $db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :attr");
          $statement->bindValue(':attr', $value);
          $statement->execute();
          $record = $statement->fetchObject();

          if ($record) {
            $this->addErrorForRule($attribute, $ruleName, ['field' => $this->getLabel($attribute)]);
          }
        }
      }
    }

    return empty($this->errors);
  }

  private function addErrorForRule(string $attribute, string $rule, $params = [])
  {
    $message = $this->errorMessages()[$rule] ?? '';
    foreach ($params as $key => $value) {
      $message = str_replace("{{$key}}", $value, $message);
    }
    $this->errors[$attribute][] = $message;
  }

  public function addError(string $attribute, string $message)
  {
    $this->errors[$attribute][] = $message;
  }

  public function errorMessages(): array
  {
    return [
      self::RULE_REQUIRED => '{field} is required.',
      self::RULE_EMAIL => 'This field must be a valid email address.',
      self::RULE_MIN => '{field} must be at least {min} characters.',
      self::RULE_MAX => '{field} must be at most {max} characters.',
      self::RULE_MATCH => '{field} must match with {match}.',
      self::RULE_UNIQUE => 'Record with this {field} already exists.',
    ];
  }

  public function hasError(string $attribute)
  {
    return $this->errors[$attribute] ?? false;
  }

  public function getFirstError(string $attribute)
  {
    return $this->errors[$attribute][0] ?? false;
  }
}
