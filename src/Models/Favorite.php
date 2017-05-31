<?php

namespace WTG\Customer\Models;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use WTG\Customer\Interfaces\FavoriteInterface;

/**
 * Favorite model.
 *
 * @package     WTG\Customer
 * @subpackage  Models
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class Favorite extends Model implements FavoriteInterface
{
    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * Customer scope
     *
     * @param  Builder  $query
     * @param  string  $customerId
     * @return Builder
     */
    public function scopeCustomer(Builder $query, string $customerId): Builder
    {
        return $query->where('customer_id', $customerId);
    }

    /**
     * Product scope
     *
     * @param  Builder  $query
     * @param  string  $productId
     * @return Builder
     */
    public function scopeProduct(Builder $query, string $productId): Builder
    {
        return $query->where('product_id', $productId);
    }

    /**
     * Get the id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->attributes['id'];
    }

    /**
     * Set the id
     *
     * @param  string  $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->attributes['id'] = $id;

        return $this;
    }

    /**
     * Get the product id.
     *
     * @return string
     */
    public function getProductId(): string
    {
        return $this->attributes['product_id'];
    }

    /**
     * Set the product id.
     *
     * @param  string  $id
     * @return $this
     */
    public function setProductId(string $id)
    {
        $this->attributes['product_id'] = $id;

        return $this;
    }

    /**
     * Get the customer id.
     *
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->attributes['customer_id'];
    }

    /**
     * Set the customer id.
     *
     * @param  string  $id
     * @return $this
     */
    public function setCustomerId(string $id)
    {
        $this->attributes['customer_id'] = $id;

        return $this;
    }

    /**
     * Add a product to a customer their favorites.
     *
     * @param  string  $customerId
     * @param  string  $productId
     * @return bool|FavoriteInterface
     */
    public function add(string $customerId, string $productId)
    {
        $favorite = app()->make(FavoriteInterface::class)
            ->customer($customerId)
            ->product($productId)
            ->first();

        if ($favorite !== null) {
            return false;
        }

        /** @var FavoriteInterface $favorite */
        $favorite = app()->make(FavoriteInterface::class);
        $favorite->setId(Uuid::generate(4));
        $favorite->setCustomerId($customerId);
        $favorite->setProductId($productId);
        $favorite->save();

        return $favorite;
    }
}