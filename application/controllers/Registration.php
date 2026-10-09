<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// At the top of your Registration controller
require_once FCPATH . 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Registration extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Register_model');
        $this->load->helper('url');
        $this->load->helper('form');

        
    }
    
    public function index()
    {
        $data['country'] = $this->Register_model->getCountry();
        
        // Ambil dari URL parameter
        $status = $this->input->get('status');
        
        if ($status == 'success') {
            $data['success'] = 'Your registration has been submitted successfully!';
            $data['last_insert_id'] = $this->input->get('id');
            $data['fullname'] = $this->input->get('name');
            $data['error'] = null;
            $data['show_popup'] = true; // Tandai untuk menampilkan popup
        } elseif ($status == 'error') {
            $data['error'] = $this->input->get('message') ?? 'The data could not be saved. Please try again.';
            $data['success'] = null;
            $data['show_popup'] = false;
        } else {
            $data['error'] = null;
            $data['success'] = null;
            $data['show_popup'] = false;
        }

        $this->load->view('templates/header');
        $this->load->view('registration', $data);
        $this->load->view('templates/footer');
    }

    public function process()
    {
        // SET DEFAULT VALUE UNTUK SEMUA FIELD
        $_POST['title'] = $this->input->post('title') ?? '';
        $_POST['name'] = $this->input->post('name') ?? '';
        $_POST['organisation'] = $this->input->post('organisation') ?? '';
        $_POST['country'] = $this->input->post('country') ?? '';
        $_POST['job'] = $this->input->post('job') ?? '';
        $_POST['email'] = $this->input->post('email') ?? '';
        $_POST['FirsName'] = $this->input->post('FirsName') ?? '';
        $_POST['SurName'] = $this->input->post('SurName') ?? '';
        $_POST['requirements'] = $this->input->post('requirements') ?? '';
        
        // VALIDASI
        $this->form_validation->set_rules('title', 'Title/Salutation', 'required');
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('organisation', 'Organisation', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('job', 'Position / Job Title', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('FirsName', 'Preferred First Name', 'required');
        $this->form_validation->set_rules('SurName', 'Preferred Surname', 'required');
        $this->form_validation->set_rules('requirements', 'Requirements', 'required');

        if ($this->form_validation->run() == FALSE) {
            // VALIDASI GAGAL
            $error_messages = validation_errors('<div>', '</div>');
            redirect('registration?status=error&message=' . urlencode($error_messages));
        } else {
            // Ambil data dari form
            $insert_data = array(
                'title'         => $this->input->post('title'),
                'fullname'      => $this->input->post('name'),
                'country'       => $this->input->post('country'),
                'organisation'  => $this->input->post('organisation'),
                'position'      => $this->input->post('job'),
                'email'         => $this->input->post('email'),
                'firstname'     => $this->input->post('FirsName'),
                'surname'       => $this->input->post('SurName'),
                'requirements'  => $this->input->post('requirements'),
                'created_date'  => date('Y-m-d H:i:s')
            );

            // SIMPAN DATA KE DATABASE
            $result = $this->Register_model->TambahData($insert_data);
            
            if ($result) {
                // SUKSES
                $id = $this->db->insert_id();
                $name_encoded = urlencode($this->input->post('name'));
                redirect('registration?status=success&id=' . $id . '&name=' . $name_encoded);
            } else {
                // GAGAL
                redirect('registration?status=error&message=The data could not be saved. Please try again.');
            }
        }
    }

    public function insert_more()
    {
        redirect('registration');
    }

    public function done()
    {
        redirect(base_url());
    }

    public function send_confirmation_email($order_id) {
    
    $order_id = $this->input->get('order_id');
    
    $data = $this->Registration_model->get_registration_by_order_id($order_id);

    
    

    $mail = new PHPMailer();
 
		//Memberitahukan PHPMailer untuk menggunakan SMTP
		$mail->SMTPDebug = 0; // Aktifkan debugging
        	$mail->isSMTP(); 
		//Set the hostname of the mail server
		$mail->Host = 'mail.peradi.or.id';
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Gunakan TLS
        $mail->Port = 587; // Port alternatif
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
 
		
 
		//Set true jika ingin menggunakan SMTP auth
		$mail->SMTPAuth = true;
 
		//Username untuk SMTP Auth - menggunakan alamat email yang akan dijadikan relay
		$mail->Username = 'conference@peradi.or.id';
 
		//Password untuk SMTP Auth - password aplikasi yang digenerate melalui Google Account
		$mail->Password = 'DPNP3r4d!!conference'; 
 
		//Set alamat email dan username siapa yang mengirimkan email ini
		$mail->setFrom('conference@peradi.or.id', 'PERADI-LAWASIA CONFERENCE');
 
		//Set alamat email dan username tujuan
		$mail->addAddress($data->email);
 
		//Set subject email
		$mail->Subject = 'Registration confirmation email for the PERADI-LAWASIA Conference';

        $mail->isHTML(true);
 
		//Set isi content email
		$mail->Body    = "
        

<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                color: #333;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
            }
            .header {
                color: #0066cc;
                font-size: 24px;
                margin-bottom: 20px;
            }
			.text-center{
				text-align: center !important;
			}
            .details {
                background-color: #f9f9f9;
                padding: 15px;
                border-radius: 5px;
                margin: 20px 0;
            }
            .footer {
                margin-top: 30px;
                font-size: 14px;
                color: #666;
            }
			.registration-table {
            width: 100%;
            max-width: 600px;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .registration-table th, 
        .registration-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .registration-table th {
            background-color: #0070c0;
			color:white;
            font-weight: bold;
            width: 40%;
        }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header text-center'><b>REGISTRATION CONFIRMATION</b></div>
            
            <p class='text-center'>Dear, $data->title $data->firsnamebadge $data->surnamebadge</p>

			<p class='text-center'>Your registration for the <b>PERADI - LAWASIA Belt and Road Initiative & Employment Law Conference 2025</b> has been successful.</p>

			<p class='text-center'>Get ready to embark on a journey of navigating the legal landscape in the digital age, as we gather in the vibrant city of Jakarta, Indonesia!</p>

			<p class='text-center'><b><u>DATE</u></b><br>Sunday 10 to Monday 11 August 2025</p>
			<p class='text-center'><b><u>VENUE</u></b><br>Grand Hyatt Hotel<br> Jalan M.H. Thamrin Kav. 28 - 30, Jakarta, Indonesia 10350</p>

			<p class='text-center'><b><u>ONSITE REGISTRATION & WELCOMING RECEPTION AND NETWORKING NIGHT</u></b><br>
			Sunday, 10 August 2025<br>
			16:30 - 19:00 | Grand Ballroom<br>
			Please find below the summary of your registration.</p>


			<p class='text-center'><b><u>CLOSING DINNER & NETWORKING NIGHT</u></b><br>
			Monday, 11 August 2025<br>
			18:30 - 21:30 | Grand Ballroom</p>

			

			<p class='text-center'>Please find below the summary of your registration.</p>
            
            <p class='text-center'>We can't wait to welcome you to Jakarta for what promises to be an unforgettable conference experience!<br>
			In the meantime, please visit the <a href='https://peradi.or.id/lawasia-conference'>conference website</a> for updates.</p>
			
			<p class='text-center'>Kind regards <br><b>PERADI & LAWASIA</b></p>
			
			<p>&nbsp;</p>

            <p><b>Registration Data</b></p>
            <table class='registration-table'>
				<tr>
					<th>Registration Category</th>
					<td>" . htmlspecialchars($data->registration_type) . "</td>
				</tr>
				<tr>
					<th>Name Badge</th>
					<td> " . $data->firsnamebadge . " " . $data->surnamebadge . "</td>
				</tr>
				<tr>
					<th>Date of Payment</th>
					<td>" . htmlspecialchars($data->created_at) . "</td>
				</tr>
				<tr>
					<th>Registration ID</th>
					<td>" . $data->midtrans_order_id . "</td>
				</tr>
				<tr>
					<th>Amount (IDR)</th>
					<td class='currency'>Rp" . number_format($data->amount, 0, ',', '.') . "</td>
				</tr>
				<tr>
					<th>Payment Status</th>
					<td class='payment-success'>" . htmlspecialchars($data->payment_status) . "</td>
				</tr>
			</table>

            
            <p>If you have any queries, please contact the organisers and we will be happy to assist you:</p>
            
            <div class='footer'>
                <p><b>Registration queries:</b><br>
				PERADI-LAWASIA Conference & Events Team<br>
				Email: <a href='mailto:conference@peradi.or.id'>conference@peradi.or.id</a> / <a href='mailto:dpn.peradi.slipi@gmail.com'>dpn.peradi.slipi@gmail.com</a></p>
            </div>
        </div>
    </body>
    </html>	";	
		
 
		//send the message, check for errors
		if (!$mail->send()) {
    		echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
    		echo 'Message sent!';
		}

    }
}