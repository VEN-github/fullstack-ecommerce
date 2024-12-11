<?php

namespace App\Models;

use App\Core\Database\DbModel;

/**
 * ProductCategory
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Models
 */
class ProductCategory extends DbModel
{
  public int $id = 0;
  public string $name = '';
  public string $slug = '';
  public string $created_at = '';
  public ?string $updated_at = null;
  public ?string $deleted_at = null;

  public function tableName(): string
  {
    return 'product_categories';
  }

  public function primaryKey(): string
  {
    return 'id';
  }

  public function attributes(): array
  {
    return ['name', 'slug'];
  }

  public function rules(): array
  {
    return [
      'name' => [self::RULE_REQUIRED],
    ];
  }

  public function labels(): array
  {
    return [
      'name' => 'Name',
      'slug' => 'Slug',
    ];
  }

  public function placeholders(): array
  {
    return [
      'name' => 'Enter name',
      'slug' => 'Slug will autogenerate if leave empty',
    ];
  }

  public function save()
  {
    if (empty($this->slug)) {
      $this->slug = slugify($this->name);
    } else {
      $this->slug = slugify($this->slug);
    }

    return parent::save();
  }
}
