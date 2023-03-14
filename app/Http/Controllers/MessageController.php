<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(): JsonResponse
    {
        $this->authorize('viewAny', Message::class);

        return new JsonResponse(
            [
                'data' => Message::query()
                    ->where('recipient_id', '=', $this->user?->id)
                    ->get(),
            ],
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(StoreMessageRequest $request): JsonResponse
    {
        $this->authorize('create', Message::class);

        /** @var array<string, mixed> $data */
        $data = $request->validated();

        $message = new Message($data);
        $message->save();

        return new JsonResponse(
            [
                'data' => $message,
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message): JsonResponse
    {
        return new JsonResponse(
            [
                'data' => $message,
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateMessageRequest $request, Message $message): JsonResponse
    {
        $this->authorize('update', $message);

        /** @var array<string, mixed> $data */
        $data = $request->validated();

        $message->fill($data);
        $message->save();

        return new JsonResponse(
            [
                'data' => $message,
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Message $message): JsonResponse
    {
        $this->authorize('delete', $message);

        $message->delete();

        return new JsonResponse(
            [
                'data' => 'Message deleted',
            ],
            204
        );
    }
}
