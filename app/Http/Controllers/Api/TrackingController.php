<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipments;
class TrackingController extends Controller
{
    public function tracking($request){
        $booking_no = $request;
        $shipment =  Shipments::where('booking_number', $booking_no )->first();
        $boxes = $shipment->boxes;
        // dd($boxes[1]->boxStatuses->last()->status_id );
        $track = collect([]);
        foreach($boxes as $i=>$data){
            $status_id = $data->boxStatuses->last()? $data->boxStatuses->last()->status_id : null;
            if($status_id == 2){
                $level = 1;  //Shipment booked
            }
            elseif($status_id == 1){
                $level = 2;  //Shipment received
            }
            elseif($status_id == 3){
                $level = 3;  //Shipment forwarded
            }
            elseif($status_id == 4){
                $level = 4;  //Shipment arrived
            }
            elseif($status_id == 5){
                $level = 5;  //Waiting for clearance
            }
            elseif($status_id == 18){
                $level = 6;  //Out for Delivery
            }
            elseif($status_id == 13){
                $level = 7;  //Pending
            }
            elseif($status_id == 26){
                $level = 8; // hold
            }
            elseif($status_id == 12){
                $level = 9;  //Not Delivered
            }
            elseif($status_id == 18){
                $level = 10;  //Out for Delivery
            }
            elseif($status_id == 25){
                $level = 11; //Delivered
            }
            else{
                $level = null;
            }

            $track[$i] = collect([
                'box_name' => $data->box_name,
                'level'=>$level,
                'date' =>$data->boxStatuses->last()? $data->boxStatuses->last()->created_at : null
            ]);
        }

        if ($track) {

            return response()->json([
                'success' => true,
                'data' =>$track,
                'shipment_status'=> $shipment->status_id,
            ]);

        } else {

            return response()->json([
                'success' => false,
                'message' => 'Shipment not found for booking number: ' . $booking_no
            ], 404);
        }
    }
}
