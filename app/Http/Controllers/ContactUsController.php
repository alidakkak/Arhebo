<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactUsRequest;
use App\Http\Requests\UpdateContactUsRequest;
use App\Http\Resources\ContactUsResource;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index()
    {
        $contact = ContactUs::all();

        return ContactUsResource::collection($contact);
    }

    public function store(StoreContactUsRequest $request)
    {
        try {
            $isExisting = ContactUs::first();
            if ($isExisting) {
                $isExisting->update($request->all());

                return response()->json([
                    'message' => 'Updated SuccessFully',
                    'data' => ContactUsResource::make($isExisting),
                ]);
            }
            $contact = ContactUs::create($request->all());

            return response()->json([
                'message' => 'Created SuccessFully',
                'data' => ContactUsResource::make($contact),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    //    public function store(StoreContactUsRequest $request)
    //    {
    //        try {
    //            $contact = ContactUs::updateOrCreate($request->all());
    //
    //            return response()->json([
    //                'message' => 'Created SuccessFully',
    //                'data' => ContactUsResource::make($contact),
    //            ]);
    //        } catch (\Exception $e) {
    //            return response()->json([
    //                'message' => 'An error occurred',
    //                'error' => $e->getMessage(),
    //            ], 500);
    //        }
    //    }

    //    public function update(UpdateContactUsRequest $request, $Id)
    //    {
    //        try {
    //            $contact = ContactUs::find($Id);
    //            if (! $contact) {
    //                return response()->json(['message' => 'Not Found'], 404);
    //            }
    //            $contact->update($request->all());
    //
    //            return response()->json([
    //                'message' => 'Updated SuccessFully',
    //                'data' => ContactUsResource::make($contact),
    //            ]);
    //        } catch (\Exception $e) {
    //            return response()->json([
    //                'message' => 'An error occurred',
    //                'error' => $e->getMessage(),
    //            ], 500);
    //        }
    //    }

    public function delete($Id)
    {
        try {
            $contact = ContactUs::find($Id);
            if (! $contact) {
                return response()->json(['message' => 'Not Found'], 404);
            }
            $contact->delete();

            return response()->json([
                'message' => 'Deleted SuccessFully',
                'data' => ContactUsResource::make($contact),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
