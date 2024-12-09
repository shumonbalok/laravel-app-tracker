<?php

namespace Shumonpal\LaravelAppTracker\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Shumonpal\LaravelAppTracker\Models\LicenceKeyUser;

class LicenceKeyUserController extends Controller
{

    /**
     * Display a listing of the LicenceKeyUser.
     *
          * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = LicenceKeyUser::latest()
            ->when($search = $request->search, function ($query) use($search) {
                $query->where('licence_key', 'LIKE', '%'. $search . '%')
                ->orWhere('domain', 'LIKE', '%'. $search . '%');
            })
            ->paginate(20)->withQueryString();
        return view('shumonpal::licence-key-users.index', compact('users'));
    }

 
    /**
     * Remove the specified LicenceKeyUser from storage.
     *
     * @param LicenceKeyUser $licenceKeyUser
     *
     * @return Response
     */
    public function destroy(LicenceKeyUser $licenceKeyUser)
    {
        $licenceKeyUser->delete();

        return redirect(route('app-tracker.licence-key-users.index'))->with('success', 'User successfully deleted!');
    }
}
