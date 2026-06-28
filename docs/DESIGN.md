# ReturnLy Design System

### Version 1.0

**Part 1 — Foundation**

---

# ReturnLy

> **Helping every lost item find its way home.**

ReturnLy adalah web aplikasi Lost & Found untuk lingkungan sekolah yang memudahkan siswa maupun admin dalam melaporkan, mencari, mengelola, serta mengembalikan barang yang hilang maupun ditemukan.

Design System ini menjadi acuan utama seluruh proses pengembangan UI/UX agar seluruh halaman memiliki tampilan yang konsisten, modern, mudah digunakan, dan mudah dikembangkan.

---

# 1. Brand Identity

## Brand Name

ReturnLy

---

## Brand Personality

ReturnLy harus memberikan kesan:

* Trusted
* Helpful
* Clean
* Modern
* Friendly
* Organized
* Fast
* Reliable

Bukan:

* Playful berlebihan
* Ramai
* Banyak warna
* Terlihat seperti e-commerce
* Terlihat seperti game

---

## Brand Mission

Menghubungkan pemilik dengan barang yang hilang secara cepat, aman, dan transparan melalui sistem digital sekolah.

---

## Brand Voice

Semua copywriting menggunakan bahasa yang:

* sederhana
* jelas
* singkat
* tidak bertele-tele

Contoh:

✔ Barang berhasil dilaporkan.

✔ Klaim sedang diverifikasi.

✔ Barang telah dikembalikan.

Bukan

✖ Selamat! Anda telah berhasil melakukan proses pelaporan barang.

---

# 2. Design Philosophy

ReturnLy mengutamakan tiga hal:

## 1. Search First

Fitur terpenting adalah pencarian barang.

Search harus menjadi fokus pertama ketika user membuka website.

---

## 2. Status is Everything

Setiap barang memiliki status.

Status harus mudah dikenali hanya dari warna dan badge.

---

## 3. Minimal Distraction

UI tidak boleh memiliki dekorasi yang tidak membantu pengguna.

Setiap elemen harus memiliki tujuan.

---

# 3. Design Principles

## Clear

Semua informasi mudah dibaca.

Tidak ada teks kecil yang sulit dilihat.

---

## Consistent

Button, card, badge, table, modal, sidebar memiliki bentuk yang sama di seluruh aplikasi.

---

## Accessible

Kontras memenuhi standar WCAG AA.

Keyboard navigation didukung.

Focus state selalu terlihat.

---

## Fast

User dapat melaporkan barang kurang dari 2 menit.

---

## Responsive

Desktop menjadi prioritas utama.

Tablet dan Mobile tetap nyaman digunakan.

---

# 4. Color System

## Primary

Deep Navy

HEX

#0B3658

Digunakan untuk

* Heading
* Logo
* Sidebar
* Navbar
* Primary Text

---

## Secondary

Signal Blue

HEX

#4E9AD9

Digunakan untuk

* Button
* Active State
* Link
* Focus
* Progress

---

## Success

HEX

#10B981

Digunakan untuk

* Barang ditemukan
* Berhasil
* Approved
* Completed

---

## Danger

HEX

#EF4444

Digunakan untuk

* Barang hilang
* Delete
* Error

---

## Warning

HEX

#F59E0B

Digunakan untuk

* Pending
* Menunggu
* Draft

---

## Info

HEX

#3B82F6

Digunakan untuk

* Informasi
* Notifikasi
* Timeline

---

## Neutral

Background

#FFFFFF

---

Surface

#F8FAFC

---

Border

#E2E8F0

---

Text Primary

#0F172A

---

Text Secondary

#64748B

---

Disabled

#CBD5E1

---

# 5. Status Color

Status menjadi identitas utama ReturnLy.

| Status               | Color   |
| -------------------- | ------- |
| Lost                 | Red     |
| Found                | Green   |
| Pending              | Orange  |
| Waiting Verification | Amber   |
| Approved             | Blue    |
| Returned             | Emerald |
| Rejected             | Gray    |

---

# 6. Typography

## Font Family

Primary

Inter

Fallback

