<?php

namespace App\Models;

use App\Core\Database\DbModel;

/**
 * Product
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Models
 */
class Product extends DbModel
{
    public int $id = 0;
    public int $category_id = 0;
    public string $name = '';
    public string $slug = '';
    public string $description = '';
    public string $created_at = '';
    public ?string $updated_at = null;
    public ?string $deleted_at = null;

    public function tableName(): string
    {
        return 'products';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['name', 'category_id', 'slug', 'description'];
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'category_id' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'name' => 'Name',
            'slug' => 'Slug',
            'category_id' => 'Category',
            'description' => 'Description',
        ];
    }

    public function placeholders(): array
    {
        return [
            'name' => 'Enter product name',
            'slug' => 'Slug will autogenerate if leave empty',
            'category_id' => 'Select category',
            'description' => 'Enter product description',
        ];
    }
}
