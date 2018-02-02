<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttachmentsController extends Controller {

    public function store(Request $request) {

        $result = [];

        foreach ($request->allFiles() as $file) {

            $file_name = preg_replace('/\.' . $file->getClientOriginalExtension() . '$/', '', trim($file->getClientOriginalName()));
            $file_name = str_slug($file_name) . '.' . strtolower($file->getClientOriginalExtension());

            $path = $file->storeAs('attachments', $file_name, ['disk' => 'attachments']);
            $result[] = [
                'name' => $file->getClientOriginalName(),
                'path' => $path,
                'url'  => 'https://s3.' . config('filesystems.disks.attachments.region') . '.amazonaws.com/' . config('filesystems.disks.attachments.bucket') . '/' . $path,
            ];
        }

        return [
            'data' => $result,
        ];

    }

}
