<?php

class HomeController extends BaseController
{
    protected $layout = 'layouts.main';

	public function actionIndex()
	{

	}

    public function actionSend()
    {
        if (Input::get('to') && Input::get('subject') && Input::get('message')) {
            $to      = Input::get('to');
            $subject = Input::get('subject');
            $message = Input::get('message');

            if (empty($to) || empty($subject) || empty($message)) {
                $data = array('success' => false, 'message' => 'Please fill out the form completely.');
                echo json_encode($data);
                exit;
            }

            $email = new Email;
            $email->to = $to;

            if ($email->save()) {
                Mail::send('emails.main', ['text' => $message, 'host' => $_SERVER['HTTP_HOST'], 'id' => $email->id], function($message) use ($to, $subject) {
                    $message->to($to)->subject($subject);
                });
                if (count(Mail::failures())) {
                    $data = array('success' => false, 'message' => 'Message could not be sent.');
                    $email->delete();
                    echo json_encode($data);
                    exit;
                }
                $data = array('success' => true, 'message' => 'Thanks! We have received your message.');
                echo json_encode($data);
            } else {
                $data = array('success' => false, 'message' => 'Message could not be sent.');
                echo json_encode($data);
            }
        } else {
            $data = array('success' => false, 'message' => 'Please fill out the form completely.');
            echo json_encode($data);
        }
        exit;
    }

    public function actionTracking($id)
    {
        header('Content-Type: image/jpg');

        if ($email = Email::find($id)) {
            $email->views++;
            $email->save();
        }

        $graphic_http = "http://{$_SERVER['HTTP_HOST']}/blank.jpg";

        $filesize = filesize('blank.jpg');

        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Cache-Control: private', false);
        header('Content-Disposition: attachment; filename="blank.jpg"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . $filesize);
        readfile($graphic_http);

        exit;
    }

    public function getEmails()
    {
        $emails = Email::orderBy('views', 'DESC')->get();
        if (count($emails)) {
            echo json_encode($emails->toArray());
        } else {
            echo json_encode([]);
        }
        exit;
    }
}
