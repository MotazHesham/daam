<?php

namespace App\Mail;

use App\Models\CourseStudent;
use App\Models\Mempership;
use App\Models\Order;
use App\Models\WebsiteSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class CertificateMail2 extends Mailable
{
    use SerializesModels;
    /**
     * Create a new message instance.
     */
    public function __construct(public CourseStudent $courseStudent)
    {  
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {  
        return new Envelope(
            from: new Address("support@daam.org.sa","Daam"),
            subject: 'Certification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {     
        return new Content(
            view: 'emails.certification_2',
            with: [  
                'name' => $this->courseStudent->name,
                'path' => 'courses/course_'.$this->courseStudent->id.'_'. $this->courseStudent->course_id .'.pdf'
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
