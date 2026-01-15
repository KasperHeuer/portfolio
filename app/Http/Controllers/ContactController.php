<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    private string $priveEmail = "kasperheuer209@gmail.com";
    private string $priveWachtwoord = "zxks rfzk cnro hvzy"; // Make sure to move to .env for security!

    /**
     * Show the contact/about page
     */
    public function index()
    {
        return view('about');
    }

    /**
     * Handle contact form submission
     */
    public function send(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'from' => 'required|email|max:255',
            'note' => 'required|string|max:5000',
        ]);

        $naam = $request->input('naam');
        $from = $request->input('from');
        $note = $request->input('note');

        $firstEmailSent = $this->sendEmail($from, 1, $naam, $note);
        $secondEmailSent = $this->sendEmail($this->priveEmail, 2, $naam, $note);

        if ($firstEmailSent && $secondEmailSent) {
            return redirect()->back()->with('bericht', 'Bericht succesvol verstuurd.');
        }

        return redirect()->back()->with('bericht', 'Er was een probleem met het verzenden van een van de e-mails.');
    }

    /**
     * Send email via PHPMailer
     */
    private function sendEmail(string $to, int $status, string $naam, string $note): bool
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = $this->priveEmail;
            $mail->Password = $this->priveWachtwoord;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($this->priveEmail, "Kasper Heuer");
            $mail->addAddress($to);

            if ($status === 1) {
                $mail->Subject = "Bevestiging bericht ontvangen";
                $mail->Body = "Geachte $naam,

Hartelijk dank voor uw bericht. Ik bevestig graag dat ik uw bericht heb ontvangen en het zo snel mogelijk zal doornemen.

Met vriendelijke groet,

Kasper Heuer";
            } elseif ($status === 2) {
                $mail->Subject = "Nieuw bericht van contactformulier";
                $mail->Body = "Er is een bericht ontvangen van $naam ($to):

$note";
            }

            $mail->send();
            return true;
        } catch (Exception $e) {
            \Log::error("Fout bij het verzenden van e-mail: " . $mail->ErrorInfo);
            return false;
        }
    }
}
