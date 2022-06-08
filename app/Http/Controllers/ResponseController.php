<?php

namespace App\Http\Controllers;

use App\Models\Response;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Services\AcceptResponse;
use App\Http\Services\DeleteResponse;

class ResponseController extends Controller
{
    public function __invoke($responseId, $service)
    {
        try {
            $response = Response::findOrFail($responseId);

            $service->execute($response);

            return back();
        }
        catch(ModelNotFoundException $exception) {
            return back();
        }
    }

    public function accept($responseId) {
        return $this->__invoke($responseId, new AcceptResponse());
    }

    public function delete($responseId) {
        return $this->__invoke($responseId, new DeleteResponse());
    }
}
