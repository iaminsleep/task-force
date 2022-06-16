<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeSettingsRequest;
use App\Http\Services\ChangeSettings;

use Illuminate\Support\Facades\Log;

class AccountChangeController extends Controller
{
    public function __invoke(ChangeSettingsRequest $request, ChangeSettings $service) {
        $service->execute($request->validated());

        return redirect('/account');
    }
}
