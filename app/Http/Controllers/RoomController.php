<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\RoomService;
use App\Services\ReservationService;
use Illuminate\View\View;
use App\Http\Requests\RoomListRequest;

class RoomController extends Controller
{
    /**
     * @param RoomService $roomService
     */
    public function __construct(private RoomService $roomService, private ReservationService $reservationService)
    {
    }

    /**
     * Index page
     *
     * @return View
     */
    public function index(): View
    {
        return view('index', ['date_range' => $this->roomService->defaultRange()]);
    }

    /**
     * Rooms list page
     *
     * @param RoomListRequest $request
     * @return View
     */
    public function list(RoomListRequest $request): View
    {
        $rooms = $this->roomService->list($request->get('date-range'));
        $reservations = $this->reservationService->list($request->get('date-range'));
        return view('rooms_list',
            [
                'rooms' => $rooms->appends(['date-range' => $request->get('date-range')]),
                'reservations' => $reservations,
                'date_range' => $request->get('date-range'),
            ]
        );
    }


}