Plus Jakarta Sans

System UI

---

## Heading

Weight

700

---

## Display

Weight

800

---

## Body

Weight

400

---

## Font Scale

Display

48

Heading 1

36

Heading 2

30

Heading 3

24

Heading 4

20

Body

16

Caption

14

Small

12

---

# 7. Spacing System

Base Unit

4px

Scale

4

8

12

16

20

24

32

40

48

56

64

80

96

128

---

# 8. Border Radius

Cards

20px

Buttons

16px

Inputs

16px

Badge

999px

Modal

24px

Image

20px

---

# 9. Shadow

Small

0 2px 8px rgba(15,23,42,.06)

Medium

0 8px 24px rgba(15,23,42,.08)

Large

0 20px 60px rgba(15,23,42,.12)

Tidak menggunakan shadow hitam pekat.

---

# 10. Grid System

Container

1280px

Content Width

1200px

Columns

12

Gap

24px

Section Spacing

80px

---

# 11. Layout Philosophy

Website dibagi menjadi dua area utama.

## User Interface

* Landing Page
* Search
* Lost Items
* Found Items
* Detail Item
* Report Form
* Claim
* Profile

---

## Admin Dashboard

* Dashboard
* Lost Items
* Found Items
* Categories
* Locations
* Claims
* Statistics
* Activity Logs

Kedua area memiliki komponen yang sama tetapi layout berbeda.

---

# 12. Iconography

Menggunakan

Lucide Icons

Ukuran

16

20

24

32

Style

Outline

Tidak menggunakan icon 3D.

---

# 13. Illustration Style

Menggunakan

* Flat Illustration
* Simple Illustration
* Rounded Shape

Tidak menggunakan

* Anime
* Cartoon
* Glass Object
* Heavy Gradient

---

# 14. Photography

Foto barang harus:

* asli
* jelas
* rasio 4:3
* background netral
* tidak blur

---

# 15. Motion

Durasi

150ms

Hover

Scale 1.02

Button

Opacity + Shadow

Card

Translate Y -4px

Modal

Fade + Scale

Sidebar

Slide

Tidak menggunakan animasi berlebihan.

---

# 16. Accessibility

Minimal contrast

WCAG AA

Keyboard Navigation

Required

Focus Ring

2px Signal Blue

Alt Text

Required

Form Label

Required

---

# 17. Responsive Breakpoint

Mobile

<640px

Tablet

640–1023px

Desktop

1024–1439px

Large Desktop

≥1440px

---

# 18. Design Goals

ReturnLy harus terasa seperti aplikasi SaaS modern, bukan website sekolah biasa.

Inspirasi utama:

* Linear
* GitHub
* Notion
* Stripe
* Vercel

Namun seluruh komponen disesuaikan dengan kebutuhan sistem Lost & Found sekolah.

# ReturnLy Design System

## Part 2 — Component Library

---

# Component Philosophy

Semua komponen ReturnLy mengikuti prinsip berikut:

* Simple
* Consistent
* Accessible
* Reusable
* Mobile Friendly

Komponen tidak boleh dibuat ulang setiap halaman.

Gunakan komponen yang sama dengan style yang sama.

---

# 1. Navigation Bar

## Purpose

Navigasi utama untuk User.

---

## Desktop Layout

```
--------------------------------------------------------------

ReturnLy

Home

Lost Items

Found Items

Report Item

About

                 🔍 Search...

                 🔔

                 Login

--------------------------------------------------------------
```

---

## Height

72px

---

## Background

White

---

## Shadow

Small

---

## Sticky

Yes

Top

0

---

## Logo

Height

32px

---

## Menu

Gap

32px

---

## Active Menu

Color

Signal Blue

Weight

600

Bottom Border

2px

---

# Mobile Navbar

Menggunakan

Hamburger Menu

Bottom Sheet

---

# 2. Sidebar Admin

Desktop Only

```
--------------------------------

LOGO

Dashboard

Lost Items

Found Items

Claims

Categories

Locations

Statistics

Activity Logs

Settings

Logout

--------------------------------
```

---

## Width

280px

---

## Background

