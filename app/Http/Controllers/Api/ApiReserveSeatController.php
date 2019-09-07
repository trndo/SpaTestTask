<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\ReservedSeatRequest;
use App\Http\Services\ReservedSeatService\ReservedSeatInterface;
use Illuminate\Http\Request;

class ApiReserveSeatController extends Controller
{
    /**
     * @var ReservedSeatInterface
     */
    private $reservedSeatService;

    public function __construct(ReservedSeatInterface $reservedSeatService)
    {
        $this->reservedSeatService = $reservedSeatService;
    }

    public function reserveSeat(Request $request)
    {
       $result = $this->reservedSeatService->createReservation($request);

       return $result;
    }


}
