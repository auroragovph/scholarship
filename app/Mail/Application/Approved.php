<?php

namespace App\Mail\Application;

use App\Service\PDF;
use App\Models\Applicant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Approved extends Mailable
{
    use Queueable, SerializesModels;


    public $applicant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Applicant $applicant)
    {
        $this->applicant = $applicant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Information about your scholarship application')
                    ->from('scholar@ea.aurora.gov.ph', 'PGA Scholarship')
                    ->view('emails.application.approved');
    }
}