Primary Navy

---

## Active Menu

Background

Signal Blue

Text

White

Radius

12px

---

## Menu Height

48px

---

## Icon

Lucide

20px

---

# 3. Hero Search

Hero menjadi fokus utama homepage.

```
--------------------------------------

Cari barangmu sekarang.

[ Search Barang............. ]

Kategori

Lokasi

Status

[ Cari ]

--------------------------------------
```

---

## Height

420px

---

## Background

Gradient White

→

Soft Blue

---

## Search Width

720px

---

## Search Height

60px

---

## Placeholder

Cari nama barang...

---

# 4. Search Input

Radius

16px

---

Height

56px

---

Padding

16px

---

Leading Icon

Search

---

Trailing Icon

Shortcut

Optional

---

Focus

2px Signal Blue

---

# 5. Filter Bar

Horizontal

Desktop

```
Kategori

Lokasi

Status

Tanggal

Reset Filter
```

---

Gap

16px

---

Responsive

Scrollable

---

# 6. Primary Button

Purpose

Action utama.

Contoh

Laporkan Barang

Cari

Simpan

---

Height

48px

---

Radius

16px

---

Background

Signal Blue

---

Text

White

---

Hover

Darker Blue

---

Loading

Spinner

---

Disabled

Gray

---

# 7. Secondary Button

Background

White

Border

Gray

Text

Primary Navy

---

Hover

Light Blue

---

# 8. Danger Button

Background

Red

---

Text

White

---

Hover

Dark Red

---

Digunakan untuk

Delete

Reject

---

# 9. Status Badge

Status merupakan komponen penting.

Gunakan bentuk

Pill

Radius

999px

Padding

6px 12px

---

Lost

Background

Light Red

Text

Red

---

Found

Background

Light Green

Text

Green

---

Pending

Background

Light Yellow

Text

Orange

---

Approved

Background

Light Blue

Text

Blue

---

Returned

Background

Light Emerald

Text

Green

---

Rejected

Background

Gray

Text

Dark Gray

---

# 10. Item Card

Komponen utama ReturnLy.

```
+--------------------------------+

[ IMAGE ]

Dompet Hitam

Lost

Lab Komputer

3 Jam yang lalu

[Lihat Detail]

+--------------------------------+
```

---

Width

340px

---

Radius

20px

---

Image Ratio

4:3

---

Padding

20px

---

Gap

16px

---

Shadow

Medium

---

Hover

Translate

-4px

---

# 11. Detail Card

Menampilkan informasi barang.

Field

Foto

Nama

Kategori

Lokasi

Tanggal

Status

Deskripsi

Pelapor

---

Button

Claim

---

# 12. Image Upload

Menggunakan

Drag & Drop

---

Support

PNG

JPG

JPEG

WEBP

---

Preview

Required

---

Max Size

5MB

---

# 13. Text Field

Height

48px

---

Radius

16px

---

Placeholder

Gray

---

Error

Border Red

---

Focus

Blue

---

# 14. Text Area

Minimum Height

140px

---

Resize

Vertical

---

# 15. Select Dropdown

Radius

16px

---

Height

48px

---

Chevron

Lucide

---

# 16. Checkbox

Rounded

6px

---

Color

Signal Blue

---

# 17. Radio Button

Primary

Signal Blue

---

# 18. Date Picker

Native Browser

atau

Flatpickr

---

# 19. Modal

Radius

24px

---

Max Width

640px

---

Animation

Fade

Scale

---

Overlay

Black

40%

---

# 20. Toast Notification

Position

Top Right

---

Success

Green

---

Error

Red

---

Warning

Orange

---

Duration

3000ms

---

# 21. Empty State

```
📦

Belum ada barang.

Laporkan barang sekarang.

[ Laporkan ]
```

---

# 22. Skeleton Loading

Card

Avatar

Text

Button

Gunakan saat loading.

---

# 23. Pagination

Rounded

---

Previous

Number

Next

---

Current

Signal Blue

---

# 24. Breadcrumb

Home

/

Lost Items

/

Detail

---

# 25. Data Table

Admin Only

