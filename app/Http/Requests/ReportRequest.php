<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:255',
            'identity_type' => 'required|string|max:255',
            'identity_number' => 'required|string|max:255',
            'pob' => 'required|string|max:255',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'report_proof' => 'required|file|image|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'email' => 'Maaf, email Anda tidak valid.',
            'max' => 'Tidak boleh lebih dari :max karakter.',
            'date' => 'Mohon masukkan tanggal yang valid.',
            'name' => 'Nama wajib diisi',
            'email' => 'Email wajib diisi',
            'phone_number.required' => 'Nomor HP wajib diisi',
            'identity_type.required' => 'Tipe identitas wajib diisi',
            'identity_number.required' => 'Nomor identitas wajib diisi',
            'pob.required' => 'Tempat lahir wajib diisi.',
            'dob.required' => 'Tanggal lahir wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'title.required' => 'Judul laporan wajib diisi',
            'description.required' => 'Deskripsi laporan wajib diisi',
            'report_proof.required' => 'Bukti laporan wajib diisi',
            'report_proof.max' => 'Ukuran file tidak boleh lebih dari :max',
            'report_proof.image' => 'File harus berupa gambar'
        ];
    }
}
