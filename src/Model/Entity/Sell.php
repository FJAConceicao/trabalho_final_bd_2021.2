<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sell Entity
 *
 * @property int $id
 * @property int|null $fk_Product_Id
 * @property int|null $fk_Store_Id
 */
class Sell extends Entity
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
        'fk_Product_Id' => true,
        'fk_Store_Id' => true,
    ];
}