Kolom

Foto

Nama

Kategori

Status

Tanggal

Pelapor

Aksi

---

Action

View

Edit

Delete

Approve

Reject

---

# 26. Dashboard Statistic Card

```
-------------------

📦

245

Lost Items

-------------------
```

---

Height

140px

---

Radius

20px

---

Shadow

Medium

---

# 27. Chart Card

Charts

Bar

Line

Pie

---

Padding

24px

---

# 28. Recent Activity Card

```
Hari ini

Admin menyetujui klaim.

Admin menghapus laporan.

Siswa melaporkan barang.

```

---

# 29. Timeline

Pending

↓

Verification

↓

Approved

↓

Returned

---

Current Step

Signal Blue

---

Completed

Green

---

Future

Gray

---

# 30. Confirmation Dialog

Judul

Yakin ingin menghapus?

---

Button

Cancel

Delete

---

Delete

Red

---

# 31. Profile Dropdown

Avatar

Nama

Role

Profile

Logout

---

# 32. Notification Dropdown

Unread Badge

Grouped by Date

Click to Open

---

# 33. Footer

Logo

Quick Links

Contact

School Information

Copyright

---

Background

Primary Navy

---

Text

White

---

# Component Rules

Semua komponen wajib:

✔ Radius konsisten

✔ Shadow konsisten

✔ Typography konsisten

✔ Icon Lucide

✔ Hover State

✔ Focus State

✔ Disabled State

✔ Loading State

✔ Error State

✔ Responsive

Tidak diperbolehkan membuat komponen baru jika fungsi yang sama sudah tersedia pada Design System ini.
---
# USER EXPERIENCE FLOW

```
Landing Page

↓

Cari Barang

↓

Detail Barang

↓

Login (Jika belum)

↓

Ajukan Klaim

↓

Menunggu Verifikasi

↓

Barang Dikembalikan
```

---

# 1. Landing Page

## Purpose

Sebagai halaman pertama yang langsung membantu siswa mencari barang.

Homepage **bukan** halaman promosi.

Homepage adalah halaman pencarian.

---

## Layout

```
---------------------------------------------------------

Navbar

---------------------------------------------------------

Hero Search

---------------------------------------------------------

Quick Statistics

---------------------------------------------------------

Latest Lost Items

---------------------------------------------------------

Latest Found Items

---------------------------------------------------------

How ReturnLy Works

---------------------------------------------------------

FAQ

---------------------------------------------------------

Footer

---------------------------------------------------------
```

---

# Hero Section

Height

420px

---

Background

White

↓

Soft Blue Gradient

---

Headline

## Temukan Barangmu Kembali.

---

Subtitle

Laporkan barang hilang atau cari barang yang telah ditemukan di lingkungan sekolah.

---

Search

Lebar

720px

Placeholder

Cari nama barang...

---

Quick Filter

Lost

Found

Kategori

Lokasi

---

Primary CTA

Cari Barang

---

Secondary CTA

Laporkan Barang

---

# Quick Statistics

Menampilkan ringkasan sistem.

Card

4 buah

```
+----------------+

120

Barang Hilang

+----------------+

95

Barang Ditemukan

+----------------+

80

Barang Berhasil Dikembalikan

+----------------+

12

Pending Klaim

+----------------+
```

---

# Latest Lost Items

Grid

4 Column

Desktop

2 Column

Tablet

1 Column

Mobile

---

Menggunakan

Item Card

---

Button

Lihat Semua

---

# Latest Found Items

Layout sama.

---

# How ReturnLy Works

```
1.

Laporkan Barang

↓

2.

Admin Verifikasi

↓

3.

Pemilik Klaim

↓

4.

Barang Dikembalikan
```

Menggunakan Timeline Component.

---

# FAQ

Accordion

Pertanyaan umum.

---

# Footer

Logo

Tentang

Kontak

Sekolah

Social

---

# 2. Lost Items Page

Purpose

Menampilkan seluruh laporan barang hilang.

---

Layout

```
Breadcrumb

↓

Title

↓

Search

↓

Filter

↓

Grid Item

↓

Pagination
```

