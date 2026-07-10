<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Konfirmasi Klaim - ReturnLy</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f3f4f6; padding: 20px; margin: 0;">
    <div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        
        {{-- Header --}}
        <div style="background: linear-gradient(135deg, #1e3a5f 0%, #3b82f6 100%); padding: 30px; text-align: center;">
            <h1 style="color: white; margin: 0; font-size: 28px;"> ReturnLy</h1>
            <p style="color: rgba(255,255,255,0.9); margin: 10px 0 0 0; font-size: 14px;">Platform Lost & Found Digital</p>
        </div>

        {{-- Content --}}
        <div style="padding: 30px;">
            <h2 style="color: #1e3a5f; margin-top: 0;">Klaim Berhasil Diajukan!</h2>
            
            <p style="color: #374151; line-height: 1.6; font-size: 16px;">
                Halo <strong style="color: #1e3a5f;">{{ $claimantName }}</strong>,
            </p>
            
            <p style="color: #374151; line-height: 1.6; font-size: 16px;">
                Terima kasih telah mengajukan klaim di ReturnLy. Klaim Anda telah kami terima dan sedang dalam proses verifikasi oleh admin.
            </p>

            {{-- Claim Number Box --}}
            <div style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 20px; margin: 25px 0; border-radius: 8px;">
                <p style="margin: 0 0 8px 0; color: #1e40af; font-size: 14px; font-weight: 600;">📋 Nomor Klaim Anda</p>
                <p style="margin: 0; font-size: 28px; font-weight: bold; color: #1e40af; font-family: 'Courier New', monospace; letter-spacing: 1px;">
                    {{ $claimNumber }}
                </p>
            </div>

            {{-- Item Info --}}
            <div style="background: #f9fafb; padding: 20px; border-radius: 8px; margin: 20px 0;">
                <p style="margin: 0 0 10px 0; color: #6b7280; font-size: 14px; font-weight: 600;">📦 Detail Barang yang Diklaim</p>
                <p style="margin: 0 0 5px 0; color: #1f2937; font-size: 16px;"><strong>Nama:</strong> {{ $itemName }}</p>
                <p style="margin: 0 0 5px 0; color: #1f2937; font-size: 16px;"><strong>Tanggal Ditemukan:</strong> {{ $foundDate }}</p>
                <p style="margin: 0; color: #1f2937; font-size: 16px;"><strong>Lokasi:</strong> {{ $locationName }}</p>
            </div>

            {{-- Important Info --}}
            <div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 20px; margin: 25px 0; border-radius: 8px;">
                <p style="margin: 0 0 10px 0; color: #92400e; font-size: 14px; font-weight: 600;">⚠️ Informasi Penting</p>
                <ul style="margin: 0; padding-left: 20px; color: #92400e; line-height: 1.8;">
                    <li>Simpan nomor klaim di atas untuk mengecek status</li>
                    <li>Admin akan memverifikasi dalam 1x24 jam</li>
                    <li>Anda akan dihubungi via email/WhatsApp jika klaim disetujui</li>
                    <li>Cek status klaim di: <a href="{{ url('/claim-status') }}" style="color: #b45309; font-weight: 600;">{{ url('/claim-status') }}</a></li>
                </ul>
            </div>

            <p style="color: #6b7280; font-size: 14px; margin-top: 30px; line-height: 1.6;">
                Salam hangat,<br>
                <strong style="color: #1e3a5f;">Tim ReturnLy</strong>
            </p>
        </div>

        {{-- Footer --}}
        <div style="background: #f9fafb; padding: 20px; text-align: center; border-top: 1px solid #e5e7eb;">
            <p style="margin: 0; color: #9ca3af; font-size: 12px;">
                Email ini dikirim secara otomatis oleh sistem ReturnLy.<br>
                Mohon tidak membalas email ini.
            </p>
        </div>
    </div>
</body>
</html>