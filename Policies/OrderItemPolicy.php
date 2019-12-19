<?php

namespace App\Policies;

use R64\Checkout\Models\OrderItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the orderItem.
     *
     * @param  \App\Models\User      $user
     * @param  \App\Models\OrderItem $orderItem
     * @return mixed
     */
    public function view(User $user, OrderItem $orderItem)
    {
        return true;
    }

    /**
     * Determine whether the user can create orderItems.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return true;
    }

    /**
     * Determine whether the user can update the orderItem.
     *
     * @param  \App\Models\User      $user
     * @param  \App\Models\OrderItem $orderItem
     * @return mixed
     */
    public function update(User $user, OrderItem $orderItem)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the orderItem.
     *
     * @param  \App\Models\User      $user
     * @param  \App\Models\OrderItem $orderItem
     * @return mixed
     */
    public function delete(User $user, OrderItem $orderItem)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the orderItem.
     *
     * @param  \App\Models\User      $user
     * @param  \App\Models\OrderItem $orderItem
     * @return mixed
     */
    public function restore(User $user, OrderItem $orderItem)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the orderItem.
     *
     * @param  \App\Models\User      $user
     * @param  \App\Models\OrderItem $orderItem
     * @return mixed
     */
    public function forceDelete(User $user, OrderItem $orderItem)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }
}
