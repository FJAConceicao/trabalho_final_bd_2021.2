<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $asin
 * @property string|null $brand
 * @property string|null $source_url
 * @property string|null $description
 * @property int|null $fk_info_info_PK
 * @property int|null $fk_Manufacturer_Id
 * @property string $categories
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'asin' => true,
        'brand' => true,
        'source_url' => true,
        'description' => true,
        'fk_info_info_PK' => true,
        'fk_Manufacturer_Id' => true,
        'categories' => true,
    ];
}
