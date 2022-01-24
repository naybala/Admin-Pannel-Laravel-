<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //direct to Contact Page
    public function contact()
    {
        $data = Contact::paginate(5);
        if (count($data) == 0) {
            $emptyStatus = 0;
        } else {
            $emptyStatus = 1;
        }
        return view('admin.userContact.userContact')->with(['contact' => $data, 'status' => $emptyStatus]);
    }

    //Search Contact
    public function searchContact(Request $request)
    {
        $data = Contact::orWhere('name', 'like', '%' . $request->tableSearch . '%')
            ->orWhere('email', 'like', '%' . $request->tableSearch . '%')
            ->orWhere('message', 'like', '%' . $request->tableSearch . '%')
            ->paginate(5);
        if (count($data) == 0) {
            $emptyStatus = 0;
        } else {
            $emptyStatus = 1;
        }
        $data->appends($request->all());
        return view('admin.userContact.userContact')->with(['contact' => $data, 'status' => $emptyStatus]);
    }
}