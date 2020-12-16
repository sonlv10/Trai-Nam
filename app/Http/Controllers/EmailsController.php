<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SendEmailService;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\EmailCreateRequest;
use App\Http\Requests\EmailUpdateRequest;
use App\Repositories\EmailRepository;
use App\Validators\EmailValidator;

/**
 * Class EmailsController.
 *
 * @package namespace App\Http\Controllers;
 */
class EmailsController extends Controller
{
    /**
     * @var EmailRepository
     */
    protected $repository;

    /**
     * @var EmailValidator
     */
    protected $validator;

    /**
     * EmailsController constructor.
     *
     * @param EmailRepository $repository
     * @param EmailValidator $validator
     */
    public function __construct(EmailValidator $validator)
    {
        $this->repository = app(EmailRepository::class);
        $this->validator  = $validator;
    }

    public function sendEmail(Request $request)
    {
        $data = $request->get('data');
        $email = app(SendEmailService::class);
        $email->sendEmail();
    }
}