---

Filter

Kategori

Lokasi

Tanggal

Status

---

Sort

Newest

Oldest

A-Z

---

Grid

Desktop

4

Tablet

2

Mobile

1

---

# Empty State

Belum ada laporan barang hilang.

---

# 3. Found Items Page

Layout sama seperti Lost Items.

Badge berubah menjadi

FOUND

---

CTA

Ajukan Klaim

---

# 4. Item Detail Page

Layout

```
-----------------------------------------

Breadcrumb

-----------------------------------------

Image Gallery

Item Information

-----------------------------------------

Description

-----------------------------------------

Location Map

-----------------------------------------

Timeline

-----------------------------------------

Reporter Information

-----------------------------------------

Related Items

-----------------------------------------
```

---

Image

Aspect Ratio

4:3

---

Information

Nama

Kategori

Lokasi

Tanggal

Status

Kode Barang

---

Action Button

Claim Item

---

Status

Badge

Paling atas

---

Timeline

Reported

↓

Verified

↓

Waiting Owner

↓

Returned

---

# 5. Report Lost Item

Layout

```
Stepper

↓

Form

↓

Preview

↓

Submit
```

---

Field

Nama Barang

Kategori

Lokasi Hilang

Tanggal

Deskripsi

Foto

Kontak

---

Upload

Drag & Drop

---

Preview

Live Preview

---

Button

Submit

---

# 6. Report Found Item

Layout sama.

Lokasi berubah

Lokasi Ditemukan.

---

# 7. Claim Item

Purpose

Pemilik mengajukan klaim.

---

Layout

```
Item Summary

↓

Claim Form

↓

Proof Upload

↓

Submit
```

---

Field

Nama

Kelas

Nomor HP

Alasan Klaim

Ciri-ciri Barang

Upload Bukti

---

Button

Ajukan Klaim

---

# 8. Claim Status Page

Menampilkan status klaim.

Layout

```
Item Summary

↓

Timeline

↓

Admin Note

↓

History
```

---

Timeline

Pending

↓

Verified

↓

Approved

↓

Returned

---

Current Step

Blue

Completed

Green

---

# 9. User Profile

Layout

```
Sidebar

↓

Overview

↓

My Reports

↓

My Claims

↓

Account Settings
```

---

Overview Card

Nama

Role

Jumlah Laporan

Jumlah Klaim

---

My Reports

Table

---

My Claims

Table

---

Settings

Nama

Email

Password

Photo

---

# Responsive Rules

Desktop

Sidebar

Visible

---

Tablet

Sidebar

Collapse

---

Mobile

Bottom Navigation

Home

Search

Report

Notification

Profile

---

# UX Rules

Home selalu menampilkan Search paling atas.

Lost dan Found menggunakan layout yang identik.

Status Badge wajib konsisten.

Timeline wajib muncul pada halaman Detail dan Status Klaim.

Setiap form memiliki validasi real-time.

Foto barang selalu menggunakan rasio 4:3.

Semua halaman memiliki Breadcrumb kecuali Landing Page.

Button utama selalu berwarna Signal Blue.

Button sekunder selalu Outline.

Danger Action hanya muncul pada halaman yang memerlukan konfirmasi.

Loading menggunakan Skeleton.

Tidak menggunakan Spinner penuh kecuali proses upload.

---

# ADMIN DESIGN PHILOSOPHY

Admin Dashboard bukan sekadar halaman CRUD.

Dashboard harus mampu membantu admin:

* melihat kondisi sistem dalam sekali pandang
* memproses laporan dengan cepat
* memverifikasi klaim
* memonitor aktivitas sekolah

Admin menghabiskan waktu lebih lama daripada user biasa.

Karena itu dashboard harus mengutamakan:

✔ Efisiensi

✔ Informasi

✔ Konsistensi

✔ Kecepatan

---

# Dashboard Layout

```text
----------------------------------------------------------

Sidebar

|

Top Navigation

|

Overview Cards

|

Charts

|

Recent Activity

|

Latest Claims

|

Latest Reports

----------------------------------------------------------
```

