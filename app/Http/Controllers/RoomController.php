<?php

declare(strict_types=1);

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Services\RoomService;
use Illuminate\View\View;

class RoomController extends Controller
{
    /**
     * @param RoomService $roomService
     */
    public function __construct(private RoomService $roomService)
    {
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('rooms',
            [
                'rooms' => $this->roomService->index()
            ]
        );
    }
}
