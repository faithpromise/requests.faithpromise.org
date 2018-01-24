<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttachmentsController extends Controller {

    public function store(Request $request) {

        $result = [];

        foreach ($request->allFiles() as $file) {
            $path = $file->storeAs('temp', $file->getClientOriginalName());
            $result[] = [
                'name' => $file->getClientOriginalName(),
                'path' => $path,
            ];
        }

        return [
            'data' => $result,
        ];

    }

}
