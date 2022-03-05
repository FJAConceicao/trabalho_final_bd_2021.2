<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Review Entity
 *
 * @property int $id
 * @property int|null $fk_User_Id
 * @property int|null $fk_Product_Id
 * @property \Cake\I18n\FrozenTime|null $date
 * @property bool|null $did_purchase
 * @property int|null $rating
 * @property string|null $title
 * @property string|null $text
 */
class Review extends Entity
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
        'fk_User_Id' => true,
        'fk_Product_Id' => true,
        'date' => true,
        'did_purchase' => true,
        'rating' => true,
        'title' => true,
        'text' => true,
    ];
}