Desktop menggunakan Sidebar.

Tablet menggunakan Collapse Sidebar.

Mobile menggunakan Drawer.

---

# Sidebar

## Width

280px

---

## Background

Primary Navy

#0B3658

---

## Logo

ReturnLy

32px

Bold

White

---

## Menu

Dashboard

Lost Items

Found Items

Claims

Categories

Locations

Users

Statistics

Activity Logs

Settings

Logout

---

## Active Menu

Background

Signal Blue

Radius

12px

Text

White

Icon

White

---

## Inactive Menu

Text

#CBD5E1

Hover

Light Blue

---

# Top Navigation

Height

72px

---

## Left

Breadcrumb

---

## Center

Global Search

Placeholder

Cari laporan...

---

## Right

Notification

Admin Profile

Dark Mode

---

# Dashboard Overview

Dashboard selalu dibuka pada halaman ini.

---

## Statistics Cards

```text
-------------------------------------------------

📦

245

Lost Items

-------------------------------------------------

📦

198

Found Items

-------------------------------------------------

🙋

18

Pending Claims

-------------------------------------------------

✅

164

Returned

-------------------------------------------------
```

---

Card Width

Responsive

---

Card Height

140px

---

Radius

20px

---

Shadow

Medium

---

Hover

Translate -4px

---

# Dashboard Charts

## Line Chart

Laporan per Bulan

---

## Pie Chart

Kategori Barang

---

## Bar Chart

Lokasi Barang Ditemukan

---

Card Radius

20px

Padding

24px

---

# Recent Activity

Menampilkan aktivitas terbaru.

```text
08:12

Admin menyetujui klaim.

----------------------

08:20

Siswa melaporkan HP.

----------------------

09:10

Admin menghapus laporan.

```

---

Jumlah

10 aktivitas terakhir.

---

# Latest Claims

Menampilkan klaim terbaru.

Kolom

Nama Barang

Pengaju

Tanggal

Status

Aksi

---

Button

View

Approve

Reject

---

# Latest Reports

Gabungan

Lost

Found

Terbaru

---

# Lost Items Management

Layout

```text
Breadcrumb

↓

Header

↓

Action Bar

↓

Filter

↓

Table

↓

Pagination
```

---

Action Bar

Tambah Barang

Export

Refresh

---

Filter

Search

Kategori

Lokasi

Status

Tanggal

---

Table Columns

Foto

Nama

Kategori

Lokasi

Tanggal

Pelapor

Status

Action

---

Action

View

Edit

Delete

---

Bulk Action

Delete

Export

---

# Found Items Management

Layout sama.

Action

Tambah Barang Ditemukan

---

# Claim Verification

Halaman paling penting.

Layout

```text
Claim List

↓

Claim Detail

↓

Proof

↓

Timeline

↓

Action
```

---

Claim Detail

Nama Pengaju

Kelas

Nomor HP

Barang

Tanggal

---

Proof Upload

Preview Image

Zoom

Download

---

Timeline

Pending

↓

Review

↓

Approved

↓

Returned

---

Action Button

Approve

Reject

Request More Information

---

Admin Note

Textarea

Required

---

# Categories

CRUD

Kolom

Nama

Jumlah Barang

Tanggal Dibuat

Action

---

# Locations

CRUD

Kolom

Nama Lokasi

Jumlah Barang

Action

---

# User Management

Kolom

Nama

Email

Role

Status

Last Login

Action

---

Role

Admin

User

---

Status

Active

Inactive

---

# Statistics

Menampilkan

Total Lost

Total Found

Success Rate

Claim Rate

Most Common Category

Most Common Location

Monthly Reports

---

Export

PDF

Excel

CSV

---

# Activity Logs

Kolom

Tanggal

User

Aktivitas

IP

Action

---

Filter

Tanggal

User

Jenis Aktivitas

---

# Settings

General

School Name

Logo

Email

Phone

Address

---

Security

Change Password

Session Timeout

2FA (Future)

---

Notification

Email

In-App

---

# Empty State

```text
📦

Belum ada data.

Tambah data sekarang.

[ Tambah ]
```

