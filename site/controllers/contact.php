<?php
return function($kirby, $pages, $page) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

        // check the honeypot
        if(empty(get('website')) === false) {
            go($page->url());
            exit;
        }

        $data = [
            'name'  => get('name'),
            'email' => get('email'),
            'text'  => get('text')
        ];

        $rules = [
            'name'  => ['required', 'min' => 3],
            'email' => ['required', 'email'],
            'text'  => ['required', 'min' => 3, 'max' => 3000],
        ];

        $messages = [
            'name'  => 'Please enter a valid name',
            'email' => 'Please enter a valid email address',
            'text'  => 'Please enter a text between 3 and 3000 characters'
        ];

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {
            try {
                // $kirby->email([
                //     'template' => 'email',
                //     'from'     => 'contactform@sample.com',
                //     'replyTo'  => $data['email'],
                //     'to'       => esc($page->email()),
                //     'subject'  => esc($data['name']) . ' sent you a message from your contact form',
                //     'data'     => [
                //         'text'   => esc($data['text']),
                //         'sender' => esc($data['name'])
                //     ]
                // ]);
                if ($body = esc($data['text']) . "from" . esc($data['name']) and $siteemail = esc($page->email())) {
                    require 'vendor/autoload.php';
                    $email = new \SendGrid\Mail\Mail();
                    $email->setFrom("no-reply@submit.form", "Contact Form");
                    $email->setSubject("Form Submission");
                    $email->addTo($siteemail, "Owner");
                    $email->addContent(
                        $body
                    );
                    $sendgrid = new \SendGrid('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');
                    try {
                        $response = $sendgrid->send($email);
                        print $response->statusCode() . "\n";
                        print_r($response->headers());
                        print $response->body() . "\n";
                    } catch (Exception $e) {
                        echo 'Caught exception: ',  $e->getMessage(), "\n";
                    }
                }
            } catch (Exception $error) {
                $alert['error'] = "The form could not be sent";
            }

            // no exception occured, let's send a success message
            if (empty($alert) === true) {
                $success = 'Your message has been sent, thank you. We will get back to you soon!';
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false
    ];
};