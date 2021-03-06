<?php

namespace App\Mail\participants;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Participant;
use App\Event;
use Illuminate\Support\Facades\Config;

class ParticipantRegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $participant;
    public $event;
    public $givenCourses;
    public $password;
    public $toPay;
    public $iDeal;

    public function __construct(Participant $participant, Event $event, $givenCourses, $password, $toPay, $iDeal)
    {
        $this->participant = $participant;
        $this->event = $event;
        $this->givenCourses = $givenCourses;
        $this->password = $password;
        $this->toPay = $toPay;
        $this->iDeal = $iDeal;
    }

    public function build()
    {
        return $this->view('emails.participants.registrationConfirmation')
            ->to([$this->participant->getParentEmail()])
            ->from([Config::get("mail.addresses.kantoor")])
            ->subject('ANDERWIJS - Bevestiging van inschrijving');
    }
}
