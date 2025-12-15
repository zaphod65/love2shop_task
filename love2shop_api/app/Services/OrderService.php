<?php

namespace App\Services;

use App\Models\{
    Order,
    OrderItem,
};

class OrderService
{
    public function getOrder(int $orderId): Order
    {
        return Order::with(['items'])->findOrFail($orderId);
    }

    public function getOrdersForUser(int $userId)
    {
        return Order::forUser($userId)->get();
    }

    public function createOrder(int $userId, array $orderData): Order
    {
        $order = Order::create([
            'user_id' => $userId,
        ]);

        // In a full production system, this would be done through a model relation, items are not implemented here
        $orderItems = [];
        foreach ($orderData['items'] as $item) {
            $orderItems[] = [
                'order_id' => $order->id,
                'item_id' => $item['id'],
                'quantity' => $item['quantity'],
            ];
        }
        OrderItem::insert($orderItems);

        return $order;
    }

    public function cancelOrder($orderId)
    {
        Order::destroy($orderId);
    }
}
