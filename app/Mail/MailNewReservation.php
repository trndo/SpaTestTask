<?php


namespace App\Mail;


class MailNewReservation extends SendMailable
{

    public function build()
    {
        return $this->subject('New reservation!')
            ->view('letters.benefit_accepted')
            ->with($this->data);
    }
}
