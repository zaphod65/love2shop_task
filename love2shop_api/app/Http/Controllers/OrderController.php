<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private const DEFAULT_USER_ID = 1;

    public function __construct(
        private OrderService $orderService,
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // In a production system, this user ID would come from the authenticated user,
        // whatever auth mechanism is chosen
        return $this->orderService->getOrdersForUser(self::DEFAULT_USER_ID);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return ['create'];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOrderRequest $request)
    {
        $order = $this->orderService->createOrder(self::DEFAULT_USER_ID, $request->validated());
        $order->load('items');
        return $order->toArray();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->orderService->getOrder($id)->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return ['edit'];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return ['update'];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->orderService->cancelOrder($id);
    }
}
