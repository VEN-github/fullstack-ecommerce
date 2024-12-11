<?php

namespace App\Models;

use App\Core\Database\DbModel;

/**
 * RawMaterial
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Models
 */
class RawMaterial extends DbModel
{
    public int $id = 0;
    public int $supplier_id = 0;
    public string $supplier = '';
    public string $name = '';
    public float $unit_price = 0.0;
    public int $quantity = 0;
    public string $created_at = '';

    public function tableName(): string
    {
        return 'raw_materials';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return ['supplier_id', 'name', 'unit_price', 'quantity'];
    }

    public function rules(): array
    {
        return [
            'supplier_id' => [self::RULE_REQUIRED],
            'name' => [self::RULE_REQUIRED],
            'unit_price' => [self::RULE_REQUIRED],
            'quantity' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'supplier_id' => 'Supplier',
            'name' => 'Material Name',
            'unit_price' => 'Unit Price',
            'quantity' => 'Stock Quantity',
        ];
    }

    public function placeholders(): array
    {
        return [
            'name' => 'Enter material name',
            'supplier_id' => 'Select Supplier',
        ];
    }

    public function steps(): array
    {
        return [
            'unit_price' => '0.01',
        ];
    }

    public function min(): array
    {
        return [
            'unit_price' => '0.01',
            'quantity' => '0',
        ];
    }

    public function getRawMaterials()
    {
        $tableName = $this->tableName();
        $sql = "SELECT raw_materials.*, suppliers.name as supplier FROM $tableName LEFT JOIN suppliers ON raw_materials.supplier_id = suppliers.id";

        return static::orderBy()->get($sql);
    }

    public function getTotalPrice()
    {
        $total = $this->unit_price * $this->quantity;
        return $this->formatToCurrency($total);
    }

    public function formatToCurrency($amount): string
    {
        return number_format($amount, 2, '.', ',');
    }
}
