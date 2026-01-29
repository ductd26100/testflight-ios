<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validate dữ liệu
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telegram' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng điền đầy đủ thông tin!',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Dữ liệu từ form
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'telegram' => $request->telegram,
                'message' => $request->message,
            ];

            // Gửi email
            Mail::to(env('MAIL_TO_ADDRESS', 'your-email@example.com'))
                ->send(new ContactFormMail($data));

            return response()->json([
                'success' => true,
                'message' => 'Tin nhắn đã được gửi thành công! Chúng tôi sẽ liên hệ lại sớm.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi gửi tin nhắn. Vui lòng thử lại sau!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
