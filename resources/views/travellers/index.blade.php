@extends('layouts.app')
@section('title', 'Travellers')
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    .travellers-page {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: #f0f4f8;
        min-height: 100vh;
        padding: 3rem 1.5rem;
    }

    .page-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .page-eyebrow {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: #0ea5e9;
        background: #e0f2fe;
        padding: 0.35rem 1rem;
        border-radius: 999px;
        margin-bottom: 1rem;
    }

    .page-title {
        font-size: 2.75rem;
        font-weight: 800;
        color: #0f172a;
        line-height: 1.15;
        letter-spacing: -0.03em;
    }

    .page-title span {
        color: #0ea5e9;
    }

    .page-subtitle {
        color: #64748b;
        font-size: 1rem;
        margin-top: 0.75rem;
        font-weight: 400;
    }

    .traveller-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 1.75rem;
        max-width: 1100px;
        margin: 0 auto;
    }

    .traveller-card {
        background: #ffffff;
        border-radius: 1.25rem;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        position: relative;
    }

    .traveller-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(14, 165, 233, 0.12);
    }

    .card-header {
        background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
        padding: 1.5rem 1.75rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        position: relative;
        overflow: hidden;
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: -30px;
        right: -30px;
        width: 110px;
        height: 110px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
    }

    .card-header::after {
        content: '';
        position: absolute;
        bottom: -40px;
        right: 40px;
        width: 80px;
        height: 80px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }

    .avatar {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: rgba(255,255,255,0.25);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        font-weight: 800;
        color: #fff;
        flex-shrink: 0;
        border: 2px solid rgba(255,255,255,0.4);
        z-index: 1;
    }

    .header-text {
        z-index: 1;
    }

    .serial-badge {
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: rgba(255,255,255,0.7);
        margin-bottom: 0.15rem;
    }

    .traveller-name {
        font-size: 1.2rem;
        font-weight: 700;
        color: #ffffff;
        letter-spacing: -0.01em;
    }

    .card-body {
        padding: 1.5rem 1.75rem;
    }

    .info-row {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.65rem 0;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.92rem;
        color: #475569;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-icon {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.95rem;
        flex-shrink: 0;
    }

    .icon-blue   { background: #e0f2fe; color: #0284c7; }
    .icon-green  { background: #dcfce7; color: #16a34a; }
    .icon-yellow { background: #fef9c3; color: #ca8a04; }
    .icon-indigo { background: #e0e7ff; color: #4338ca; }
    .icon-lime   { background: #f7fee7; color: #65a30d; }

    .info-label {
        font-weight: 600;
        color: #334155;
        min-width: 85px;
    }

    .info-value {
        color: #64748b;
        font-weight: 400;
    }

    .card-footer {
        padding: 1rem 1.75rem;
        background: #f8fafc;
        border-top: 1px solid #e2e8f0;
        display: flex;
        gap: 1rem;
    }

    .stat-pill {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        font-size: 0.8rem;
        font-weight: 600;
        color: #475569;
        background: #fff;
        border: 1px solid #e2e8f0;
        padding: 0.4rem 0.85rem;
        border-radius: 999px;
    }

    .stat-pill i {
        font-size: 0.85rem;
    }

    .stat-pill.bookings { color: #4338ca; border-color: #c7d2fe; background: #eef2ff; }
    .stat-pill.reviews  { color: #65a30d; border-color: #d9f99d; background: #f7fee7; }

    @media (max-width: 640px) {
        .traveller-grid {
            grid-template-columns: 1fr;
        }
        .page-title {
            font-size: 2rem;
        }
    }
</style>

<div class="travellers-page">

    <div class="traveller-grid">
        @foreach($users as $user)
        <div class="traveller-card">

            <div class="card-header">
                <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                <div class="header-text">
                    <div class="serial-badge">Traveller #{{ $loop->iteration }}</div>
                    <div class="traveller-name">{{ $user->name }}</div>
                </div>
            </div>

            <div class="card-body">
                <div class="info-row">
                    <div class="info-icon icon-blue"><i class="ri-mail-line"></i></div>
                    <span class="info-label">Email</span>
                    <span class="info-value">{{ $user->email }}</span>
                </div>
                <div class="info-row">
                    <div class="info-icon icon-green"><i class="ri-map-pin-2-line"></i></div>
                    <span class="info-label">Address</span>
                    <span class="info-value">{{ $user->address ?? 'Not provided' }}</span>
                </div>
                <div class="info-row">
                    <div class="info-icon icon-yellow"><i class="ri-calendar-line"></i></div>
                    <span class="info-label">Joined</span>
                    <span class="info-value">{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}</span>
                </div>
            </div>

            <div class="card-footer">
                <div class="stat-pill bookings">
                    <i class="ri-ticket-2-line"></i>
                    {{ $user->orders->count() }} Booking{{ $user->orders->count() != 1 ? 's' : '' }}
                </div>
                <div class="stat-pill reviews">
                    <i class="ri-star-half-line"></i>
                    {{ $user->reviews->count() }} Review{{ $user->reviews->count() != 1 ? 's' : '' }}
                </div>
            </div>

        </div>
        @endforeach
    </div>

</div>

@endsection
