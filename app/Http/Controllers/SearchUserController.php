<?php

namespace App\Http\Controllers;

use App\Http\Services\SearchUserService;

class SearchUserController extends Controller
{
    public function __invoke(SearchUserService $service) {
        $searchParameters = request()->all();

        if (empty(array_filter($searchParameters, function ($searchParam) {
            return $searchParam !== null; //check if search parameters are empty
        }))) {
            return redirect('/users');
        }
        else {
            $users = $service->execute();
            $users = $users->paginate(4);
        }

        return view('search-user.index', ['users' => $users]);
    }
}
