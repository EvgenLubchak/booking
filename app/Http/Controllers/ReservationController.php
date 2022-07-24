<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\ReservationService;
use App\Http\Requests\RoomReservationRequest;
use Illuminate\Http\RedirectResponse;

class ReservationController extends Controller
{
    /**
     * @param ReservationService $reservationService
     */
    public function __construct(private ReservationService $reservationService)
    {
    }

    /**
     * Reservation process page
     *
     * @param Request $request
     * @param Room $room
     * @return View
     */
    public function index(Request $request, Room $room): View
    {
        return view('reservation_process',
            [
                'room' => $room,
                'date_range' => $request->get('date-range'),
            ]
        );
    }

    /**
     * Reservation process request
     *
     * @param RoomReservationRequest $request
     * @param Room $room
     * @return RedirectResponse
     */
    public function reservation(RoomReservationRequest $request, Room $room): RedirectResponse
    {
        $date = $request->only(['range', 'name', 'phone', 'email', 'guests']);
        $reservation = $this->reservationService->reserve($date, $room);
        return redirect()->route('reservation.link', ['reservation' => $reservation->id]);
    }


    /**
     * Reservation page
     *
     * @param Reservation $reservation
     * @return View
     */
    public function link(Reservation $reservation): View
    {
        return view('reservation',
            [
                'reservation' => $reservation,
            ]
        );
    }

    public function delete(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back();
    }
}