---

# Loading

Dashboard

Skeleton Card

Skeleton Table

Skeleton Chart

---

# Error State

Menampilkan

Icon

Error Message

Retry Button

---

# Success State

Toast Notification

Top Right

---

# Responsive Rules

Desktop

Sidebar selalu tampil.

---

Tablet

Sidebar collapse.

---

Mobile

Drawer Navigation.

Chart menjadi vertikal.

Table berubah menjadi Card List.

---

# Admin UX Rules

Dashboard harus dapat dipahami dalam waktu kurang dari 5 detik.

Action utama selalu berada di kanan atas.

Delete selalu membutuhkan konfirmasi.

Approve menggunakan warna Hijau.

Reject menggunakan warna Merah.

Export menggunakan Outline Button.

Search selalu berada di atas tabel.

Pagination berada di bawah kanan.

Status selalu menggunakan Badge.

Semua tabel memiliki Sort.

Semua tabel memiliki Filter.

Semua form memiliki validasi real-time.

Semua perubahan data menampilkan Toast Notification.

Tidak ada proses yang membutuhkan lebih dari tiga klik untuk mencapai aksi utama.

---

# CRUD Pattern

Semua halaman CRUD mengikuti pola yang sama:

1. List Data
2. Search
3. Filter
4. Sort
5. Pagination
6. View Detail
7. Create
8. Update
9. Delete
10. Success Feedback

Konsistensi pola ini wajib dipertahankan di seluruh dashboard admin.

---

# 1. Responsive Breakpoints

Menggunakan standar Tailwind CSS v4.

| Device      | Width   |
| ----------- | ------- |
| Mobile      | < 640px |
| Small       | ≥640px  |
| Medium      | ≥768px  |
| Large       | ≥1024px |
| Extra Large | ≥1280px |
| 2XL         | ≥1536px |

---

# 2. Layout Container

Default Container

```text
max-width: 1280px
```

Content Width

```text
1200px
```

Padding

Desktop

32px

Tablet

24px

Mobile

16px

---

# 3. 8 Point Grid

Semua komponen mengikuti kelipatan 4 dan 8.

Spacing yang diperbolehkan

```text
4
8
12
16
20
24
32
40
48
56
64
80
96
128
```

Jangan menggunakan spacing acak seperti:

17px

23px

37px

---

# 4. Animation

Hover

```css
transition:200ms ease;
```

Button

Opacity

Scale 1.02

Card

TranslateY(-4px)

Modal

Fade + Scale

Sidebar

Slide

Toast

Fade In

Dropdown

Fade + TranslateY

Durasi maksimal

250ms

---

# 5. Icon System

Library

Lucide

Ukuran

16

20

24

32

Ketebalan

Default

Style

Outline

Jangan mencampur Heroicons, Font Awesome, Remix Icons, dan Lucide dalam satu proyek.

---

# 6. Image Rules

Semua foto barang menggunakan:

Aspect Ratio

4:3

Preview

Rounded

20px

Placeholder

Skeleton

Loading

Lazy Loading

---

# 7. Form Validation

Semua form memiliki:

Real Time Validation

Error Text

Required Indicator

Success State

Loading State

Disabled State

---

Contoh

Nama Barang

✓ Valid

atau

❌ Nama barang wajib diisi.

---

# 8. Accessibility

Semua tombol

Focusable

Keyboard Navigation

Supported

Tab Index

Normal

Alt Image

Required

Input Label

Required

Contrast

WCAG AA

---

# 9. Naming Convention

## Components

```text
ButtonPrimary

ButtonSecondary

ItemCard

StatusBadge

SearchBar

Navbar

Sidebar

DashboardCard

StatisticCard

Timeline

ClaimCard
```

---

## Blade Components

```text
<x-button.primary>

<x-item.card>

<x-status.badge>

<x-dashboard.card>

<x-sidebar.menu>

<x-search.input>
```

---

# 10. Folder Structure

```text
resources/

views/

components/

button/

card/

modal/

badge/

table/

form/

layout/

navbar/

sidebar/

pages/

home/

lost-items/

found-items/

claims/

profile/

admin/

dashboard/

lost-items/

found-items/

claims/

statistics/

users/

settings/
```

