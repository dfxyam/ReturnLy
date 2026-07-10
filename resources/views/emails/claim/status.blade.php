<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Status Klaim - ReturnLy</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f3f4f6; padding: 20px; margin: 0;">
    <div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        
        {{-- Header --}}
        <div style="background: {{ $status === 'Disetujui' ? 'linear-gradient(135deg, #059669 0%, #10b981 100%)' : 'linear-gradient(135deg, #dc2626 0%, #ef4444 100%)' }}; padding: 30px; text-align: center;">
            <h1 style="color: white; margin: 0; font-size: 28px;">
                {{ $status === 'Disetujui' ? '✅ Klaim Disetujui!' : '❌ Klaim Ditolak' }}
            </h1>
            <p style="color: rgba(255,255,255,0.9); margin: 10px 0 0 0; font-size: 14px;">ReturnLy - Platform Lost & Found Digital</p>
        </div>

        {{-- Content --}}
        <div style="padding: 30px;">
            <p style="color: #374151; line-height: 1.6; font-size: 16px;">
                Halo <strong style="color: #1e3a5f;">{{ $claimantName }}</strong>,
            </p>
            
            <p style="color: #374151; line-height: 1.6; font-size: 16px;">
                Kami ingin menginformasikan bahwa klaim Anda dengan nomor <strong style="font-family: 'Courier New', monospace;">{{ $claimNumber }}</strong> untuk barang <strong>{{ $itemName }}</strong> telah diproses oleh admin.
            </p>

            {{-- Status Box --}}
            @if($status === 'Disetujui')
                <div style="background: #d1fae5; border-left: 4px solid #10b981; padding: 20px; margin: 25px 0; border-radius: 8px;">
                    <p style="margin: 0 0 10px 0; color: #065f46; font-size: 18px; font-weight: 600;">🎉 Selamat! Klaim Anda Disetujui</p>
                    <p style="margin: 0; color: #065f46; line-height: 1.6;">
                        Silakan hubungi admin untuk mengambil barang Anda. Jangan lupa membawa kartu identitas (KTP/Kartu Pelajar) untuk verifikasi.
                    </p>
                </div>
            @else
                <div style="background: #fee2e2; border-left: 4px solid #ef4444; padding: 20px; margin: 25px 0; border-radius: 8px;">
                    <p style="margin: 0 0 10px 0; color: #991b1b; font-size: 18px; font-weight: 600;">😔 Mohon Maaf, Klaim Anda Ditolak</p>
                    <p style="margin: 0; color: #991b1b; line-height: 1.6;">
                        Klaim Anda tidak dapat disetujui. Anda dapat mengajukan klaim ulang dengan bukti kepemilikan yang lebih lengkap.
                    </p>
                </div>
            @endif

            {{-- Admin Notes --}}
            @if($adminNotes)
                <div style="background: #f0f9ff; border-left: 4px solid #3b82f6; padding: 20px; margin: 25px 0; border-radius: 8px;">
                    <p style="margin: 0 0 10px 0; color: #1e40af; font-size: 14px; font-weight: 600;"> Catatan dari Admin</p>
                    <p style="margin: 0; color: #1e40af; line-height: 1.6; font-style: italic;">
                        "{{ $adminNotes }}"
                    </p>
                </div>
            @endif

            {{-- Claim Info --}}
            <div style="background: #f9fafb; padding: 20px; border-radius: 8px; margin: 20px 0;">
                <p style="margin: 0 0 10px 0; color: #6b7280; font-size: 14px; font-weight: 600;">📋 Informasi Klaim</p>
                <p style="margin: 0 0 5px 0; color: #1f2937; font-size: 14px;"><strong>Nomor Klaim:</strong> {{ $claimNumber }}</p>
                <p style="margin: 0 0 5px 0; color: #1f2937; font-size: 14px;"><strong>Barang:</strong> {{ $itemName }}</p>
                <p style="margin: 0 0 5px 0; color: #1f2937; font-size: 14px;"><strong>Status:</strong> {{ $status }}</p>
                <p style="margin: 0; color: #1f2937; font-size: 14px;"><strong>Tanggal Pengajuan:</strong> {{ $claimDate }}</p>
            </div>

            {{-- CTA Button --}}
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/claim-status') }}" style="background: {{ $status === 'Disetujui' ? '#10b981' : '#3b82f6' }}; color: white; padding: 14px 30px; text-decoration: none; border-radius: 8px; font-weight: 600; display: inline-block;">
                    Cek Status Klaim
                </a>
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