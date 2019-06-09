<?php

namespace App\Mail\internal;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewDeclaration extends Mailable
{
    use Queueable, SerializesModels;

    public $member;
    public $formFilePath;
    public $inputData;
    public $totalAmount;
    public $fileNames;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        Member $member,
        $formFilePath,
        $inputData,
        $totalAmount,
        $filePaths
    ) {
        $this->member = $member;
        $this->formFilePath = $formFilePath;
        $this->inputData = $inputData;
        $this->totalAmount = $totalAmount;
        $this->filePaths = $filePaths;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->attach($this->formFilePath);

        foreach ($this->filePaths as $filePath) {
            $this->attach($filePath);
        }
        return $this->view('view.name')
            ->subject("AAS 2.0 - Nieuwe declaratie")
            ->cc([$this->member->getAnderwijsEmail()])
            ->to([Config::get('mail.addresses.penningmeester')])
            ->from([$this->member->getAnderwijsEmail()]);
    }
}