---

# 11. Color Tokens

Primary

```css
--primary:#0B3658;
```

Secondary

```css
--secondary:#4E9AD9;
```

Success

```css
--success:#10B981;
```

Danger

```css
--danger:#EF4444;
```

Warning

```css
--warning:#F59E0B;
```

Info

```css
--info:#3B82F6;
```

Surface

```css
--surface:#F8FAFC;
```

Border

```css
--border:#E2E8F0;
```

---

# 12. Radius Tokens

```css
--radius-sm:8px;

--radius-md:12px;

--radius-lg:16px;

--radius-xl:20px;

--radius-2xl:24px;

--radius-full:999px;
```

---

# 13. Shadow Tokens

Small

```css
0 2px 8px rgba(15,23,42,.06)
```

Medium

```css
0 8px 24px rgba(15,23,42,.08)
```

Large

```css
0 20px 60px rgba(15,23,42,.12)
```

---

# 14. Typography Tokens

Display

48

H1

36

H2

30

H3

24

H4

20

Body

16

Caption

14

Small

12

---

Font

Inter

Fallback

Plus Jakarta Sans

---

# 15. AI Prompt Guide

Jika menggunakan AI (Cursor, Claude Code, GitHub Copilot, Figma AI, v0, Lovable), gunakan aturan berikut:

* Gunakan ReturnLy Design System v1.0 sebagai acuan utama.
* Jangan menggunakan lebih dari satu warna aksen.
* Gunakan warna Primary Navy (#0B3658) dan Signal Blue (#4E9AD9).
* Semua card memiliki radius 20px.
* Semua button memiliki radius 16px.
* Semua icon menggunakan Lucide Outline.
* Semua layout mengikuti grid 12 kolom.
* Gunakan Tailwind CSS v4.
* Hindari Glassmorphism, Neumorphism, dan warna neon.
* Fokus pada kemudahan pencarian dan status barang.

---

# 16. Do & Don't

## Do

✔ Gunakan whitespace yang cukup.

✔ Gunakan badge status.

✔ Gunakan card yang konsisten.

✔ Gunakan skeleton loading.

✔ Gunakan toast notification.

✔ Gunakan breadcrumb.

✔ Gunakan search di setiap halaman data.

✔ Gunakan tabel yang dapat di-sort dan di-filter.

✔ Pastikan semua tombol memiliki hover state.

✔ Pastikan semua form memiliki validasi.

---

## Don't

✖ Jangan menggunakan lebih dari dua warna aksen.

✖ Jangan menggunakan border hitam pekat.

✖ Jangan menggunakan animasi berlebihan.

✖ Jangan menggunakan font berbeda.

✖ Jangan mencampur style icon.

✖ Jangan membuat button dengan radius berbeda.

✖ Jangan membuat halaman tanpa empty state.

✖ Jangan membuat tabel tanpa search.

✖ Jangan menggunakan modal untuk form yang sangat panjang.

---

# 17. Performance Guidelines

Gunakan:

* Lazy Loading Image
* Pagination
* Debounce Search
* Optimized SVG Icons
* Eager Loading Relationship (Laravel)
* Cache untuk statistik dashboard

Target performa:

* First Load < 2 detik
* Search Response < 500ms
* Dashboard < 1 detik

---

# 18. Future Roadmap

Versi berikutnya dapat menambahkan:

* QR Code Verification
* Scan Barcode Barang
* Email Notification
* WhatsApp Notification
* Dark Mode
* PWA Support
* Multi School
* Multi Admin
* Audit Log
* AI Image Matching

---

# ReturnLy Design System v1.0

Status

Stable

Framework

Laravel 13

Frontend

Blade + Tailwind CSS v4

Icons

Lucide

Charts

ApexCharts

Target

Desktop First

Style

Modern SaaS Dashboard

Design Inspiration

Linear

GitHub

Notion

Stripe

Vercel

---

"Simple enough for students.
Powerful enough for administrators."

ReturnLy Design System v1.0



