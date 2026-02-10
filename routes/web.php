<?php

use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Mail\GlaryNotificationMail;
use App\Mail\NewNotificationMail; 
use App\Models\EmailLog; 
use App\Models\Customer;
use App\Models\ClientsFollowUp;
use App\Mail\CustomerNotificationMail;
use App\Http\Controllers\EmailLogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-test-email/{email}', function ($email) {
    Mail::to($email)->send(new MyEmail('زينب عبدالغفار'));
    return 'Email sent to ' . $email;
});

Route::get('/send-multiple', function () {
    return view('send-multiple');
});

Route::post('/send-multiple', function (Request $request) {
    try {
        $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
            'emails' => 'required|array',
            'emails.*' => 'email', 
            'names' => 'array',
        ]);

        Log::info('Email campaign started.');
        Log::info('Subject:', ['subject' => $request->input('subject')]);
        Log::info('Message:', ['message' => $request->input('message')]);

        $emails = $request->input('emails');
        $names = $request->input('names', []);
        $message = $request->input('message');
        $subject = $request->input('subject');

        foreach ($emails as $index => $email) {
            $name = $names[$index] ?? 'User';
            $personalizedMessage = str_replace('{{ $name }}', $name, $message);

            try {
                Mail::to($email)->send(new GlaryNotificationMail($name, $personalizedMessage, $subject));

                EmailLog::create([
                    'recipient_name' => $name,
                    'recipient_email' => $email,
                    'subject' => $subject,
                    'message' => $personalizedMessage,
                    'status' => 'sent',
                ]);

                Log::info("Email successfully sent to: {$email}");
            } catch (\Exception $e) {
                EmailLog::create([
                    'recipient_name' => $name,
                    'recipient_email' => $email,
                    'subject' => $subject,
                    'message' => $personalizedMessage,
                    'status' => 'failed',
                ]);

                Log::error("Error sending email to: {$email}", [
                    'error_message' => $e->getMessage(),
                    'subject' => $subject,
                    'email' => $email,
                    'name' => $name
                ]);
            }
        }

        Log::info('Email campaign completed.');
        return back()->with('success', 'Emails sent successfully!');
    } catch (\Exception $e) {
        Log::error('Error in email campaign: ' . $e->getMessage(), [
            'exception' => $e,
            'request_data' => $request->all()
        ]);
        return back()->withErrors(['error' => 'An error occurred while sending emails.']);
    }
});

Route::get('/send-to-customers', function () {
    return view('send-to-customers');
});

Route::post('/send-to-customers', function (Request $request) {
    try {
        $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        Log::info('Email campaign started.');
        Log::info('Subject:', ['subject' => $request->input('subject')]);
        Log::info('Message:', ['message' => $request->input('message')]);

        $customers = Customer::all();
        $message = $request->input('message');
        $subject = $request->input('subject');

        foreach ($customers as $customer) {
            $name = $customer->en_name ?? $customer->ar_name; 
            $personalizedMessage = str_replace('{{ $name }}', $name, $message);

            try {
                Mail::to($customer->email)->send(new CustomerNotificationMail($name, $personalizedMessage, $subject));

                Log::info("Email successfully sent to: {$customer->email}");
            } catch (\Exception $e) {
                Log::error("Error sending email to: {$customer->email}", [
                    'error_message' => $e->getMessage(),
                    'subject' => $subject,
                    'email' => $customer->email,
                    'name' => $name
                ]);
            }
        }

        Log::info('Email campaign completed.');
        return back()->with('success', 'Emails sent successfully!');
    } catch (\Exception $e) {
        Log::error('Error in email campaign: ' . $e->getMessage(), [
            'exception' => $e,
            'request_data' => $request->all()
        ]);
        return back()->withErrors(['error' => 'An error occurred while sending emails.']);
    }
});

Route::get('/send-to-clients', function () {
    return view('send-to-clients');
});

