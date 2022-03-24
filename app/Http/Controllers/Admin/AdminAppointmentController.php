<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ApproveAppointmentMail;
use Illuminate\Support\Facades\Mail;

class AdminAppointmentController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function listappointment(){
        $appointments = Appointment::orderBy('created_at', 'DESC')->orderBy('replied', 'DESC')->get();

        return view('functionalities.appointments.listappointments', ["appointments"=>$appointments]);
    }

    public function showapproval($id){
        $appointment = Appointment::find($id);

        return view('functionalities.appointments.approveappointments', ["appointment"=>$appointment]);
    }

    public function approve(Request $request, $id){
        $appointment = Appointment::find($id);

        $data['receiver'] = $appointment->name;
        $email = $appointment->email;
        $data['subject'] = "Appointment Approved || Rotaract 3291";
        $appointment->date = $this->convertDate($request->input('date'));
        $data['date'] = $appointment->date;

        Mail::to($email)->send(new ApproveAppointmentMail($data));

        $appointment->replied = true;

        $appointment->save();

        return redirect('/admin/appointments')->with('success', 'Mail Sent');
    }

    public function convertDate($date){
        $convDate = date('Y-m-d H:i', strtotime(str_replace("/", "-", $date)));
        return $convDate;
    }
}