Route::post('/send-to-clients', function (Request $request) {
    try {
        $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        Log::info('Client email campaign started.');
        Log::info('Subject:', ['subject' => $request->input('subject')]);
        Log::info('Message:', ['message' => $request->input('message')]);

        $clients = ClientsFollowUp::all();
        $message = $request->input('message');
        $subject = $request->input('subject');

        foreach ($clients as $client) {
            $name = $client->en_name ?? $client->ar_name ?? 'Client';
            $personalizedMessage = str_replace('{{ $name }}', $name, $message);

            try {
                Mail::to($client->email)->send(new CustomerNotificationMail($name, $personalizedMessage, $subject));

                Log::info("Email successfully sent to: {$client->email}");
            } catch (\Exception $e) {
                Log::error("Error sending email to: {$client->email}", [
                    'error_message' => $e->getMessage(),
                    'subject' => $subject,
                    'email' => $client->email,
                    'name' => $name
                ]);
            }
        }

        Log::info('Client email campaign completed.');
        return back()->with('success', 'Client emails sent successfully!');
    } catch (\Exception $e) {
        Log::error('Error in client email campaign: ' . $e->getMessage(), [
            'exception' => $e,
            'request_data' => $request->all()
        ]);
        return back()->withErrors(['error' => 'An error occurred while sending client emails.']);
    }
});

Route::get('/subscribe-send-email', function () {
    return view('subscribe-send-email');
});

Route::post('/subscribe-send-email', function (Request $request) {
    $request->validate([
        'subject' => 'required|string',
        'message' => 'required|string',
        'emails' => 'required|array',
        'emails.*' => 'email',
        'names' => 'array',
        'from_name' => 'required|string',
        'from_email' => 'required|email',
    ]);

    $monthlyLimit = 5;

    $emailsSentThisMonth = EmailLog::where('status', 'sent')
        ->whereYear('created_at', now()->year)
        ->whereMonth('created_at', now()->month)
        ->count();

    $newEmailsCount = count($request->input('emails'));

    if (($emailsSentThisMonth + $newEmailsCount) > $monthlyLimit) {
        $remaining = $monthlyLimit - $emailsSentThisMonth;

        return back()->withErrors([
            'limit' => "You tried to send emails to {$newEmailsCount} recipients, but your monthly limit is {$monthlyLimit}. 
            You've already sent {$emailsSentThisMonth} emails this month, so you can only send to {$remaining} more recipient" . ($remaining === 1 ? '' : 's') . ". 
            Please reduce your recipient list and try again."
        ])->withInput();
    }

    $emails = $request->input('emails');
    $names = $request->input('names', []);
    $message = $request->input('message');
    $subject = $request->input('subject');
    $fromName = $request->input('from_name');
    $fromEmail = $request->input('from_email');

    foreach ($emails as $index => $email) {
        $name = $names[$index] ?? 'Customer';
        $personalizedMessage = str_replace('{{ $name }}', $name, $message);

        try {
            Mail::to($email)->send(
                new NewNotificationMail($fromEmail, $fromName, $name, $personalizedMessage, $subject)
            );

            EmailLog::create([
                'recipient_name' => $name,
                'recipient_email' => $email,
                'subject' => $subject,
                'message' => $personalizedMessage,
                'status' => 'sent',
            ]);

            Log::info("Email successfully sent to: {$email}");
        } catch (\Exception $e) {
            EmailLog::create([
                'recipient_name' => $name,
                'recipient_email' => $email,
                'subject' => $subject,
                'message' => $personalizedMessage,
                'status' => 'failed',
            ]);

            Log::error("Error sending email to: {$email}", [
                'error_message' => $e->getMessage(),
                'subject' => $subject,
                'email' => $email,
                'name' => $name
            ]);
        }
    }

    return back()->with('success', 'Emails sent successfully!');
});

Route::get('/email-logs', [EmailLogController::class, 'index'])->name('email.logs');